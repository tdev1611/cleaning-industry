<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use Illuminate\Support\Facades\Validator;

class ProcedureController extends Controller
{
    protected $procedure;
    function __construct(Procedure $procedure)
    {
        $this->procedure = $procedure;
    }


    function index()
    {
        $procedures = $this->procedure->oldest('ordinal')->get();
        return view('admin.procedures.index', compact('procedures'));
    }

    function create()
    {

        return view('admin.procedures.add');
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }

            // create
            $this->procedure->create($data);
            return response()->json([
                'message' => 'Thêm  thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }


    public function edit($id)
    {
        try {
            $procedure = $this->procedure->find($id);
            return view('admin.procedures.edit', compact('procedure'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        try {
            $validator = $this->validateUpdate($id, $data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $update = $this->procedure->where('id', $id)->update($data);
            $message = 'Cập nhât thành công! ';
            return redirect()->route('admin.procedures.index')->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    public function delete($id)
    {
        try {
            $procedure = $this->procedure->find($id);
            if (!isset($procedure)) {
                throw new \Exception('Không có id dã chọn');
            }
            $procedure->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }




    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|unique:procedures,title|max:70',
            'desc' => 'required',
            'ordinal' => 'required|numeric|unique:procedures,ordinal',
            'status' => 'in:1,2',

        ]);
        return $validator;
    }


    function validateUpdate($id, $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:70|unique:procedures,title,' . $id,
            'desc' => 'required',
            'ordinal' => 'required|numeric|unique:procedures,ordinal,' . $id,
            'status' => 'in:1,2',
        ]);
        return $validator;
    }
}
