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
                    <!-- @if($magazine->image)
                            <img src="{{ asset('storage/' . $magazine->image) }}" alt="Magazine Image" width="50" height="50">
                        @else
                            No Image
                        @endif -->
                    @if (!empty($magazine->image) && file_exists(public_path('uploads/' . $magazine->image)))
                        <img src="{{ asset('uploads/' . $magazine->image) }}" alt="Magazine Image"
                            style="width: 50px; height: 50px; border-radius: 5px;">
                    @elseif (!empty($magazine->image) && file_exists(public_path('storage/' . $magazine->image)))
                        <img src="{{ asset('storage/' . $magazine->image) }}" alt="Magazine Image"
                            style="width: 50px; height: 50px; border-radius: 5px;">
                    @else
                        <img src="{{ asset('assets/event.jpeg') }}" alt="Magazine Image"
                            style="width: 50px; height: 50px; border-radius: 5px;">
                    @endif

                </td>
                <td>
                    <!-- {{ $magazine->status ? 'Active' : 'Inactive' }} -->
                    <span class="badge {{ $magazine->status == 1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $magazine->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <!-- @if($magazine->pdf)
                            <a href="{{ asset('storage/' . $magazine->pdf) }}" download class="download-button">Download PDF</a>
                        @else
                            <span>No PDF available</span>
                        @endif -->
                    @if (!empty($magazine->pdf) && file_exists(public_path('uploads/' . $magazine->pdf)))
                        <a href="{{ asset('uploads/' . $magazine->pdf) }}" download class="download-button">Download PDF</a>
                    @elseif (!empty($magazine->pdf) && file_exists(public_path('storage/' . $magazine->pdf)))
                        <a href="{{ asset('storage/' . $magazine->pdf) }}" download class="download-button">Download PDF</a>
                    @else
                        <span>No PDF available</span>
                    @endif

                </td>
                <td>
                    <a href="{{ route('magazines.edit', $magazine->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('magazines.destroy', $magazine->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Are you sure?');">
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