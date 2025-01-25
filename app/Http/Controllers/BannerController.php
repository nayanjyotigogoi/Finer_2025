<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

   
    /**
     * Display a listing of banners.
     */
    public function view(Request $request)
    {
        $query = Banner::query();
    
        // Apply filters
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('caption', 'LIKE', '%' . $request->search . '%');
            });
        }
    
        if (!is_null($request->status)) {
            $query->where('status', $request->status);
        }
    
        // Paginate results
        $banners = $query->orderBy('created_at', 'desc')->paginate(10);
    
        if ($request->ajax()) {
            return view('admin.banner.partials.table', compact('banners'))->render();
        }
    
        return view('admin.banner.view_banner', compact('banners'));
    }
    


    
    public function exportCsv()
    {
        $banners = Banner::all();
        $csvContent = "ID,Name,Caption,Order,Status\n";
        foreach ($banners as $banner) {
            $csvContent .= "{$banner->id},{$banner->name},{$banner->caption},{$banner->order}," . ($banner->status ? 'Active' : 'Inactive') . "\n";
        }
        return response($csvContent, 200, ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename="banners.csv"']);
    }
    
    public function exportPdf()
    {
        $banners = Banner::all();
        $pdf = \PDF::loadView('admin.banners.pdf', compact('banners'));
        return $pdf->download('banners.pdf');
    }
    
    


    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('admin.banner.add_banner');
    }

    /**
     * Store a newly created banner in the database.
     */
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'caption' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'order' => 'required|integer',
        'status' => 'required|in:1,0', // Validate as boolean
        'description' => 'nullable|string',
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('banners', 'public');
    }
    else {
        $imagePath = 'assests/user.png'; // Set the default image path
    }

    // Set a default value for description if it's not provided
    $description = $request->description ?? ''; // If null, set it as an empty string

    // Store data in the database
    Banner::create([
        'name' => $request->name,
        'caption' => $request->caption,
        'image' => $imagePath,
        'order' => $request->order,
        'status' => $request->status,
        'description' => $description, // Use the default or provided description
    ]);

    // Redirect with success message
    return redirect()->route('banners.view')->with('success', 'Banner added successfully!');
}



    /**
     * Show the form for editing an existing banner.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit_banner', compact('banner'));
    }

    /**
     * Update the specified banner in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'required|integer',
            'status' => 'required|in:1,0', // Validate as boolean
        ]);

        $banner = Banner::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath; // Update the image path
        }

        // Update the banner
        $banner->update([
            'name' => $request->name,
            'caption' => $request->caption,
            'order' => $request->order,
            'status' => $request->status,
        ]);

        return redirect()->route('banners.view')->with('success', 'Banner updated successfully.');
    }

    /**
     * Remove the specified banner from the database.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete the banner's image if exists
        if ($banner->image) {
            \Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banners.view')->with('success', 'Banner deleted successfully.');
    }


}
