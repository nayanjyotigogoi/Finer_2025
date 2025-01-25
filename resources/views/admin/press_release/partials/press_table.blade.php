<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pressReleases as $pressRelease)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pressRelease->page_title }}</td>
            <td>{{ \Str::limit($pressRelease->description, 50) }}</td>
            <td>
                @if($pressRelease->image)
                    <img src="{{ asset('storage/' . $pressRelease->image) }}" alt="Press Release Image" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $pressRelease->status ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route('press_releases.edit', $pressRelease->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('press_releases.destroy', $pressRelease->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No Press Releases Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $pressReleases->links() }}
</div>
