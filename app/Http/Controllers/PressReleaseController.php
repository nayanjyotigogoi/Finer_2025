<?php

namespace App\Http\Controllers;

use App\Models\press_release;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    // Display a list of press releases
    public function index()
    {
        $pressReleases = press_release::all();
        return view('admin.press_release.view_press_release', compact('pressReleases'));
    }

    // Show the form for creating a new press release
    public function create()
    {
        return view('admin.press_release.add_press_release');
    }

    // Store a newly created press release in the database
    public function store(Request $request)
    {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Updated field name
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'pdf' => 'nullable|mimes:pdf|max:10240', // Validate PDF
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) { // Updated field name
            $imagePath = $request->file('image')->store('press_releases', 'public'); // Updated field name
        }

        // Upload the PDF if exists
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('press_releases', 'public');
        }
        

        press_release::create([
            'page_title' => $request->page_title,
            'image' => $imagePath, // Updated field name
            'description' => $request->description,
            'status' => $request->status,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('press_releases.view')->with('success', 'Press release added successfully!');
    }

    // Show the form for editing the specified press release
    public function edit($id)
    {
        $pressRelease = press_release::findOrFail($id);
        return view('admin.press_release.edit_press_release', compact('pressRelease'));
    }

    // Update the specified press release in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Updated field name
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'pdf' => 'nullable|mimes:pdf|max:10240', // Validate PDF
        ]);

        $pressRelease = press_release::findOrFail($id);
        // Update the image if exists
        $imagePath = $request->file('image') ? $request->file('image')->store('press_releases') : $pressRelease->image; // Updated field name

        if ($request->hasFile('image')) { // Updated field name
            if ($pressRelease->image) {
                \Storage::disk('public')->delete($pressRelease->image); // Updated field name
            }
            $imagePath = $request->file('image')->store('press_releases', 'public'); // Updated field name
            $pressRelease->image = $imagePath; // Updated field name
        }

        // Update the PDF if exists
        if ($request->hasFile('pdf')) {
            if ($pressRelease->pdf) {
                \Storage::disk('public')->delete($pressRelease->pdf);
            }
            $pdfPath = $request->file('pdf')->store('press_releases', 'public');
        } else {
            $pdfPath = $pressRelease->pdf;
        }


        $pressRelease->update([
            'page_title' => $request->page_title,
            'image' => $imagePath, // Updated field name
            'description' => $request->description,
            'status' => $request->status,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('press_releases.view')->with('success', 'Press release updated successfully.');
    }

    // Remove the specified press release from the database
    public function destroy($id)
    {
        $pressRelease = press_release::findOrFail($id);

        if ($pressRelease->image) { // Updated field name
            \Storage::disk('public')->delete($pressRelease->image); // Updated field name
        }

        if ($pressRelease->pdf) {
            \Storage::disk('public')->delete($pressRelease->pdf);
        }

        $pressRelease->delete();

        return redirect()->route('press_releases.view')->with('success', 'Press release deleted successfully.');
    }
    public function view_press_releases() {
        // Fetch press releases with pagination (6 per page)
        $pressReleases = press_release::where('status', '1')->paginate(3);

    
        // Pass the paginated data to the view
        return view('publications.press_release', compact('pressReleases'));
    }
    
}
