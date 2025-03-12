<?php

namespace App\Http\Controllers;

use App\Models\director_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class directorProfilesController extends Controller
{
    public function index(Request $request)
    {
        $query = director_profile::query();
    
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
    
        $directorProfiles = $query->paginate(8);
    
        if ($request->ajax()) {
            return response()->json(view('admin.director_profiles.partials.director_profiles_table', compact('directorProfiles'))->render());
        }
    
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
        // dd($request->all());

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // $photoPath = $request->file('photo')->store('director_profiles', 'public');
            
            $file = $request->file('photo');
            
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('photo'));
            if (substr_count($request->file('photo'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            
            if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                return redirect()->back()->with('error', 'File type not allowed');
            }
           
            $extension = $request->file('photo')->getClientOriginalExtension();
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $fileName = date('dmY_His') . '.' . $file->getClientOriginalExtension();

            Request()->file('photo')->move(public_path('uploads/director_profiles'), $fileName);
            $photoPath = 'director_profiles'. '/' . $fileName;

        }
        else {
            $photoPath = 'assests/user.png';
        };

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
            // $photoPath = $request->file('photo')->store('director_profiles', 'public');
            // $directorProfile->photo = $photoPath;

            $file = $request->file('photo');
            
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('photo'));
            if (substr_count($request->file('photo'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            
            if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                return redirect()->back()->with('error', 'File type not allowed');
            }
           
            $extension = $request->file('photo')->getClientOriginalExtension();
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $fileName = date('dmY_His') . '.' . $file->getClientOriginalExtension();

            Request()->file('photo')->move(public_path('uploads/director_profiles'), $fileName);
            $photoPath = 'director_profiles'. '/' . $fileName;
        } else {
            $photoPath = 'assests/user.png';
        };


        $directorProfile->update([
            'name' => $request->name,
            'photo' => $photoPath,
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

    // public function directors()
    // {
    //     // Fetching the active directors and past presidents from the database
    //     $directors = director_profile::where('status', 1)->get(); // Active directors
       
    //     // Passing data to the view
    //     return view('about.directors_presidents', compact('directors'));
    // }
}
