<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Position</th>
            <th>Company</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($directorProfiles as $profile)
            <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (!empty($profile->photo) && file_exists(public_path('uploads/' . $profile->photo)))
                            <img src="{{ asset('uploads/' . $profile->photo) }}" alt="Photo"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        @elseif (!empty($profile->photo) && file_exists(public_path('storage/' . $profile->photo)))
                            <img src="{{ asset('storage/' . $profile->photo) }}" alt="Photo"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        @else
                            <img src="{{ asset('assests/user.png') }}" alt="Photo"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        @endif
                    </td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->position }}</td>
                <td>{{ $profile->company }}</td>
                <td>
                    <span class="badge {{ $profile->status == 1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $profile->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('director_profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('director_profiles.destroy', $profile->id) }}" method="POST"
                        style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No Director Profiles Found</td>
            </tr>
        @endforelse
    </tbody>

</table>


<div id="paginationWrapper" class="d-flex justify-content-center">
    {{ $directorProfiles->appends(request()->query())->links() }}
</div>