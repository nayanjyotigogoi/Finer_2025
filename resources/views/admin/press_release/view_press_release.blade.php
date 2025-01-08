@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Press Releases</h5>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>PDF</th>
                                        <!-- <th>Created At</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pressReleases as $pressRelease)
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
                                            @if($pressRelease->pdf)
                                                <a href="{{ asset('storage/' . $pressRelease->pdf) }}" download class="download-button">Download PDF</a>
                                            @else
                                                <span>No PDF available</span>
                                            @endif
                                        </td>
                                        <!-- <td>{{ $pressRelease->created_at }}</td> -->
                                        <td>
                                            <a href="{{ route('press_releases.edit', $pressRelease->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('press_releases.destroy', $pressRelease->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
