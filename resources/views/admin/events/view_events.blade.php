@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-16">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Events</h5>

                            <!-- Filter Form -->
<!-- Filter Form -->
                            <form id="filterForm" method="GET" action="{{ route('events.view') }}" class="mb-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ request('title') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{ request('description') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">All Status</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" name="event_date" id="event_date" class="form-control" value="{{ request('event_date') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="order" id="order" class="form-control" placeholder="Order" value="{{ request('order') }}">
                                    </div>
                                    <div class="col-md-2 d-flex gap-2">
                                    <button type="submit" id="filterSubmit" class="btn btn-primary w-30">
                                                                        <i class="fas fa-search"></i>
                                                                    </button>
                                        <!-- Refresh Button -->
                                        <button type="button" id="refreshTable" class="btn btn-outline-secondary" title="Refresh Filters">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                            <!-- Events Table -->
                            <div id="eventsTable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Event Date</th>
                                            <th>Status</th>
                                            <th>Order</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->description }}</td>
                                            <td>{{ $event->event_date }}</td>
                                            <td>
                                                <span class="badge {{ $event->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $event->status == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $event->order }}</td>
                                            <td>
                                                @if($event->image)
                                                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-thumbnail" width="100">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div id="pagination" class="d-flex justify-content-center">
                                {{ $events->appends(request()->query())->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.getElementById('filterForm');
    const searchInput = document.getElementById('search');
    const statusSelect = document.getElementById('status');
    const eventDateInput = document.getElementById('event_date');
    const orderInput = document.getElementById('order');
    const filterSubmit = document.getElementById('filterSubmit'); // Search Button
    const eventsTableBody = document.getElementById('eventsBody'); // Where table rows will be injected
    const paginationWrapper = document.getElementById('paginationWrapper'); // For pagination links

    // Function to fetch filtered results
    function fetchFilteredResults(url = '/admin/events') {
        const formData = new FormData(filterForm); // Collect form data
        const queryString = new URLSearchParams(formData).toString();

        fetch(`${url}?${queryString}`)
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Update table body
                const newTbody = tempDiv.querySelector('tbody');
                if (newTbody) {
                    eventsTableBody.innerHTML = newTbody.innerHTML;
                }

                // Update pagination
                const newPagination = tempDiv.querySelector('.pagination');
                if (newPagination && paginationWrapper) {
                    paginationWrapper.innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => console.error('Error fetching filtered results:', error));
    }

    // Reset the table to original unfiltered data when the page loads
    const searchQuery = new URLSearchParams(window.location.search).get('search');
    const statusQuery = new URLSearchParams(window.location.search).get('status');
    const eventDateQuery = new URLSearchParams(window.location.search).get('event_date');
    const orderQuery = new URLSearchParams(window.location.search).get('order');

    // If no filters are in the URL, display original data
    if (!searchQuery && !statusQuery && !eventDateQuery && !orderQuery) {
        fetchFilteredResults(); // Show original data without filters
    } else {
        // Apply filters if query parameters exist
        if (searchQuery) {
            searchInput.value = searchQuery; // Set the search input value
        }
        if (statusQuery) {
            statusSelect.value = statusQuery; // Set the status dropdown value
        }
        if (eventDateQuery) {
            eventDateInput.value = eventDateQuery; // Set the event date value
        }
        if (orderQuery) {
            orderInput.value = orderQuery; // Set the order value
        }

        fetchFilteredResults(); // Fetch filtered data based on the query parameters
    }

    // Trigger filter on Search button click
    filterSubmit.addEventListener('click', () => {
        fetchFilteredResults(); // Fetch filtered results when button is clicked
    });

    // Trigger search filter on typing with a delay (debounce)
    let debounceTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            fetchFilteredResults(); // Trigger the filter on typing
        }, 300); // Adjust the delay (300ms) if necessary
    });

    // Trigger status filter on change
    statusSelect.addEventListener('change', () => {
        fetchFilteredResults(); // Trigger the filter on status change
    });

    // Trigger event date filter on change
    eventDateInput.addEventListener('change', () => {
        fetchFilteredResults(); // Trigger the filter on date change
    });

    // Trigger order filter on change
    orderInput.addEventListener('change', () => {
        fetchFilteredResults(); // Trigger the filter on order change
    });

    // Handle pagination links dynamically
    document.addEventListener('click', function (event) {
        if (event.target.tagName === 'A' && event.target.closest('.pagination')) {
            event.preventDefault();
            fetchFilteredResults(event.target.href);
        }
    });

    // Export buttons (if needed)
    document.getElementById('exportCsv').addEventListener('click', () => window.location.href = `/admin/events/export/csv`);
    document.getElementById('exportPdf').addEventListener('click', () => window.location.href = `/admin/events/export/pdf`);
});
</script>

@endpush
