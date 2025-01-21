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
        <section class="featured-event">
            <h2>Past Events</h2>
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