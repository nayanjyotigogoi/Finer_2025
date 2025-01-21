@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Past Presidents</h5>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Photo</th> <!-- Column for photo -->
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pastPresidents as $president)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($president->photo)
                                                <img src="{{ asset('storage/' . $president->photo) }}" alt="Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                                            @else
                                                No Photo
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
                                            <form action="{{ route('past_presidents.destroy', $president->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
