<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;
use App\Models\User;

class pending extends Component
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
        $pendings = User::where('status', 'pending')->orderBy('created_at', 'desc')->take(5)->get();

        return view('components.dashboard.pending', compact('pendings'));
    }
}
