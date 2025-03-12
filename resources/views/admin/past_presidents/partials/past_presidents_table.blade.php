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
        @forelse($pastPresidents as $president)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <!-- @if($president->photo)
                        <img src="{{ asset('storage/' . $president->photo) }}" alt="Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        No Photo
                    @endif -->
                    @if (!empty($president->photo) && file_exists(public_path('uploads/' . $president->photo)))
                        <img src="{{ asset('uploads/' . $president->photo) }}" alt="Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @elseif (!empty($president->photo) && file_exists(public_path('storage/' . $president->photo)))
                        <img src="{{ asset('storage/' . $president->photo) }}" alt="Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        <img src="{{ asset('assets/user.png') }}" alt="No Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif

                </td>
                <td>{{ $president->name }}</td>
                <td>{{ $president->position }}</td>
                <td>{{ $president->company }}</td>
                <td>
                    <span class="badge {{ $president->status == 1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $president->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('past_presidents.edit', $president->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('past_presidents.destroy', $president->id) }}" method="POST"
                        style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No Past Presidents Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $pastPresidents->links() }}
</div>