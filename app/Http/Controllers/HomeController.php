<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use App\Models\press_release;
use App\Models\director_profile;
use App\Models\past_president; 


class HomeController extends Controller
{
    public function index()
    {
        // Fetch only the 'image' field for active banners
        $banners = Banner::where('status', '1')
            ->pluck('image');

        // Fetch active events ordered by 'order' field
        $upcomingEvents = Event::where('status', '1')
            ->orderBy('order', 'asc')
            ->get();

        // Fetch inactive events ordered by 'order' field
        $pastEvents = Event::where('status', '0')
            ->orderBy('order', 'asc')
            ->take(3) 
            ->get();

        // Fetch active press releases
        $pressReleases = press_release::where('status', '1')
            ->get(); // Get all active press releases

        // Fetch active directors
        $directors = director_profile::where('status', '1')
            ->get(); // Get all active directors

        // Pass all the data to the view
        return view('home', compact('banners', 'upcomingEvents', 'pastEvents', 'pressReleases', 'directors'));
    }
        
}

