<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\NewService;
use App\Models\CategoryNew;

class NewController extends Controller
{

    protected $new;
    function __construct(NewService $new)
    {
        $this->new = $new;
    }

    public function index()
    {
        $news = $this->new->getAll();
        return view('admin.news.index', compact('news'));
    }


    public function create()
    {
        $categories = CategoryNew::where('status', 1)->oldest('ordinal')->get();
        return view('admin.news.add', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->new->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // handle uploadImg
            $request->hasFile('image') ? $data['image'] = $this->new
                ->handleUploadedImage($request->file('image'), $request->slug) : null;
            // create
            $this->new->store($data);
            return back()->with('success', 'Thêm sản dịch vụ thành công');
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }



    public function edit($id)
    {
        try {
            $new = $this->new->find($id);
            $categories = CategoryNew::where('status', 1)->oldest('ordinal')->get();
            return view('admin.news.edit', compact('new', 'categories'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $validator = $this->new->validateUpdate($id, $data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            // update image
            $request->hasFile('image') ? $data['image'] = $this->new
                ->UpdateImage($id, $request->file('image'), $request->slug) : '';
            $update = $this->new->update($id, $data);
            $message = 'Cập nhât thành công! ';
            return redirect(route('admin.news.index'))->with('success', $message);
        } catch (\Exception $e) {
            return back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }


    public function delete($id)
    {
        try {
            $this->new->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
