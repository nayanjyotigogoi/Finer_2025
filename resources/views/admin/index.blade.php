@extends("layouts.admin_app")

@stack('styles')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Welcome Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Welcome, Admin</h3>
        </div>
        <div class="card-body">
            <p>Today's date is: {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
            <p>The current time is: {{ \Carbon\Carbon::now()->toTimeString() }}</p>
        </div>
    </div><!-- End Welcome Section -->

    <!-- Recent Activity Section -->
    <div class="card">
        <div class="card-header">
            <h4>Recent Activity</h4>
        </div>
        <div class="card-body">
            <ul>
                <li>New press release added on {{ \Carbon\Carbon::now()->subDays(1)->toFormattedDateString() }}</li>
                <li>User profile updated on {{ \Carbon\Carbon::now()->subDays(2)->toFormattedDateString() }}</li>
                <li>New director profile added on {{ \Carbon\Carbon::now()->subDays(3)->toFormattedDateString() }}</li>
            </ul>
        </div>
    </div><!-- End Recent Activity Section -->

</main><!-- End #main -->

@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush
