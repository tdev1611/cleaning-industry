<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\Contact_Info;
use App\Models\Introduce;

class FooterContactInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $contact_Info;
    protected $introduce;
    public function __construct(Contact_Info $contact_Info, Introduce $introduce)
    {
        $this->contact_Info = $contact_Info;
        $this->introduce = $introduce;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contact = $this->contact_Info->where('status', 1)->first();
        $introduce = $this->introduce->select('title')->first();
        return view('components.client.footer-contact-info', compact('contact','introduce'));
    }
}
