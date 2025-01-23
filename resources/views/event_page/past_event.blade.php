@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/upcoming_events.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="header">
        <h1>Past Events</h1>
        <img src="assests/about-us-bg.jpg" alt="Background Image">
    </div>

    <div class="container-event">
     
        <section class="events-section">
            <h2>Past Events</h2>
            <div class="events-list" id="eventsList">
                @foreach($events as $event)
                    <div class="event-card">
                        <img src="{{ asset('storage/'. $event->image) }}" alt="Event Image" class="event-image">
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
            </div>
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