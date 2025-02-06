<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // View Events with Filters
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

        if (!is_null($request->status)) {
            $query->where('status', $request->status);
        }

        if ($request->filled('event_date')) {
            $query->whereDate('event_date', $request->event_date);
        }

        if ($request->filled('order')) {
            $query->where('order', $request->order);
        }

        $events = $query->orderBy('created_at', 'desc')->paginate(7);

        if ($request->ajax()) {
            return view('admin.events.partials.events_table', compact('events'))->render();
        }

        return view('admin.events.view_events', compact('events'));
    }

    // Create Event Form
    public function create()
    {
        return view('admin.events.add_events');
    }

    // Store New Event
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date'  => 'required|date',
            'status'      => 'required|in:0,1',
            'order'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public'); // Store in public/storage/events
        }

        Event::create([
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'status'      => $request->status,
            'order'       => $request->order,
            'image'       => $imagePath,
        ]);

        return redirect()->route('events.view')->with('success', 'Event added successfully!');
    }

    // Edit Event Form
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit_events', compact('event'));
    }

    // Update Event
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date'  => 'required|date',
            'status'      => 'required|in:0,1',
            'order'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image) {
                Storage::disk('public')->delete('events/' . basename($event->image));
            }

            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        $event->update([
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'status'      => $request->status,
            'order'       => $request->order,
        ]);

        return redirect()->route('events.view')->with('success', 'Event updated successfully.');
    }

    // Delete Event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete event image if it exists
        if ($event->image) {
            Storage::disk('public')->delete('events/' . basename($event->image));
        }

        $event->delete();

        return redirect()->route('events.view')->with('success', 'Event deleted successfully.');
    }

    // View Upcoming Events
    public function upcoming_events()
    {
        $events = Event::where('status', 1)->orderBy('order', 'asc')->paginate(6);
        $banner = Banner::where('status', 1)->orderBy('order', 'asc')->first();

        return view('event_page.upcoming_event', compact('banner', 'events'));
    }

    // View Past Events
    public function past_events()
    {
        $events = Event::where('status', 0)->orderBy('order', 'asc')->paginate(6);
        return view('event_page.past_event', compact('events'));
    }
}
