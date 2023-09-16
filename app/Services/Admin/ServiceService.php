<?php

namespace App\Services\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceService
{

    protected $service;
    function __construct(Service $service)
    {
        $this->service = $service;
    }

    function getAll()
    {
        return $this->service->oldest()->get();
    }

    // CRUD
    // validate store
    function validateStore($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|unique:services,title|max:70',
            'slug' => 'required|max:70|unique:services,slug,',
            'desc' => 'nullable',
            'content' => 'required',
            'ordinal' => 'required|numeric',
            'status' => 'in:1,2',
            'image' => 'required'
        ]);
        return $validator;
    }
    function handleUploadedImage($image, $slug)
    {
        $filename = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->move('public/uploads/services', $filename);
        return "public/uploads/services/" . $filename;
    }
    function store($data)
    {
        return $this->service->create($data);
    }

    function find($id)
    {
        $service =  $this->service->find($id);
        if (!$service) {
            throw new \Exception('Not found service ');
        }
        return $service;
    }

    // update
    function validateUpdate($id, $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:70|unique:services,title,' . $id,
            'slug' => 'required|max:70|unique:services,slug,' . $id,
            'desc' => 'nullable',
            'content' => 'required',
            'ordinal' => 'required|numeric',
            'status' => 'in:1,2',
            'image' => 'image|required_if:is_updating_file,true|mimes:jpeg,png,pdf',
        ]);
        return $validator;
    }
    function update($id, $data)
    {
        $service = $this->find($id);
        $service->update($data);
        return $service;
    }

    function UpdateImage($id, $newImage, $slug)
    {
        if (!empty($newImage)) {
            $img_old = $this->find($id)->image;
            unlink($img_old);
        }
        $filename = $slug . '-' . time() . '.' . strtolower($newImage->getClientOriginalExtension());
        $path = $newImage->move('public/uploads/services', $filename);
        return $img = "public/uploads/services/" . $filename;
    }


    // deltee
    function delete($id)
    {
        $service = $this->find($id);
        $img_old = $service->image;
        unlink($img_old);
        return $service->delete();
    }
}
