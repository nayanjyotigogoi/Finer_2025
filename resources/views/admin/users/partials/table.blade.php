<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>SL No</th>
            <!-- <th>Profile</th> -->
            <th>Name</th>
            <th>Email</th>
            <!-- <th>Phone</th>
            <th>Designation</th> -->
            <!-- <th>Status</th>
            <th>Order</th> -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <!-- <td>
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Profile" class="rounded-circle" width="50" height="50">
                    @else
                        <img src="{{ asset('default-avatar.png') }}" alt="Default Profile" class="rounded-circle" width="50" height="50">
                    @endif
                </td> -->
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <!-- <td>{{ $user->phone }}</td>
                <td>{{ $user->designation ?? 'N/A' }}</td> -->
                <!-- <td>
                    <span class="badge bg-{{ $user->status == 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($user->status) }}
                    </span>
                </td>
                <td>{{ $user->order }}</td> -->
                <td>
                    <a href="{{ route('admin.users.edit_user', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
