@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Director Profiles</h5>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Photo</th> <!-- New column for photo -->
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($directorProfiles as $profile)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($profile->photo)
                                                <img src="{{ asset('storage/' . $profile->photo) }}" alt="Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                                            @else
                                                No Photo
                                            @endif
                                        </td>
                                        <td>{{ $profile->name }}</td>
                                        <td>{{ $profile->position }}</td>
                                        <td>{{ $profile->company }}</td>
                                        <td>
                                            <span class="badge {{ $profile->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $profile->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('director_profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('director_profiles.destroy', $profile->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
