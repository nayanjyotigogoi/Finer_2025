@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-16">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Events</h5>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Event Date</th>
                                        <th>status</th>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td>
                                                    <span class="badge {{ $event->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $event->status == 1 ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                        <td>{{ $event->order }}</td>
                                        <td>
                                            @if($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-thumbnail" width="100">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                       
                                        <td>
                                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
