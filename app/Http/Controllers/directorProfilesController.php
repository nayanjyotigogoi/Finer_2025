<?php

namespace App\Http\Controllers;

use App\Models\director_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class directorProfilesController extends Controller
{
    public function index()
    {
        $directorProfiles = director_profile::all();
        return view('admin.director_profiles.view_director_profiles', compact('directorProfiles'));
    }

    public function create()
    {
        return view('admin.director_profiles.add_director_profiles');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string|max:255',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('director_profiles', 'public');
        }

        director_profile::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'position' => $request->position,
            'company' => $request->company,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('director_profiles.view')->with('success', 'Director profile added successfully!');
    }

    public function edit($id)
    {
        $directorProfile = director_profile::findOrFail($id);
        return view('admin.director_profiles.edit_director_profiles', compact('directorProfile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string|max:255',
        ]);

        $directorProfile = director_profile::findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($directorProfile->photo) {
                Storage::disk('public')->delete($directorProfile->photo);
            }
            $photoPath = $request->file('photo')->store('director_profiles', 'public');
            $directorProfile->photo = $photoPath;
        }

        $directorProfile->update([
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('director_profiles.view')->with('success', 'Director profile updated successfully!');
    }

    public function destroy($id)
    {
        $directorProfile = director_profile::findOrFail($id);

        if ($directorProfile->photo) {
            Storage::disk('public')->delete($directorProfile->photo);
        }

        $directorProfile->delete();

        return redirect()->route('director_profiles.view')->with('success', 'Director profile deleted successfully!');
    }

    public function directors()
    {
        // Fetching the active directors and past presidents from the database
        $directors = director_profile::where('status', 1)->get(); // Active directors
       
        // Passing data to the view
        return view('about.directors_presidents', compact('directors'));
    }
}
