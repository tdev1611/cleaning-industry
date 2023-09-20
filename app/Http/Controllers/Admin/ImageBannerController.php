<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\BannerService;
use App\Models\Banner;

class ImageBannerController extends Controller
{
    protected $bannerService;
    function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }



    function index()
    {
        $images = $this->bannerService->getAll();

        return view('admin.banner.index', compact('images'));
    }
    function create()
    {
        $banner = Banner::where('status', 1)->first();
        return view('admin.banner.create-image', compact('banner'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->bannerService->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // handle uploadImg
            $request->hasFile('image') ? $data['image'] = $this->bannerService
                ->handleUploadedImage($request->file('image'), $request->slug) : null;

            // create
            $this->bannerService->store($data);
            return back()->with('success', 'Thêm ảnh  thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $image = $this->bannerService->find($id)->with('banner')->first();
            return view('admin.banner.edit-image', compact('image'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $validator = $this->bannerService->validateUpdate($id, $data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // update image
            $request->hasFile('image') ? $data['image'] = $this->bannerService
                ->UpdateImage($id, $request->file('image'), $request->slug) : '';
            $update = $this->bannerService->update($id, $data);
            $message = 'Cập nhât thành công! ';
            return redirect(route('admin.image-banner.index'))->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    public function delete($id)
    {
        try {
            $this->bannerService->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
