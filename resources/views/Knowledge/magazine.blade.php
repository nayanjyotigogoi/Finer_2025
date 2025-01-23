@extends('layouts.layout')

@push('styles')
<link href="{{ asset('css/magazine.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="header">
    <h1>Magazines</h1>
    <img src="assests/about-us-bg.jpg" alt="Background Image">
</div>

<h2 class="press-release">// Magazines</h2>

<div class="magazine-grid">
    @foreach($magazines as $magazine)
        <div class="magazine-card">
            @if($magazine->image)
                <img src="{{ asset('storage/' . $magazine->image) }}" alt="{{ $magazine->page_title }}" class="magazine-image">
            @else
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/new%20file%20(12).jpg-pmWy4wPOYaQDRE5vn4a5mZxowO3sIH.jpeg" alt="{{ $magazine->page_title }}" class="magazine-image">
            @endif

            <div class="magazine-content">
                <h3>{{ $magazine->page_title }}</h3>
                <p>{{ \Str::limit($magazine->description, 100) }}</p> <!-- Display a short description -->

                @if($magazine->pdf)
                <a href="{{ asset('storage/' . $magazine->pdf) }}" download class="download-btn">
                    <i class="fa fa-download"></i>  Download
                </a>

                @else
                    <span>No PDF available</span>
                @endif
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination Controls -->
<div class="pagination">
    {{ $magazines->links() }}
</div>

@endsection
