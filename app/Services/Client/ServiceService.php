<?php

namespace App\Services\Client;

use App\Models\Service;


class ServiceService
{

    protected $service;
    function __construct(Service $service)
    {
        $this->service  = $service;
    }


    function getAll()
    {
        return $this->service->oldest('ordinal')->where('status', 1)->get();
    }

    function getService($slug)   //services different
    {

        return $this->service->oldest('ordinal')->where('slug', '!=', $slug)->where('status', 1)->get();
    }
    function detail($slug)
    {
        return $this->service->where('slug', $slug)->first();
    }
}
