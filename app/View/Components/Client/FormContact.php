<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

use App\Services\Client\ServiceService;

class FormContact extends Component
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
        return view('components.client.form-contact', compact('services'));
    }
}
