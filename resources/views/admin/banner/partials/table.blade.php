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
                    @if (!empty($banner->image) && file_exists(public_path('uploads/' . $banner->image)))
                        <img src="{{ asset('uploads/' . $banner->image) }}" alt="Banner image"
                            style="width: 50px; height: 50px; border-radius: 50%;" class="img-thumbnail">
                    @elseif (!empty($banner->image) && file_exists(public_path('storage/' . $banner->image)))
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="50" height="50" class="img-thumbnail">

                        <!-- <img src="{{ asset('uploads/banners/' . basename($banner->image)) }}" alt="Banner Image" width="50"
                            height="50" class="img-thumbnail"> -->
                    @else
                        <img src="{{ asset('assests/user.png') }}" alt="Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif

                    <!-- @if (!empty($profile->photo) && file_exists(public_path('uploads/' . $profile->photo)))
                        <img src="{{ asset('uploads/' . $profile->photo) }}" alt="Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @elseif (!empty($profile->photo) && file_exists(public_path('storage/' . $profile->photo)))
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        <img src="{{ asset('assests/user.png') }}" alt="Photo"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif -->
                </td>
                <td>{{ $banner->order }}</td>
                <td>
                    <span class="badge {{ $banner->status == 1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $banner->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Are you sure?');">
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