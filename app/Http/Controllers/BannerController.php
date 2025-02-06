<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'status' => 'required|in:1,0',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        $imagePath = 'assets/user.png'; // Default image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/banners'), $imageName);
            $imagePath = 'banners/' . $imageName;
        }

        // Store data in the database
        Banner::create([
            'name' => $request->name,
            'caption' => $request->caption,
            'image' => $imagePath,
            'order' => $request->order,
            'status' => $request->status,
            'description' => $request->description ?? '',
        ]);

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
            'status' => 'required|in:1,0',
        ]);

        $banner = Banner::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/banners'), $imageName);
            $banner->image = 'banners/' . $imageName;
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

        // Delete the banner's image if it exists
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banners.view')->with('success', 'Banner deleted successfully.');
    }
}
