<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Services\Client\HeaderNavService;


class BodyHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $headerNavService;
    public function __construct(HeaderNavService $headerNavService)
    {
        $this->headerNavService = $headerNavService;
    }


    public function render()
    {
        $services = $this->headerNavService->getService();

        $introduce = $this->headerNavService->getSlug();
        return view('components.client.body-header', compact('services','introduce'));
    }
}
