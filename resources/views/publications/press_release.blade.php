@extends('layouts.layout')
@push('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<style>
    .header {
    position: relative;
    height: 400px; /* Adjust the height as per your design */
    overflow: hidden; /* Hide any parts of the image that go beyond the container */
    margin-bottom: 60px;
}

.header img {
    position: absolute; /* Position it within the container */
    top: 0;
    left: 0;
    width: 100%;  /* Ensure the image spans the entire width */
    height: 100%; /* Ensure the image spans the entire height */
    object-fit: cover; /* Make sure the image covers the container without stretching */
    z-index: -1; /* Push the image behind the text */
}

.header h1 {  
    color: white;
    text-align: center;
    padding-top: 180px;
    font-size: 28px;
    font-weight: bold;
}

.content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 20px;
}
</style>
@endpush

@section('content')

    <div class="header">
        <h1>Press Release</h1>
        <img src="assests/about-us-bg.jpg" alt="Background Image">
    </div>

    <div class="content">
        <section class="blog-section-page">
            <div class="blog-container">
                <div class="blog-post-container">
                    <span class="blog-section-label-page">//Press Release</span>
                    <div class="blog-post-wrapper-page">
                        <!-- Blog Posts -->
                        @foreach($pressReleases as $pressRelease)
                            <div class="blog-post-page">
                                @if($pressRelease->image)
                                    <img src="{{ asset('storage/' . $pressRelease->image) }}" alt="Blog image">
                                @else
                                    <img src="{{ asset('default-placeholder.jpg') }}" alt="Default image">
                                @endif
                                <h3 class="blog-post-h3">{{ $pressRelease->page_title }}</h3>
                                <p class="blog-post-p">{{ Str::limit($pressRelease->description, 100) }}</p>
                                @if($pressRelease->pdf)
                                    <a href="{{ asset('storage/' . $pressRelease->pdf) }}" download class="download-button">Download PDF</a>
                                @else
                                    <span>No PDF available</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{ $pressReleases->links() }}
                    </div>
                </div>
            </div>
       </section>

    </div>

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush