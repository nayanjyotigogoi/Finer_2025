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
            <!-- @if($banner)
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="Featured Event" class="featured-image">
                        <p>{{ $banner->caption }}</p>
                    @else
                        <p>No featured event available.</p>
                    @endif -->
            @if (!empty($banner) && !empty($banner->image))
                @if (file_exists(public_path('storage/' . $banner->image)))
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Featured Event" class="featured-image">
                @elseif (file_exists(public_path('uploads/' . $banner->image)))
                    <img src="{{ asset('uploads/' . $banner->image) }}" alt="Featured Event" class="featured-image">
                @else
                    <img src="{{ asset('assests/event.jpeg') }}" alt="Event Image">
                @endif
            @else
                <!-- <p>No featured event available.</p> -->
                <img src="{{ asset('assests/event.jpeg') }}" alt="Event Image">
            @endif

        </section>

        <section class="events-section">
            <h2>Upcoming Events</h2>
            <div class="events-list" id="eventsList">
                @foreach($events as $event)
                    <div class="event-card">
                        <div class="date-badge">
                            <span class="month">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</span>
                            <span class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                        </div>
                        <!-- <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="event-image"> -->
                        @if (!empty($event) && !empty($event->image))
                            @if (file_exists(public_path('storage/' . $event->image)))
                                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="event-image">
                            @elseif (file_exists(public_path('uploads/' . $event->image)))
                                <img src="{{ asset('uploads/' . $event->image) }}" alt="Event Image" class="event-image">
                            @else
                                <img src="{{ asset('assests/event.jpeg') }}" alt="Default Event Image" class="event-image">
                            @endif
                        @else
                            <img src="{{ asset('assests/event.jpeg') }}" alt="Default Event Image" class="event-image">
                        @endif

                        <div class="event-content">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            <p class="event-date">{{ $event->start_date }}</p>
                            <p class="event-description">
                                {{ $event->description }}
                            </p>

                            <button class="read-more" onclick="toggleDescription('{{ $event->id }}')">Read More</button>

                        </div>

                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Pagination Links -->
    <div class="pagination">
        {{ $events->links() }} <!-- This generates the pagination links -->
    </div>

@endsection
@push('scripts')
    <script>
        const events = @json($events);
    </script>

    <script src="{{ asset('js/upcoming_events.js') }}"></script>
@endpush