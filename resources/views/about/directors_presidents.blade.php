@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/directors_presidents.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="header">
    <h1>Board of Directors<br>&<br>Past Presidents</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div>


    <section class="BOD-section">
        <div class="BOD-container">
            <h2 class="BOD-section-title">Board of Directors</h2>
            <div class="BOD-carousel">
                <button class="BOD-nav-button BOD-prev" data-target="directors-container">❮</button>
                <div class="BOD-carousel-container" id="directors-container">
                    <!-- Dynamic content will be inserted here -->
                </div>
                <button class="BOD-nav-button BOD-next" data-target="directors-container">❯</button>
            </div>
        </div>
    </section>

    <section class="BOD-section">
        <div class="BOD-container">
            <h2 class="BOD-section-title">Past Presidents</h2>
            <div class="BOD-carousel">
                <button class="BOD-nav-button BOD-prev" data-target="presidents-container">❮</button>
                <div class="BOD-carousel-container" id="presidents-container">
                    <!-- Dynamic content will be inserted here -->
                </div>
                <button class="BOD-nav-button BOD-next" data-target="presidents-container">❯</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const directorsData = @json($directors);
    const pastPresidentsData = @json($pastPresidents);
</script>
<script src="{{ asset('js/directors_presidents.js') }}"></script>
@endpush
