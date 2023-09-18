<?php

namespace App\View\Components\Client;

use App\Services\Client\ServiceService;
use Illuminate\View\Component;

class GoogleMap extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $service;
    function __construct(ServiceService $service)
    {
        $this->service = $service;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $services = $this->service->getAll();
      
      
        return view('components.client.google-map',compact('services'));
    }
}
