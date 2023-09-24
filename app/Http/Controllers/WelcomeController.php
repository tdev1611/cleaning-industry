<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Client\ServiceService;
use App\Models\Contact_Info;
use App\Models\Procedure;
use App\Models\News;
use App\Models\Introduce;

class WelcomeController extends Controller
{
    //
    protected $service, $contact_Info, $news;
    function __construct(ServiceService $service, Contact_Info $contact_Info, News $news)
    {
        $this->service = $service;
        $this->contact_Info = $contact_Info;
        $this->news = $news;
    }

    function  index()
    {
        $services = $this->service->getAll();
        $contact_Info = $this->contact_Info->first();
        $procedures = Procedure::where('status', 1)->oldest('ordinal')->get();
        $news = $this->news->where('status', 1)->oldest('ordinal')->limit(12)->get();
        $Introduce = Introduce::select('service','id')->where('status', 1)->first();
        return view('welcome', compact('services', 'contact_Info', 'procedures', 'news','Introduce'));
    }
}
