<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Client\ServiceService;

class WelcomeController extends Controller
{
    //
    protected $service;
    function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    function  index()
    {
        $services = $this->service->getAll();
        return view('welcome', compact('services'));
    }
}
