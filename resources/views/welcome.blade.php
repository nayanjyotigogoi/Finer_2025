<!-- FontAwesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

@extends('layouts.admin_app')

@section('title', 'View Banners')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Banners</h5>

                            <!-- Filters Section -->
                            <div class="mb-3">
                                <form id="filterForm">
                                    <div class="row">
                                        <!-- Search -->
                                        <div class="col-md-4">
                                            <input 
                                                type="text" 
                                                name="search" 
                                                id="search" 
                                                class="form-control" 
                                                placeholder="Search by Name or Caption" 
                                                value="{{ request('search') }}">
                                        </div>

                                        <!-- Status Filter -->
                                        <div class="col-md-3">
                                            <select name="status" id="status" class="form-select">
                                                <option value="">All Statuses</option>
                                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <!-- Search Button with Icon -->
                                        <div class="col-md-2">
                                            <button type="submit" id="filterSubmit" class="btn btn-primary w-30">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                        <!-- Export Buttons with Icons -->
                                        <div class="col-md-3 text-end">
                                            <button type="button" id="exportCsv" class="btn btn-primary">
                                                <i class="fas fa-file-csv"></i> 
                                            </button>
                                            <button type="button" id="exportPdf" class="btn btn-secondary">
                                                <i class="fas fa-file-pdf"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Table -->
                            <div id="bannerTable" class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Caption</th>
                                            <th>Image</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bannerTableBody">
                                        @include('admin.banner.partials.table', ['banners' => $banners])
                                    </tbody>
                                </table>
                            </div><!-- End Table -->
                            <!-- Pagination -->
                            <div id="paginationWrapper" class="pagination justify-content-center">
                                @if($banners->links())
                                    {{ $banners->links() }}
                                @endif
                            </div>

    

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- AJAX Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.getElementById('filterForm');
    const searchInput = document.getElementById('search');
    const statusSelect = document.getElementById('status');
    const filterSubmit = document.getElementById('filterSubmit'); // Search Button
    const bannerTableBody = document.getElementById('bannerTableBody');

    // Function to fetch filtered results
    function fetchFilteredResults(url = '/admin/banners') {
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
                    bannerTableBody.innerHTML = newTbody.innerHTML;
                }

                // Update pagination
                const newPagination = tempDiv.querySelector('.pagination');
                const paginationWrapper = document.querySelector('#paginationWrapper');
                if (newPagination && paginationWrapper) {
                    paginationWrapper.innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => console.error('Error fetching filtered results:', error));
    }

    // Reset the table to original unfiltered data when the page loads
    // (only if no filters are applied in the URL)
    const searchQuery = new URLSearchParams(window.location.search).get('search');
    const statusQuery = new URLSearchParams(window.location.search).get('status');

    // If no filters are in the URL, display original data
    if (!searchQuery && !statusQuery) {
        fetchFilteredResults('/admin/banners'); // Show original data without filters
    } else {
        // Apply filters if query parameters exist
        if (searchQuery) {
            searchInput.value = searchQuery; // Set the search input value
        }
        if (statusQuery) {
            statusSelect.value = statusQuery; // Set the status dropdown value
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

    // Handle pagination links dynamically
    document.addEventListener('click', function (event) {
        if (event.target.tagName === 'A' && event.target.closest('.pagination')) {
            event.preventDefault();
            fetchFilteredResults(event.target.href);
        }
    });

    // Export buttons
    document.getElementById('exportCsv').addEventListener('click', () => window.location.href = `/admin/banners/export/csv`);
    document.getElementById('exportPdf').addEventListener('click', () => window.location.href = `/admin/banners/export/pdf`);
});

</script>

@endsection
