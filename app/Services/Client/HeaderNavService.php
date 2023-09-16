<?php

namespace App\Services\Client;

use App\Models\Service;


class HeaderNavService
{

    protected $service;
    function __construct(Service $service)
    {
        $this->service  = $service;
    }


    function getService()
    {

        return $this->service->oldest('ordinal')->where('status', 1)->get();
    }
}
