@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Past Presidents</h5>

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
                                    <!-- Filter by Company -->
                                    <div class="col-md-3">
                                        <input type="text" id="company" name="company" class="form-control" placeholder="Search Company">
                                    </div>
                                    <!-- Submit Filter -->
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
                            <div id="pastPresidentsTable">
                                @include('admin.past_presidents.partials.past_presidents_table', ['pastPresidents' => $pastPresidents])
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
        const pastPresidentsTable = document.getElementById('pastPresidentsTable');

        // Function to fetch filtered results
        function fetchFilteredResults(url = '{{ route('past_presidents.view') }}') {
            const formData = new FormData(filterForm);
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

                    const newTable = tempDiv.querySelector('#pastPresidentsTable');
                    if (newTable) {
                        pastPresidentsTable.innerHTML = newTable.innerHTML;
                    } else {
                        pastPresidentsTable.innerHTML = `<p class="text-center">No results found.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching filtered results:', error);
                    pastPresidentsTable.innerHTML = `<p class="text-center text-danger">Error loading data.</p>`;
                });
        }

        // Trigger filtering on button click
        filterSubmit.addEventListener('click', () => {
            fetchFilteredResults();
        });

        // Trigger refresh on button click
        refreshButton.addEventListener('click', () => {
            // Reset form inputs
            document.getElementById('search').value = '';
            document.getElementById('status').value = '';
            document.getElementById('company').value = '';

            // Fetch unfiltered results
            fetchFilteredResults();
        });
    });
</script>
@endpush
