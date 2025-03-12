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

            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('image'));
            if (substr_count($request->file('image'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }

            if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            
            $extension = $request->file('image')->getClientOriginalExtension();
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $imageName = date('dmY_His') . '.' . $image->getClientOriginalExtension();
            // $imageName = time('dmY') . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/banners'), $imageName);
            $imagePath = 'banners/' . $imageName;
        } else 
        {
            $imagePath = 'assests/event.jpeg';
        };

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
            $imageName = date('dmY_His') . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/banners'), $imageName);
            $banner->image = 'banners/' . $imageName;
        } else {
            $banner->image = 'assests/user.png';
        };

        // Update the banner
        $banner->update([
            'name' => $request->name,
            'caption' => $request->caption,
            'image' => $banner->image,  // Use the existing image if no new image is uploaded
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
