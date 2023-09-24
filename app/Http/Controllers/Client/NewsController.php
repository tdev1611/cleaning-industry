<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryNew;
use App\Models\News;


class NewsController extends Controller
{
    //
    protected $category, $new;

    function __construct(CategoryNew $categoryNew, News $new)
    {
        $this->category =  $categoryNew;
        $this->new = $new;
    }


    function index($slug)
    {
        $category = $this->category->where('slug', $slug)->with('news')->first();
        return view('client.news.index', compact('category'));
    }

    function detail($slug)
    {
        $new = $this->new->where('slug', $slug)->first();
        $category = $this->category->where('id', $new->category_new_id)->with('newLimit')->first();
        return view('client.news.detail', compact('new','category'));
    }
}
