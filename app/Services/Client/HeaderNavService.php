<?php

namespace App\Services\Client;

use App\Models\Service;
use App\Models\Introduce;


class HeaderNavService
{

    protected $service, $introduce;
    function __construct(Service $service, Introduce $introduce)
    {
        $this->service  = $service;
        $this->introduce  = $introduce;
    }


    function getService()
    {

        return $this->service->oldest('ordinal')->where('status', 1)->get();
    }

    function getSlug()
    {
        return $this->service->where('status', 1)->first();
    }
}
