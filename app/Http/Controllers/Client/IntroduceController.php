<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use Illuminate\Http\Request;


class IntroduceController extends Controller
{
    protected $introduce;
    function __construct(Introduce $introduce)
    {
        $this->introduce = $introduce;
    }

    function index()
    {
        $introduce =  $this->introduce->where('status',1)->first();
        return view('client.introduce.index', compact('introduce'));
    }
}
