<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Announcement as AnnouncementModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approved = User::where('status', 'approved')->count();
        $pending = User::where('status', 'pending')->count();
        $sponsors = Sponsor::count();

        $announcements = AnnouncementModel::orderBy('date', 'desc')->take(10)->get();

        $pendings = User::where('status', 'pending')->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('approved', 'pending', 'sponsors', 'announcements', 'pendings'));
    }
}
