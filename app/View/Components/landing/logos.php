<?php

namespace App\View\Components\landing;

use Illuminate\View\Component;
use App\Models\Sponsor;

class logos extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $logos = Sponsor::all();
        return view('components.landing.logos', compact('logos'));
    }
}
