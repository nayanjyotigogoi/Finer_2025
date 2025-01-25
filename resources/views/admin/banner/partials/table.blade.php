<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>Caption</th>
            <th>Image</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($banners as $banner)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $banner->name }}</td>
            <td>{{ $banner->caption }}</td>
            <td>
                @if($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $banner->order }}</td>
            <td>
                <span class="badge {{ $banner->status == 1 ? 'bg-success' : 'bg-danger' }}">
                    {{ $banner->status == 1 ? 'Active' : 'Inactive' }}
                </span>
            </td>
            <td>
                <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No banners found</td>
        </tr>
        @endforelse
    </tbody>
</table>

