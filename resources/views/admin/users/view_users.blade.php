@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Users</h5>

                            <!-- Filter Form -->
                            <form id="filterForm" method="GET" action="{{ route('admin.users.view_user') }}">
                                <div class="row mb-3">
                                    <!-- Search -->
                                    <div class="col-md-4">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search by Name or Email" value="{{ request('search') }}">
                                    </div>

                                    <!-- Status Filter -->
                                    <div class="col-md-3">
                                        <select name="status" id="status" class="form-select">
                                            <option value="">All Status</option>
                                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="col-md-2 d-flex">
                                        <button type="submit" id="filterSubmit" class="btn btn-primary me-2" title="Search">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button type="button" id="refreshTable" class="btn btn-outline-secondary" title="Refresh Table">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Users Table -->
                            <div id="usersTable" class="table-responsive">
                                @include('admin.users.partials.table', ['users' => $users])
                            </div>

                            <!-- Pagination -->
                            <div id="paginationWrapper" class="d-flex justify-content-center">
                                {{ $users->links() }}
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
    const filterSubmit = document.getElementById('filterSubmit');
    const refreshButton = document.getElementById('refreshTable');
    const usersTable = document.getElementById('usersTable');
    const paginationWrapper = document.getElementById('paginationWrapper');

    function fetchFilteredResults(url = '{{route('admin.users.view_user')}}') {
        const formData = new FormData(filterForm);
        const queryString = new URLSearchParams(formData).toString();

        fetch(`${url}?${queryString}`)
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                const newTable = tempDiv.querySelector('#usersTable');
                if (newTable) {
                    usersTable.innerHTML = newTable.innerHTML;
                }

                const newPagination = tempDiv.querySelector('#paginationWrapper');
                if (newPagination) {
                    paginationWrapper.innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => console.error('Error fetching filtered results:', error));
    }

    filterSubmit.addEventListener('click', function (e) {
        e.preventDefault();
        fetchFilteredResults();
    });

    refreshButton.addEventListener('click', function () {
        filterForm.reset();
        fetchFilteredResults();
    });

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
