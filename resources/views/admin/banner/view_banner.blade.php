@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Banners</h5>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
                                                        <img 
                                                            src="{{ asset('storage/' . $banner->image) }}" 
                                                            alt="Banner Image" 
                                                            class="img-thumbnail" 
                                                            width="100"
                                                        >
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $banner->order }}</td>
                                                <td>
                                                    <span class="badge {{ $banner->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $banner->status == 1 ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a 
                                                        href="{{ route('banners.edit', $banner->id) }}" 
                                                        class="btn btn-sm btn-warning"
                                                    >
                                                        Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form 
                                                        action="{{ route('banners.destroy', $banner->id) }}" 
                                                        method="POST" 
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this banner?');"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No banners found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div><!-- End Table -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
