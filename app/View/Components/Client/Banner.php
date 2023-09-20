<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\Banner as BannerModel;


class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $banner;
    public function __construct(BannerModel $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $banner = $this->banner->where('status', 1)->first();
        $banner ?  $images = $banner->images : null;
        if (isset($banner)) {
            $images = $banner->images;
            return view('components.client.banner', compact('images'));
        }

        return view('components.client.banner');
    }
}
