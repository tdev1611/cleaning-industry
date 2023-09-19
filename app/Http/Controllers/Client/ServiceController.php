<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\ServiceService;

class ServiceController extends Controller
{
    protected $service;
    function __construct(ServiceService $service)
    {
        $this->service = $service;
    }


    function index()
    {
        $services = $this->service->getAll();
        return view('client.services.index', compact('services'));
    }


    function detail($slug)
    {
        $service = $this->service->detail($slug);
        if (!$service) {
            return abort(404);
        }
        $services = $this->service->getService($slug);
        return view('client.services.detail', compact('service', 'services'));
    }
}
