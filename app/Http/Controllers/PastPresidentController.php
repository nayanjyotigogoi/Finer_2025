<?php

namespace App\Http\Controllers;

use App\Models\past_president;
use Illuminate\Http\Request;
use App\Models\director_profile;
use Illuminate\Support\Facades\Storage;  // Add this line

class PastPresidentController extends Controller
{
    // Show the form to create a new past president
    public function create()
    {
        return view('admin.past_presidents.add_past_presidents');
    }

    // Store a newly created past president in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        $photoPath = null;
        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('past_presidents', 'public');
        }

        // Create a new past president record
        past_president::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'position' => $request->position,
            'company' => $request->company,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        // Redirect with success message
        return redirect()->route('past_presidents.view')->with('success', 'Past President added successfully!');
    }

    // Show the form to edit a specific past president
    public function edit($id)
    {
        $pastPresident = past_president::findOrFail($id);
        return view('admin.past_presidents.edit_past_presidents', compact('pastPresident'));
    }

    // Update the specified past president in the database
    public function update(Request $request, $id)
    {
        $pastPresident = past_president::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        // Handle file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            if ($pastPresident->photo) {
                Storage::disk('public')->delete($pastPresident->photo);
            }
            $photoPath = $request->file('photo')->store('past_presidents', 'public');
            $pastPresident->photo = $photoPath;
        }

        // Update the past president record
        $pastPresident->update([
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        // Redirect with success message
        return redirect()->route('past_presidents.view')->with('success', 'Past President updated successfully!');
    }

    // Delete the specified past president from the database
    public function destroy($id)
    {
        $pastPresident = past_president::findOrFail($id);

        if ($pastPresident->photo) {
            Storage::disk('public')->delete($pastPresident->photo);
        }

        $pastPresident->delete();

        // Redirect with success message
        return redirect()->route('past_presidents.view')->with('success', 'Past President deleted successfully!');
    }

    // Display a listing of all past presidents
    public function view()
    {
        $pastPresidents = past_president::all();
        return view('admin.past_presidents.view_past_presidents', compact('pastPresidents'));
    }

    public function past_presidents(){
       // Fetch active directors and past presidents
    $directors = director_profile::where('status', 1)->get();
    $pastPresidents = past_president::where('status', 1)->get();
        return view('about.directors_presidents', compact('directors','pastPresidents'));
    }
}
