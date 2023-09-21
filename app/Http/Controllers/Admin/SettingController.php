<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SettingWeb;

class SettingController extends Controller
{
    private $settingWeb;
    function __construct(SettingWeb $settingWeb)
    {
        $this->settingWeb = $settingWeb;
    }


    function create()
    {
        $setting = $this->settingWeb->first();
        return view('admin.setting.add', compact('setting'));
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // handle uploadImg
            $request->hasFile('logo') ? $data['logo'] =
                $this->handleUploadedImage($request->file('logo'), 'logo-web') : null;

            // create
            $this->settingWeb->create($data);
            return back()->with('success', 'Cài đặt thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }

    // update
    public function update(Request $request, $id)
    {

        $data = $request->except('_token', '_method');
        try {
            $validator = $this->validateUpdate($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // update image
            $request->hasFile('logo') ? $data['logo'] = $this
                ->UpdateImage($id, $request->file('logo'), 'logo-web-update') : '';
            $update = $this->settingWeb->where('id', $id)->update($data);
            $message = 'Cập nhât thành công! ';
            return back()->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }



    function handleUploadedImage($image, $slug)
    {
        $filename = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->move('public/uploads/settingWeb', $filename);
        return "public/uploads/settingWeb/" . $filename;
    }
    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'title' => 'required',
            'meta_title' => 'required',
            'keyword' => 'required',
            'og_url' => 'required',
            'meta_desc' => 'required',
            'logo' => 'required',
            'status' => 'in:1,2',

        ]);
        return $validator;
    }
    // update
    function validateUpdate($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'title' => 'required',
            'meta_title' => 'required',
            'keyword' => 'required',
            'og_url' => 'required',
            'meta_desc' => 'required',
            'logo' => 'nullable',
            'status' => 'in:1,2',
        ]);
        return $validator;
    }


    function UpdateImage($id, $newImage, $slug)
    {
        if (!empty($newImage)) {
            $img_old = $this->settingWeb->find($id)->logo;
            unlink($img_old);
        }
        $filename = $slug . '-' . time() . '.' . strtolower($newImage->getClientOriginalExtension());
        $path = $newImage->move('public/uploads/settingWeb', $filename);
        return $img = "public/uploads/settingWeb/" . $filename;
    }
}
