<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Client\ServiceService;
use App\Models\Contact_Info;

class WelcomeController extends Controller
{
    //
    protected $service, $contact_Info;
    function __construct(ServiceService $service, Contact_Info $contact_Info)
    {
        $this->service = $service;
        $this->contact_Info = $contact_Info;
    }

    function  index()
    {
        $services = $this->service->getAll();
        $contact_Info = $this->contact_Info->first();
        return view('welcome', compact('services','contact_Info'));
    }
}
