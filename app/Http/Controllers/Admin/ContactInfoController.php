<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_Info;
use Illuminate\Support\Facades\Validator;

class ContactInfoController extends Controller
{
    protected $contact_Info;
    function __construct(Contact_Info $contact_Info)
    {
        $this->contact_Info = $contact_Info;
    }

    function create()
    {
        $contact =  $this->contact_Info->latest()->first();
        return view('admin.contacts-info.add', compact('contact'));
    }


    function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $this->contact_Info->create($data);
            return back()->with('success', 'Thêm thông tin thành công');
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
            $this->contact_Info->where('id', $id)->update($data);
            $message = 'Cập nhât  thông tin thành công!';
            return back()->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'phone' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'link' => 'required|string',
            'status' => 'in:1,2',
        ]);
        return $validator;
    }
}
