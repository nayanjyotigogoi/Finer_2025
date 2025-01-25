<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>PDF</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($magazines as $magazine)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $magazine->page_title }}</td>
            <td>{{ \Str::limit($magazine->description, 50) }}</td>
            <td>
                @if($magazine->image)
                    <img src="{{ asset('storage/' . $magazine->image) }}" alt="Magazine Image" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $magazine->status ? 'Active' : 'Inactive' }}</td>
            <td>
                @if($magazine->pdf)
                    <a href="{{ asset('storage/' . $magazine->pdf) }}" download class="download-button">Download PDF</a>
                @else
                    <span>No PDF available</span>
                @endif
            </td>
            <td>
                <a href="{{ route('magazines.edit', $magazine->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('magazines.destroy', $magazine->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No Magazines Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $magazines->links() }}
</div>
