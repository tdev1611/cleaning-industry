<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\Contact_Info;
class FooterContactInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $contact_Info;
    public function __construct(Contact_Info $contact_Info)
    {
        $this->contact_Info = $contact_Info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contact = $this->contact_Info->where('status',1)->first();

        return view('components.client.footer-contact-info',compact('contact'));
    }
}
