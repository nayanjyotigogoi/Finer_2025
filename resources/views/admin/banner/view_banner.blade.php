@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Banners</h5>

                            <!-- Filter Form -->
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

                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <select name="status" id="status" class="form-select">
                                            <option value="">All</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Search Button -->
                                    <div class="col-md-2">
                                    <button type="submit" id="filterSubmit" class="btn btn-primary">
                                            <i class="fas fa-search"></i> 
                                        </button>

                                        <!-- Refresh Button -->
                                        <button type="submit" id="refreshTable" class="btn btn-outline-secondary ms-2" title="Refresh Table">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Table -->
                            <div id="bannersTable" class="table-responsive">
                                @include('admin.banner.partials.table', ['banners' => $banners])
                            </div>

                            <!-- Pagination -->
                            <div id="paginationWrapper" class="d-flex justify-content-center">
                                {{ $banners->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.getElementById('filterForm');
    const searchInput = document.getElementById('search');
    const statusSelect = document.getElementById('status');
    const filterSubmit = document.getElementById('filterSubmit'); // Search Button
    const refreshButton = document.getElementById('refreshButton'); // Refresh Button
    const bannersTable = document.getElementById('bannersTable');
    const paginationWrapper = document.getElementById('paginationWrapper');

    // Function to fetch filtered results
    function fetchFilteredResults(url = '{{ route('banners.view') }}') {
        const formData = new FormData(filterForm); // Collect form data
        const queryString = new URLSearchParams(formData).toString();

        fetch(`${url}?${queryString}`)
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Update table body
                const newTable = tempDiv.querySelector('#bannersTable');
                if (newTable) {
                    bannersTable.innerHTML = newTable.innerHTML;
                }

                // Update pagination
                const newPagination = tempDiv.querySelector('#paginationWrapper');
                if (newPagination) {
                    paginationWrapper.innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => console.error('Error fetching filtered results:', error));
    }

    // Trigger filter on Search button click
    filterSubmit.addEventListener('click', function (e) {
        e.preventDefault();
        fetchFilteredResults();
    });

    // Trigger filter on status change
    statusSelect.addEventListener('change', () => fetchFilteredResults());

    // Refresh button
    refreshButton.addEventListener('click', function () {
        filterForm.reset(); // Reset the form
        fetchFilteredResults(); // Fetch unfiltered results
    });

    // Handle pagination links dynamically
    document.addEventListener('click', function (event) {
        if (event.target.tagName === 'A' && event.target.closest('.pagination')) {
            event.preventDefault();
            fetchFilteredResults(event.target.href);
        }
    });
});
</script>
@endpush
@endsection
