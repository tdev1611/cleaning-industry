<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;
use App\Models\SettingWeb;

class HeadMeta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $setting;
    public function __construct(SettingWeb $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $setting = $this->setting->first();
        return view('components.client.head-meta', compact('setting'));
    }
}
