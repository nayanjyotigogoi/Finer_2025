@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/directors_presidents.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="header">
    <h1>Board of Directors<br>&<br>Past Presidents</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div>

<div class="container">
    <section class="BOD-section">
        <!-- Background Shapes -->
        <div class="BOD-shape BOD-shape-1"></div>
        <div class="BOD-shape BOD-shape-2"></div>

        <div class="BOD-container">
            <div class="BOD-section-title">// Our Board of Directors</div>
            <div class="BOD-carousel">
                <button class="BOD-nav-button BOD-prev">❮</button>
                <button class="BOD-nav-button BOD-next">❯</button>
                <div class="BOD-carousel-container" id="BOD-data-container">
                    <!-- Cards will be dynamically inserted here by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <section class="past-presidents-section"> 
        <!-- Background Shapes -->
        <div class="past-presidents-shape past-presidents-shape-1"></div>
        <div class="past-presidents-shape past-presidents-shape-2"></div>

        <div class="past-presidents-container">
            <div class="past-presidents-section-title">// Past Presidents</div>
            <div class="past-presidents-carousel">
                <button class="past-presidents-nav-button past-presidents-prev">❮</button>
                <button class="past-presidents-nav-button past-presidents-next">❯</button>
                <div class="past-presidents-carousel-container" id="past-presidents-data-container">
                    <!-- Cards will be dynamically inserted here by JavaScript -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script>
    const directorsData = @json($directors);
    const pastPresidentsData = @json($pastPresidents);
</script>
<script src="{{ asset('js/directors_presidents.js') }}"></script>
@endpush
