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

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        $photoPath = null;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($photo);
            if (!in_array($mime_type, ['image/jpeg', 'image/png', 'image/gif'])) {
                return redirect()->back()->with('error', 'Invalid image type. Only JPG, PNG, and GIF are allowed.');
            }

            // Prevent double dot filenames
            if (substr_count($photo->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Store the new photo
            $photoName = date('dmY_His') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/past_presidents'), $photoName);
            $photoPath = 'past_presidents/' . $photoName;
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


    // Store a newly created past president in the database
    // public function store(Request $request)
    // {
    //     // Validate the incoming data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'position' => 'required|string|max:255',
    //         'company' => 'required|string|max:255',
    //         'address' => 'nullable|string',
    //         'status' => 'required|boolean',
    //         'description' => 'nullable|string|max:255',
    //     ]);

    //     $photoPath = null;
    //     // Handle file upload
    //     if ($request->hasFile('photo')) {
    //         $photoPath = $request->file('photo')->store('past_presidents', 'public');
    //     }

    //     // Create a new past president record
    //     past_president::create([
    //         'name' => $request->name,
    //         'photo' => $photoPath,
    //         'position' => $request->position,
    //         'company' => $request->company,
    //         'address' => $request->address,
    //         'status' => $request->status,
    //         'description' => $request->description,
    //     ]);

    //     // Redirect with success message
    //     return redirect()->route('past_presidents.view')->with('success', 'Past President added successfully!');
    // }

    // Show the form to edit a specific past president
    public function edit($id)
    {
        $pastPresident = past_president::findOrFail($id);
        return view('admin.past_presidents.edit_past_presidents', compact('pastPresident'));
    }
    public function update(Request $request, $id)
    {
        $pastPresident = past_president::findOrFail($id);

        // Validate the input
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
            $photo = $request->file('photo');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($photo);
            if (!in_array($mime_type, ['image/jpeg', 'image/png', 'image/gif'])) {
                return redirect()->back()->with('error', 'Invalid image type. Only JPG, PNG, and GIF are allowed.');
            }

            // Prevent double dot filenames
            if (substr_count($photo->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Delete old photo if exists
            if ($pastPresident->photo && \Storage::disk('public')->exists($pastPresident->photo)) {
                \Storage::disk('public')->delete($pastPresident->photo);
            }

            // Store the new photo
            $photoName = date('dmY_His') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/past_presidents'), $photoName);
            $pastPresident->photo = 'past_presidents/' . $photoName;
        }

        // Update the past president record
        $pastPresident->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'company' => $validated['company'],
            'address' => $validated['address'],
            'status' => $validated['status'],
            'description' => $validated['description'],
        ]);

        // Redirect with success message
        return redirect()->route('past_presidents.view')->with('success', 'Past President updated successfully!');
    }


    // Update the specified past president in the database
    // public function update(Request $request, $id)
    // {
    //     $pastPresident = past_president::findOrFail($id);

    //     // Validate the incoming data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'position' => 'required|string|max:255',
    //         'company' => 'required|string|max:255',
    //         'address' => 'nullable|string',
    //         'status' => 'required|boolean',
    //         'description' => 'nullable|string|max:255',
    //     ]);

    //     // Handle file upload if a new photo is provided
    //     if ($request->hasFile('photo')) {
    //         if ($pastPresident->photo) {
    //             Storage::disk('public')->delete($pastPresident->photo);
    //         }
    //         $photoPath = $request->file('photo')->store('past_presidents', 'public');
    //         $pastPresident->photo = $photoPath;
    //     }

    //     // Update the past president record
    //     $pastPresident->update([
    //         'name' => $request->name,
    //         'position' => $request->position,
    //         'company' => $request->company,
    //         'address' => $request->address,
    //         'status' => $request->status,
    //         'description' => $request->description,
    //     ]);

    //     // Redirect with success message
    //     return redirect()->route('past_presidents.view')->with('success', 'Past President updated successfully!');
    // }

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
    public function view(Request $request)
    {
        $query = past_president::query();

        // Apply filters
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        if ($request->has('company') && $request->company != '') {
            $query->where('company', 'like', '%' . $request->company . '%');
        }

        $pastPresidents = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json(view('admin.past_presidents.partials.past_presidents_table', compact('pastPresidents'))->render());
        }

        return view('admin.past_presidents.view_past_presidents', compact('pastPresidents'));
    }


    public function past_presidents()
    {
        // Fetch active directors and past presidents
        $directors = director_profile::where('status', 1)->get();
        $pastPresidents = past_president::where('status', 1)->get();
        return view('about.directors_presidents', compact('directors', 'pastPresidents'));
    }
}
