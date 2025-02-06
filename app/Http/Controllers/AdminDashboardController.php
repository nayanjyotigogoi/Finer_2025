<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\User;
use App\Models\Event;
use App\Models\press_release;
use App\Models\director_profile;
use App\Models\past_president;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Collect recent activities from all relevant tables
        $recentActivities = collect();
    
        // Fetch recent banners
        $banners = Banner::latest()->take(5)->get();
        foreach ($banners as $banner) {
            $action = $banner->wasRecentlyCreated ? 'added' : 'updated'; // Check if it's newly created or updated
            $recentActivities->push([
                'message' => "Banner '{$banner->name}' was {$action}",
                'date' => $banner->updated_at ?? $banner->created_at,
            ]);
        }
    
        // Fetch recent events
        $events = Event::latest()->take(5)->get();
        foreach ($events as $event) {
            $action = $event->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Event '{$event->title}' was {$action}",
                'date' => $event->updated_at ?? $event->created_at,
            ]);
        }
    
        // Fetch recent press releases
        $pressReleases = press_release::latest()->take(5)->get();
        foreach ($pressReleases as $pressRelease) {
            $action = $pressRelease->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Press release '{$pressRelease->title}' was {$action}",
                'date' => $pressRelease->updated_at ?? $pressRelease->created_at,
            ]);
        }
    
        // Fetch recent director profiles
        $members = director_profile::latest()->take(5)->get();
        foreach ($members as $member) {
            $action = $member->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Board member '{$member->name}' profile was {$action}",
                'date' => $member->updated_at ?? $member->created_at,
            ]);
        }
    
        // Fetch recent past presidents
        $pastPresidents = past_president::latest()->take(5)->get();
        foreach ($pastPresidents as $president) {
            $action = $president->wasRecentlyCreated ? 'added' : 'updated';
            $recentActivities->push([
                'message' => "Past president '{$president->name}' profile was {$action}",
                'date' => $president->updated_at ?? $president->created_at,
            ]);
        }
    
        // Sort activities by date, descending
        $recentActivities = $recentActivities->sortByDesc('date')->take(10);
    
        // Pass the data to the dashboard view
        return view('admin.index', compact('recentActivities'));
    }

    // Users Management
    public function usersIndex(Request $request)
    {
        // Create query for User model
        $query = User::query();

        // Search by Name or Email
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Fetch paginated users
        $users = $query->latest()->paginate(10);

        // Handle AJAX request for dynamic loading
        if ($request->ajax()) {
            return view('admin.users.partials.table', compact('users'))->render();
        }

        return view('admin.users.view_users', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create_user');
    }

    public function usersStore(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:7,15',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload for image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        // Create the new user
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'description' => $request->description,
            'email' => $request->email,
            'status' => $request->status,
            'order' => $request->order,
            'image' => $imagePath,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.view_user')->with('success', 'User account created successfully.');
    }

    public function usersEdit($id)
    {
        // Get user by id
        $user = User::findOrFail($id);

        // Pass user data to the view
        return view('admin.users.edit_user', compact('user'));
    }

    public function usersUpdate(Request $request, $id)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:7,15',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the user to update
        $user = User::findOrFail($id);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('users', 'public');
        } else {
            $imagePath = $user->image;
        }

        // Update user data
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'description' => $request->description,
            'email' => $request->email,
            'status' => $request->status,
            'order' => $request->order,
            'image' => $imagePath,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.view_user')->with('success', 'User account updated successfully.');
    }

    public function usersDelete($id)
    {
        // Find user by id
        $user = User::findOrFail($id);

        // Delete user image if exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.users.view_user')->with('success', 'User account deleted successfully.');
    }
}
