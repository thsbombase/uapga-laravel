<?php

namespace App\View\Components\landing;

use Illuminate\View\Component;
use App\Models\Sponsor;

class sponsors extends Component
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
        $sponsors = Sponsor::where('type', 'sponsor')->get();
        return view('components.landing.sponsors', compact('sponsors'));
    }
}
