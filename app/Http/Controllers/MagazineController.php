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
    public function index()
    {
        // Fetch all magazines and pass to view
        $magazines = magazine::all();
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
        $validated = $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('magazines/images', 'public');
        }

        // Handle PDF upload
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('magazines/pdfs', 'public');
        }

        // Store the magazine in the database
        Magazine::create([
            'page_title' => $validated['page_title'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'status' => $validated['status'],
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('magazines.view')->with('success', 'Magazine added successfully.');
    }

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
        $magazine = magazine::findOrFail($id);

        $validated = $request->validate([
            'page_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Handle image upload if a new file is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($magazine->image) {
                Storage::disk('public')->delete($magazine->image);
            }
            $magazine->image = $request->file('image')->store('magazines/images', 'public');
        }

        // Handle PDF upload if a new file is provided
        if ($request->hasFile('pdf')) {
            // Delete old PDF if exists
            if ($magazine->pdf) {
                Storage::disk('public')->delete($magazine->pdf);
            }
            $magazine->pdf = $request->file('pdf')->store('magazines/pdfs', 'public');
        }

        // Update the magazine details
        $magazine->update([
            'page_title' => $validated['page_title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('magazines.view')->with('success', 'Magazine updated successfully.');
    }

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
