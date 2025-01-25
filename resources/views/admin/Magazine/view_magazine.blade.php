@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Magazines</h5>

                            <!-- Filter Form -->
                            <form id="filterForm" class="mb-4">
                                @csrf
                                <div class="row">
                                    <!-- Search by Title -->
                                    <div class="col-md-3">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Search Title">
                                    </div>
                                    <!-- Filter by Status -->
                                    <div class="col-md-3">
                                        <select id="status" name="status" class="form-control">
                                            <option value="">All Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <!-- Filter Submit -->
                                    <div class="col-md-3">
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
                            <div id="magazineTable">
                                @include('admin.Magazine.partials.magazine_table', ['magazines' => $magazines])
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
        const refreshButton = document.getElementById('refreshTable');
        const magazineTable = document.getElementById('magazineTable');

        // Function to fetch filtered results
        function fetchFilteredResults(url = '{{ route('magazines.view') }}') {
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

                    // Replace the table content
                    const newTable = tempDiv.querySelector('#magazineTable');
                    if (newTable) {
                        magazineTable.innerHTML = newTable.innerHTML;
                    } else {
                        magazineTable.innerHTML = `<p class="text-center">No results found.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching filtered results:', error);
                    magazineTable.innerHTML = `<p class="text-center text-danger">Error loading data.</p>`;
                });
        }

        // Trigger filtering on button click
        filterSubmit.addEventListener('click', () => {
            fetchFilteredResults();
        });

        // Trigger refresh on button click
        refreshButton.addEventListener('click', () => {
            // Clear form inputs
            document.getElementById('search').value = '';
            document.getElementById('status').value = '';

            // Fetch the unfiltered results
            fetchFilteredResults();
        });

        // Optional: Trigger filtering on form input change
        filterForm.addEventListener('input', () => {
            fetchFilteredResults();
        });
    });
</script>
@endpush
