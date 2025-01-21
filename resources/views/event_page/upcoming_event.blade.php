@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/upcoming_events.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="header">
        <h1>Upcoming Events</h1>
        <img src="assests/about-us-bg.jpg" alt="Background Image">
    </div>

    <div class="container-event">
        <section class="featured-event">
            <h2>Featured Event</h2>
            @if($banner)
                <img src="{{ asset('storage/' . $banner->image) }}" alt="Featured Event" class="featured-image">
                <p>{{ $banner->caption }}</p>
            @else
                <p>No featured event available.</p>
            @endif
        </section>

        <section class="events-section">
            <h2>Upcoming Events</h2>
            <div class="events-list" id="eventsList"></div>
        </section>
    </div>

        <div class="pagination">
            <button onclick="changePage('prev')">← Back</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>5</button>
            <button onclick="changePage('next')">Next →</button>
        </div>

@endsection
@push('scripts')
<script>
   const events = @json($events);
</script>

<script src="{{ asset('js/upcoming_events.js') }}"></script>
@endpush