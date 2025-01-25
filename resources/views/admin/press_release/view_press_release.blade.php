@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Press Releases</h5>

                            <!-- Filter Form -->
                            <form id="filterForm" class="mb-4">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Search Title">
                                    </div>
                                    <div class="col-md-3">
                                        <select id="status" name="status" class="form-control">
                                            <option value="">All Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" id="filterSubmit" class="btn btn-primary">
                                            <i class="fas fa-search"></i> 
                                        </button>

                                        <button type="button" id="refreshButton" class="btn btn-secondary">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Table -->
                            <div id="dataTable">
                                @include('admin.press_release.partials.press_table', ['pressReleases' => $pressReleases])
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
        const filterSubmit = document.getElementById('filterSubmit');
        const refreshButton = document.getElementById('refreshButton');
        const dataTable = document.getElementById('dataTable');

        // Function to fetch filtered results
        function fetchFilteredResults(url = '{{ route('press_releases.view') }}') {
            const formData = new FormData(filterForm); // Collect form data
            const queryString = new URLSearchParams(formData).toString();

            fetch(`${url}?${queryString}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(html => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;

                    // Replace table content
                    const newTable = tempDiv.querySelector('#dataTable');
                    if (newTable) {
                        dataTable.innerHTML = newTable.innerHTML;
                    } else {
                        dataTable.innerHTML = `<p class="text-center">No results found.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching filtered results:', error);
                    dataTable.innerHTML = `<p class="text-center text-danger">Error loading data.</p>`;
                });
        }

        // Trigger filtering on button click
        filterSubmit.addEventListener('click', function (e) {
            e.preventDefault();
            fetchFilteredResults();
        });

        // Trigger filtering on form input
        filterForm.addEventListener('input', () => {
            fetchFilteredResults();
        });

        // Refresh button functionality
        refreshButton.addEventListener('click', function () {
            filterForm.reset(); // Reset form fields
            fetchFilteredResults(); // Reload original data
        });
    });
</script>
@endpush
