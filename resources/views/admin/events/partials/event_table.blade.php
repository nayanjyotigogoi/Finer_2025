<!-- resources/views/admin/events/partials/_events_table.blade.php -->
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
