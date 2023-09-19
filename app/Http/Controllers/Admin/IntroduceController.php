<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;
use Illuminate\Support\Facades\Validator;

class introduceController extends Controller
{

    protected $introduce;
    function __construct(Introduce $introduce)
    {
        $this->introduce = $introduce;
    }

    function create()
    {
        $introduce =  $this->introduce->first();
        return view('admin.introduces.add', compact('introduce'));
    }


    function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $this->introduce->create($data);
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
            $this->introduce->where('id', $id)->update($data);
            $message = 'Cập nhât  thông tin thành công!';
            return back()->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'license_date' => 'required',
            'tax_code' => 'required|string',
            'service' => 'required|string',
            'status' => 'in:1,2',
            'address' => 'required',
            'phone' => 'required|numeric',
            'managed_by' => 'required',
        ]);
        return $validator;
    }
}
