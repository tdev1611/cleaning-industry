<?php

namespace App\Services\Client;

use App\Models\Service;
use App\Models\Introduce;
use App\Models\CategoryNew;


class HeaderNavService
{

    protected $service, $introduce, $category;
    function __construct(Service $service, Introduce $introduce, CategoryNew $category)
    {
        $this->service  = $service;
        $this->introduce  = $introduce;
        $this->category  = $category;
    }


    function getService()
    {

        return $this->service->oldest('ordinal')->where('status', 1)->get();
    }

    function getSlug()
    {
        return $this->service->where('status', 1)->first();
    }


    // Introduce
    function getIntro() {
        return $this->introduce->where('status', 1)->first();
    }



    // news
    function getCategory()
    {
        return $this->category->where('status', 1)->oldest('ordinal')->get();
    }
}
