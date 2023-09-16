<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ServiceService;

class ServiceController extends Controller
{
    protected $service;
    function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->getAll();
        return view('admin.services.index', compact('services'));
    }


    public function create()
    {
        return view('admin.services.add');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->service->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // handle uploadImg
            $request->hasFile('image') ? $data['image'] = $this->service
                ->handleUploadedImage($request->file('image'), $request->slug) : null;

            // create
            $this->service->store($data);
            return back()->with('success', 'Thêm sản dịch vụ thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }





    public function edit($id)
    {
        try {
            $service = $this->service->find($id);
            return view('admin.services.edit', compact('service'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $validator = $this->service->validateUpdate($id, $data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // update image
            $request->hasFile('image') ? $data['image'] = $this->service
                ->UpdateImage($id, $request->file('image'), $request->slug) : '';
            $update = $this->service->update($id, $data);
            $message = 'Cập nhât thành công! ';
            return redirect(route('admin.services.index'))->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    public function delete($id)
    {
        try {
            $this->service->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
