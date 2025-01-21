<?php

namespace App\Http\Controllers;

use App\Models\director_profile;
use App\Models\past_president; 

class DirectorsPresidentsController extends Controller
{
    public function directors()
    {
        // Fetching the active directors and past presidents from the database
        $directors = director_profile::where('status', 1)->get(); // Active directors
        $pastPresidents = past_president::where('status', 1)->get(); // Active past presidents

        // Passing data to the view
        return view('about.directors_presidents', compact('directors', 'pastPresidents'));
    }
}
