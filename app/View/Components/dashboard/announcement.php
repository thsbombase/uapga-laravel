<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;
use App\Models\Announcement as AnnouncementModel;

class announcement extends Component
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
        $announcements = AnnouncementModel::orderBy('date', 'desc')->take(10)->get();
        return view('components.dashboard.announcement', compact('announcements'));
    }
}
