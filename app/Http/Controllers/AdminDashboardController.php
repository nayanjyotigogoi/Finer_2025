<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use App\Models\press_release;
use App\Models\director_profile;
use App\Models\past_president;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Collect recent activities from all relevant tables
        $recentActivities = collect();
    
        // Fetch recent banners
        $banners = Banner::latest()->take(5)->get();
        foreach ($banners as $banner) {
            $action = $banner->wasRecentlyCreated ? 'added' : 'updated'; // Check if it's newly created or updated
            $recentActivities->push([
                'message' => "Banner '{$banner->name}' was {$action}",
                'date' => $banner->updated_at ?? $banner->created_at,
            ]);
        }
    
        // Fetch recent events
        $events = Event::latest()->take(5)->get();
        foreach ($events as $event) {
            $action = $event->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Event '{$event->title}' was {$action}",
                'date' => $event->updated_at ?? $event->created_at,
            ]);
        }
    
        // Fetch recent press releases
        $pressReleases = press_release::latest()->take(5)->get();
        foreach ($pressReleases as $pressRelease) {
            $action = $pressRelease->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Press release '{$pressRelease->title}' was {$action}",
                'date' => $pressRelease->updated_at ?? $pressRelease->created_at,
            ]);
        }
    
        // Fetch recent director profiles
        $members = director_profile::latest()->take(5)->get();
        foreach ($members as $member) {
            $action = $member->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Board member '{$member->name}' profile was {$action}",
                'date' => $member->updated_at ?? $member->created_at,
            ]);
        }
    
        // Fetch recent past presidents
        $pastPresidents = past_president::latest()->take(5)->get();
        foreach ($pastPresidents as $president) {
            $action = $president->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Past president '{$president->name}' profile was {$action}",
                'date' => $president->updated_at ?? $president->created_at,
            ]);
        }
    
        // Sort activities by date, descending
        $recentActivities = $recentActivities->sortByDesc('date')->take(10);
    
        // Pass the data to the dashboard view
        return view('admin.index', compact('recentActivities'));
    }
}
