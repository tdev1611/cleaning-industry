<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;

class BannerController extends Controller
{
    protected $banner;
    function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    // list image
    function index()
    {
    }

    // create image
    function create()
    {

        $banner = $this->banner->first();

        return view('admin.banner.add', compact('banner'));
    }


    function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $this->banner->create($data);
            return back()->with('success', 'Tạo banner thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }



    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        try {
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $this->banner->where('id', $id)->update($data);
            $message = 'Cập nhât  banner thành công!';
            return back()->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }

    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'status' => 'in:1,2',
        ]);
        return $validator;
    }
}
