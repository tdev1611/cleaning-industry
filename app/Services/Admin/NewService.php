<?php

namespace App\Services\Admin;

use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewService
{

    protected $new;
    function __construct(News $new)
    {
        $this->new = $new;
    }

    function getAll()
    {
        return $this->new->oldest('ordinal')->with('category')->get();
    }
    // CRUD
    // validate store
    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:250|unique:news,title,',
            'slug' => 'required|max:250|unique:news,slug,',
            'content' => 'required',
            'ordinal' => 'required|numeric',
            'status' => 'in:1,2',
            'image' => 'required',
            'category_new_id' => 'required|exists:category_news,id'
        ]);
        return $validator;
    }
    function handleUploadedImage($image, $slug)
    {
        $filename = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->move('public/uploads/news', $filename);
        return "public/uploads/news/" . $filename;
    }
    function store($data)
    {
        return $this->new->create($data);
    }


    function find($id)
    {
        $new =  $this->new->find($id);
        if (!$new) {
            throw new \Exception('Not found new ');
        }
        return $new;
    }

    // update
    function validateUpdate($id, $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:70|unique:news,title,' . $id,
            'slug' => 'required|max:70|unique:news,slug,' . $id,
            'content' => 'required',
            'ordinal' => 'required|numeric',
            'status' => 'in:1,2',
            'category_new_id' => 'required|exists:category_news,id',
            'image' => 'image|required_if:is_updating_file,true|mimes:jpeg,png,pdf',
        ]);
        return $validator;
    }
    function update($id, $data)
    {
        $new = $this->find($id);
        $new->update($data);
        return $new;
    }

    function UpdateImage($id, $newImage, $slug)
    {
        if (!empty($newImage)) {
            $img_old = $this->find($id)->image;
            unlink($img_old);
        }
        $filename = $slug . '-' . time() . '.' . strtolower($newImage->getClientOriginalExtension());
        $path = $newImage->move('public/uploads/news', $filename);
        return $img = "public/uploads/news/" . $filename;
    }


    // deltee
    function delete($id)
    {
        $new = $this->find($id);
        $img_old = $new->image;
        unlink($img_old);
        return $new->delete();
    }
}
