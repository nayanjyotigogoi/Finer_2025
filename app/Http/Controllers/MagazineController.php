<?php

namespace App\Http\Controllers;

use App\Models\magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    /**
     * Display a listing of the magazines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = magazine::query();

        // Apply filters
        if ($request->has('search') && $request->search != '') {
            $query->where('page_title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $magazines = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json(view('admin.Magazine.partials.magazine_table', compact('magazines'))->render());
        }

        return view('admin.Magazine.view_magazine', compact('magazines'));
    }


    /**
     * Show the form for creating a new magazine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Magazine.add_magazine');
    }

    /**
     * Store a newly created magazine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Handle image upload with validation
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($image);
            if (!in_array($mime_type, ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Invalid image type. Only JPG and PNG allowed.');
            }

            // Prevent double dot filenames
            if (substr_count($image->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Validate extension
            $extension = $image->getClientOriginalExtension();
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return redirect()->back()->with('error', 'Invalid file extension.');
            }

            // Store image
            $imageName = date('dmY_His') . '.' . $extension;
            $image->move(public_path('uploads/magazines/images'), $imageName);
            $imagePath = 'magazines/images/' . $imageName;
        }

        // Handle PDF upload with validation
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');

            // Prevent double dot filenames
            if (substr_count($pdf->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Validate PDF MIME type
            if ($pdf->getClientMimeType() !== 'application/pdf') {
                return redirect()->back()->with('error', 'Invalid file type. Only PDF allowed.');
            }

            // Store PDF
            $pdfName = date('dmY_His') . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('uploads/magazines/pdfs'), $pdfName);
            $pdfPath = 'magazines/pdfs/' . $pdfName;
        }

        // Store the magazine in the database
        Magazine::create([
            'page_title' => $request->page_title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('magazines.view')->with('success', 'Magazine added successfully.');
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'page_title' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'description' => 'nullable|string',
    //         'status' => 'required|boolean',
    //         'pdf' => 'nullable|mimes:pdf|max:5120',
    //     ]);

    //     // Handle image upload
    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('magazines/images', 'public');
    //     }

    //     // Handle PDF upload
    //     $pdfPath = null;
    //     if ($request->hasFile('pdf')) {
    //         $pdfPath = $request->file('pdf')->store('magazines/pdfs', 'public');
    //     }

    //     // Store the magazine in the database
    //     Magazine::create([
    //         'page_title' => $validated['page_title'],
    //         'image' => $imagePath,
    //         'description' => $validated['description'],
    //         'status' => $validated['status'],
    //         'pdf' => $pdfPath,
    //     ]);

    //     return redirect()->route('magazines.view')->with('success', 'Magazine added successfully.');
    // }

    /**
     * Show the form for editing the specified magazine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magazine = magazine::findOrFail($id);
        return view('admin.Magazine.edit_magazine', compact('magazine'));
    }

    /**
     * Update the specified magazine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $magazine = Magazine::findOrFail($id);

        // Validate input
        $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Validate MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($image);
            if (!in_array($mime_type, ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Invalid image type. Only JPG and PNG allowed.');
            }

            // Prevent double dot filenames
            if (substr_count($image->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Delete old image if exists
            if ($magazine->image && \Storage::disk('public')->exists($magazine->image)) {
                \Storage::disk('public')->delete($magazine->image);
            }

            // Store the new image
            $imageName = date('dmY_His') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/magazines/images'), $imageName);
            $magazine->image = 'magazines/images/' . $imageName;
        }

        // Handle PDF update
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');

            // Prevent double dot filenames
            if (substr_count($pdf->getClientOriginalName(), '.') > 1) {
                return redirect()->back()->with('error', 'Double dot in filename is not allowed.');
            }

            // Validate PDF MIME type
            if ($pdf->getClientMimeType() !== 'application/pdf') {
                return redirect()->back()->with('error', 'Invalid file type. Only PDF allowed.');
            }

            // Delete old PDF if exists
            if ($magazine->pdf && \Storage::disk('public')->exists($magazine->pdf)) {
                \Storage::disk('public')->delete($magazine->pdf);
            }

            // Store the new PDF
            $pdfName = date('dmY_His') . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('uploads/magazines/pdfs'), $pdfName);
            $magazine->pdf = 'magazines/pdfs/' . $pdfName;
        }

        // Update magazine details
        $magazine->update([
            'page_title' => $request->page_title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('magazines.view')->with('success', 'Magazine updated successfully.');
    }

    // public function update(Request $request, $id)
    // {
    //     $magazine = magazine::findOrFail($id);

    //     $validated = $request->validate([
    //         'page_title' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'description' => 'nullable|string',
    //         'status' => 'required|boolean',
    //         'pdf' => 'nullable|mimes:pdf|max:5120',
    //     ]);

    //     // Handle image upload if a new file is provided
    //     if ($request->hasFile('image')) {
    //         // Delete old image if exists
    //         if ($magazine->image) {
    //             Storage::disk('public')->delete($magazine->image);
    //         }
    //         $magazine->image = $request->file('image')->store('magazines/images', 'public');
    //     }

    //     // Handle PDF upload if a new file is provided
    //     if ($request->hasFile('pdf')) {
    //         // Delete old PDF if exists
    //         if ($magazine->pdf) {
    //             Storage::disk('public')->delete($magazine->pdf);
    //         }
    //         $magazine->pdf = $request->file('pdf')->store('magazines/pdfs', 'public');
    //     }

    //     // Update the magazine details
    //     $magazine->update([
    //         'page_title' => $validated['page_title'],
    //         'description' => $validated['description'],
    //         'status' => $validated['status'],
    //     ]);

    //     return redirect()->route('magazines.view')->with('success', 'Magazine updated successfully.');
    // }

    /**
     * Remove the specified magazine from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine = magazine::findOrFail($id);

        // Delete image and PDF if they exist
        if ($magazine->image) {
            Storage::disk('public')->delete($magazine->image);
        }
        if ($magazine->pdf) {
            Storage::disk('public')->delete($magazine->pdf);
        }

        // Delete the magazine record
        $magazine->delete();

        return redirect()->route('magazines.view')->with('success', 'Magazine deleted successfully.');
    }

    public function magazines()
    {
        // Fetch all active magazines (status = 1) with pagination
        $magazines = Magazine::where('status', 1)->paginate(3); // Paginate with 6 items per page

        // Pass the magazines data to the view
        return view('knowledge.magazine', compact('magazines'));
    }

}
