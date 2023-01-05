<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Sponsor;

class cards extends Component
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
        $approved = User::where('status', 'approved')->count();
        $pending = User::where('status', 'pending')->count();
        $sponsors = Sponsor::count();
        return view('components.dashboard.cards' , compact('approved', 'pending', 'sponsors'));
    }
}
