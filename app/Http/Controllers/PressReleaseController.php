<?php

namespace App\Http\Controllers;

use App\Models\press_release;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    public function index(Request $request)
    {
        $query = press_release::query();

        // Apply filters
        if ($request->has('search') && $request->search != '') {
            $query->where('page_title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        $pressReleases = $query->paginate(10);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.press_release.partials.press_table', compact('pressReleases'))->render()
            ]);
        }

        return view('admin.press_release.view_press_release', compact('pressReleases'));
    }

    // Show the form for creating a new press release
    public function create()
    {
        return view('admin.press_release.add_press_release');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        // Handle image upload
        $imagePath = 'assets/event.jpeg'; // Default image
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($image);
            if (!in_array($mime_type, ['image/png', 'image/jpeg'])) {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            // Prevent double dot filenames
            if (substr_count($image->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename');
            }

            // Validate file extension
            $extension = $image->getClientOriginalExtension();
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            // Generate unique image name and move it to public/uploads/press_releases
            $imageName = date('dmY_His') . '.' . $extension;
            $image->move(public_path('uploads/press_releases'), $imageName);
            $imagePath = 'press_releases/' . $imageName;
        }

        // Store data in the database
        press_release::create([
            'page_title' => $request->page_title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('press_releases.view')->with('success', 'Press release added successfully!');
    }


    // Store a newly created press release in the database
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'page_title' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
    //         'description' => 'required|string',
    //         'status' => 'required|in:0,1',
    //     ]);

    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('press_releases', 'public'); // Store image in 'public/storage/press_releases/'
    //     }

    //     press_release::create([
    //         'page_title' => $request->page_title,
    //         'image' => $imagePath, // Store the image path
    //         'description' => $request->description,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('press_releases.view')->with('success', 'Press release added successfully!');
    // }

    // Show the form for editing the specified press release
    public function edit($id)
    {
        $pressRelease = press_release::findOrFail($id);
        return view('admin.press_release.edit_press_release', compact('pressRelease'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        // Find the press release
        $pressRelease = press_release::findOrFail($id);

        // Handle image update
        $imagePath = $pressRelease->image; // Keep the existing image path

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($image);
            if (!in_array($mime_type, ['image/png', 'image/jpeg'])) {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            // Prevent double dot filenames
            if (substr_count($image->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename');
            }

            // Validate file extension
            $extension = $image->getClientOriginalExtension();
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            // Delete old image if it exists
            if (!empty($pressRelease->image) && file_exists(public_path('uploads/' . $pressRelease->image))) {
                unlink(public_path('uploads/' . $pressRelease->image));
            }

            // Store the new image
            $imageName = date('dmY_His') . '.' . $extension;
            $image->move(public_path('uploads/press_releases'), $imageName);
            $imagePath = 'press_releases/' . $imageName;
        }

        // Update press release details
        $pressRelease->update([
            'page_title' => $request->page_title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('press_releases.view')->with('success', 'Press release updated successfully!');
    }

    // Update the specified press release in the database
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'page_title' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
    //         'description' => 'required|string',
    //         'status' => 'required|in:0,1',
    //     ]);

    //     $pressRelease = press_release::findOrFail($id);

    //     // Update the image if new image is provided
    //     if ($request->hasFile('image')) {
    //         // Delete old image if exists
    //         if ($pressRelease->image) {
    //             \Storage::disk('public')->delete($pressRelease->image);
    //         }

    //         // Store the new image and get the path
    //         $imagePath = $request->file('image')->store('press_releases', 'public');
    //         $pressRelease->image = $imagePath;
    //     } else {
    //         $imagePath = $pressRelease->image;
    //     }

    //     $pressRelease->update([
    //         'page_title' => $request->page_title,
    //         'image' => $imagePath, // Updated image path
    //         'description' => $request->description,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('press_releases.view')->with('success', 'Press release updated successfully.');
    // }

    // Remove the specified press release from the database
    public function destroy($id)
    {
        $pressRelease = press_release::findOrFail($id);

        // Delete the image if it exists
        if ($pressRelease->image) {
            \Storage::disk('public')->delete($pressRelease->image);
        }

        $pressRelease->delete();

        return redirect()->route('press_releases.view')->with('success', 'Press release deleted successfully.');
    }

    // View press releases with pagination
    public function view_press_releases()
    {
        // Fetch press releases with pagination (6 per page)
        $pressReleases = press_release::where('status', '1')->paginate(3);

        // Pass the paginated data to the view
        return view('publications.press_release', compact('pressReleases'));
    }
}
