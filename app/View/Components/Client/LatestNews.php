<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\News;

class LatestNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $news = $this->news->latest()->where('status', 1)->get();

        return view('components.client.latest-news',compact('news'));
    }
}
