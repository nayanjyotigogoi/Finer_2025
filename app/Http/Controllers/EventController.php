<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function view(Request $request)
{
    $query = Event::query();

    // Apply search filters
    if ($request->filled('title')) {
        $query->where('title', 'LIKE', '%' . $request->title . '%');
    }

    if ($request->filled('description')) {
        $query->where('description', 'LIKE', '%' . $request->description . '%');
    }

    // Apply status filter
    if (!is_null($request->status)) {
        $query->where('status', $request->status);
    }

    // Apply event date filter
    if ($request->filled('event_date')) {
        $query->whereDate('event_date', $request->event_date);
    }

    // Apply order filter
    if ($request->filled('order')) {
        $query->where('order', $request->order);
    }

    // Order events by created_at in descending order (latest first)
    $events = $query->orderBy('created_at', 'desc')->paginate(7);

    if ($request->ajax()) {
        return view('admin.events.partials.events_table', compact('events'))->render();
    }

    return view('admin.events.view_events', compact('events'));
}

    
    

    public function create()
    {
        return view('admin.events.add_events');
    }

    public function store(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'status' => 'required|in:0,1', // Ensure that only 0 or 1 is accepted for active/inactive
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        // Create the event
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'status' => $request->status, // Use status here
            'order' => $request->order,
            'image' => $imagePath,
        ]);

         // Redirect with success message
         return redirect()->route('events.view')->with('success', 'Events added successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit_events', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'status' => 'required|in:0,1', // Ensure that only 0 or 1 is accepted for active/inactive
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath; // Update the image path
        }

        // Update the event
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'status' => $request->status, // Use status here
            'order' => $request->order,
        ]);

        // Redirect back with a success message
        return redirect()->route('events.view')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete event's image if exists
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        // Delete the event record
        $event->delete();

        // Redirect back with a success message
        return redirect()->route('events.view')->with('success', 'Event deleted successfully.');
    }

    public function upcoming_events(){

        // Fetch only active events sorted by their order
        $events = Event::where('status', 1)->orderBy('order', 'asc')->paginate(6);

        // Fetch the banner with `status = 1`
        $banner = Banner::where('status', 1)->orderBy('order', 'asc')->first();
        return view('event_page.upcoming_event', compact('banner','events'));
    
    }

    public function past_events(){

        $events = Event::where('status', 0)->orderBy('order', 'asc')->paginate(6);
        
        return view('event_page.past_event', compact('events'));
    }
}
