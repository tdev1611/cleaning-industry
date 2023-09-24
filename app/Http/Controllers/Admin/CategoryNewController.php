<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryNew;
use Illuminate\Support\Facades\Validator;

class CategoryNewController extends Controller
{

    protected $categoryNew;
    function __construct(CategoryNew $categoryNew)
    {
        $this->categoryNew = $categoryNew;
    }

    function index()
    {
        $categories = $this->categoryNew->all();
        return view('admin.categories-new.index', compact('categories'));
    }
    function create()
    {

        return view('admin.categories-new.add');
    }

    function store(Request $request)
    {

        try {
            $data = $request->all();
            $validator = $this->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $this->categoryNew->create($data);
            return back()->with('success', 'Thêm thông tin thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    public function edit($id)
    {
        try {
            $category = $this->categoryNew->find($id);
            return view('admin.categories-new.edit', compact('category'));
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
            $update = $this->categoryNew->where('id', $id)->update($data);
            $message = 'Cập nhât thành công! ';
            return redirect()->route('admin.categories-new.index')->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $category = $this->categoryNew->find($id);
            if (!isset($procedure)) {
                throw new \Exception('Không có id dã chọn');
            }
            $category->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }




    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:240|unique:category_news,title',
            'slug' => 'required|max:240|unique:category_news,slug',
            'status' => 'in:1,2',

        ]);
        return $validator;
    }

    function validateUpdate($id, $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:240|unique:category_news,title,' . $id,
            'slug' => 'required|max:240|unique:category_news,slug,' . $id,
            'status' => 'in:1,2',

        ]);
        return $validator;
    }
}
