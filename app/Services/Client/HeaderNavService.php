<?php

namespace App\Services\Client;

use App\Models\Service;
use App\Models\Introduce;
use App\Models\CategoryNew;
use App\Models\SettingWeb;


class HeaderNavService
{

    protected $service, $introduce, $category, $setting;
    function __construct(Service $service, Introduce $introduce, CategoryNew $category, SettingWeb $settingWeb)
    {
        $this->service  = $service;
        $this->introduce  = $introduce;
        $this->category  = $category;
        $this->setting  = $settingWeb;
    }


    // logo header 
    function logoNav()
    {
        return $this->setting->where('status', 1)->first();
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
    function getIntro()
    {
        return $this->introduce->where('status', 1)->first();
    }



    // news
    function getCategory()
    {
        return $this->category->where('status', 1)->oldest('ordinal')->get();
    }
}
