<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;
use Illuminate\Support\Facades\Validator;
class IntroduceController extends Controller
{
  
    protected $Introduce;
    function __construct(Introduce $Introduce)
    {
        $this->Introduce = $Introduce;
    }

    function create()
    {
        $contact =  $this->Introduce->first();
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
            $this->Introduce->create($data);
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
            $this->Introduce->where('id', $id)->update($data);
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
