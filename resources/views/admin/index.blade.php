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
        <!-- <div class="card-body">
            <p>Today's date is: {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
            <p>The current time is: {{ \Carbon\Carbon::now()->toTimeString() }}</p>
        </div> -->
             <!-- Collapsible User Manual Section -->
        <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Button to toggle the collapsible user manual -->
            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#userManual" aria-expanded="false" aria-controls="userManual">
                Admin User Manual
            </button>

            <!-- Collapsible User Manual Card -->
            <div class="card collapse" id="userManual">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Admin User Manual</h5>
                </div>
                <div class="card-body">
                    <p class="fw-semibold mb-3">Welcome to the Admin Panel! Here's a quick guide to help you manage the system.</p>

                    <h6 class="fw-bold">Managing Banners</h6>
                    <p>Banners can be added, updated, or deleted from the "Banner" section. You can upload images and provide relevant details for each banner.</p>

                    <h6 class="fw-bold">Managing Events</h6>
                    <p>The "Events" section allows you to add new events, update existing ones, or remove outdated ones. Make sure to keep event details up-to-date.</p>

                    <h6 class="fw-bold">Managing Press Releases</h6>
                    <p>Press releases can be managed through the "Press Release" section. You can add new releases, update existing ones, and delete any irrelevant content.</p>

                    <h6 class="fw-bold">Managing Board Members</h6>
                    <p>Under the "Board Members" section, you can add new members, update their profiles, or remove outdated information about members.</p>

                    <h6 class="fw-bold">Managing Past Presidents</h6>
                    <p>The "Past Presidents" section lets you manage profiles of past presidents. Add new entries, update existing ones, or delete unnecessary records.</p>

                    <h6 class="fw-bold">Recent Activity</h6>
                    <p>The "Recent Activity" section displays all recent changes made to the system, including additions, updates, and deletions of records.</p>
                </div>
            </div><!-- End User Manual Card -->
        </div>
        </div><!-- End User Manual Section -->
    </div><!-- End Welcome Section -->



    <!-- Recent Activity Section -->
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Activity <span class="text-muted">| By Admin</span></h5>
                </div>
                <div class="card-body">
                    <div class="activity">
                        @if($recentActivities->isNotEmpty())
                            @foreach($recentActivities as $activity)
                                <div class="activity-item d-flex gap-3 align-items-start py-3 border-bottom">
                                    <div class="activite-label text-muted small">
                                        {{ $activity['date']->diffForHumans() }}
                                    </div>
                                    <div class="activity-content">
                                        <span class="fw-semibold">{{ $activity['message'] }}</span>
                                    </div>
                                </div><!-- End activity item -->
                            @endforeach
                        @else
                            <div class="activity-item py-3 text-center">
                                <p class="text-muted">No recent activity found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- End Recent Activity -->
        </div>
    </div><!-- End row -->

    <!-- End Recent Activity Section -->


</main><!-- End #main -->

@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush
