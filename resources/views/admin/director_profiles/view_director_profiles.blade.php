@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Director Profiles</h5>

                            <!-- Filter Form -->
                            <form id="filterForm" class="mb-4 d-flex align-items-center">
                                @csrf
                                <div class="row flex-grow-1">
                                    <!-- Search by Name -->
                                    <div class="col-md-3">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Search Name">
                                    </div>
                                    <!-- Filter by Status -->
                                    <div class="col-md-3">
                                        <select id="status" name="status" class="form-control">
                                            <option value="">All Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <!-- Optional: Filter by Company -->
                                    <div class="col-md-3">
                                        <input type="text" id="company" name="company" class="form-control" placeholder="Search Company">
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
                            <div id="directorProfilesTable">
                                @include('admin.director_profiles.partials.director_profiles_table', ['directorProfiles' => $directorProfiles])
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
        const directorProfilesTable = document.getElementById('directorProfilesTable');

        // Function to fetch filtered results
        function fetchFilteredResults(url = '{{ route('director_profiles.view') }}') {
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
                    const newTable = tempDiv.querySelector('#directorProfilesTable');
                    if (newTable) {
                        directorProfilesTable.innerHTML = newTable.innerHTML;
                    } else {
                        directorProfilesTable.innerHTML = `<p class="text-center">No results found.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching filtered results:', error);
                    directorProfilesTable.innerHTML = `<p class="text-center text-danger">Error loading data.</p>`;
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
            document.getElementById('company').value = '';

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
