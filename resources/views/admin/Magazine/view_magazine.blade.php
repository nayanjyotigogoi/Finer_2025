@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Magazines</h5>
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
                                    @foreach($magazines as $magazine)
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
