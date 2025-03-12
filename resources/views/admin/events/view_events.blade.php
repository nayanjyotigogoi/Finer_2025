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
                                <form id="filterForm" method="GET" action="{{ route('events.view') }}" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="title" id="search" class="form-control"
                                                placeholder="Title" value="{{ request('title') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="description" class="form-control"
                                                placeholder="Description" value="{{ request('description') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">All Status</option>
                                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" name="event_date" id="event_date" class="form-control"
                                                value="{{ request('event_date') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="order" id="order" class="form-control"
                                                placeholder="Order" value="{{ request('order') }}">
                                        </div>
                                        <div class="col-md-2 d-flex gap-2">
                                            <button type="button" id="filterSubmit" class="btn btn-primary w-30">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <button type="button" id="refreshTable" class="btn btn-outline-secondary"
                                                title="Refresh Filters">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Export Buttons -->
                                <!-- <div class="mb-3">
                                    <button class="btn btn-success" id="exportCsv">Export CSV</button>
                                    <button class="btn btn-danger" id="exportPdf">Export PDF</button>
                                </div> -->

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
                                        <tbody id="eventsBody">
                                            @foreach($events as $event)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ $event->description }}</td>
                                                    <td>{{ $event->event_date }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $event->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $event->status == 1 ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $event->order }}</td>
                                                    <td>
                                                        <!-- @if($event->image)
                                                            <img src="{{ asset('storage/events/' . basename($event->image)) }}" alt="Event Image" class="img-thumbnail" width="100">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif -->
                                                        @if (!empty($event->image) && file_exists(public_path('uploads/' . $event->image)))
                                                            <img src="{{ asset('uploads/' . $event->image) }}" alt="Event Image"
                                                                style="width: 50px; height: 50px; border-radius: 5px;">
                                                        @elseif (!empty($event->image) && file_exists(public_path('storage/' . $event->image)))
                                                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image"
                                                                style="width: 50px; height: 50px; border-radius: 5px;">
                                                        @else
                                                            <img src="{{ asset('assets/event.jpeg') }}" alt="Event Image"
                                                                style="width: 50px; height: 50px; border-radius: 5px;">
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('events.edit', $event->id) }}"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                            style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
                                <div id="paginationWrapper" class="d-flex justify-content-center">
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
            const filterSubmit = document.getElementById('filterSubmit');
            const eventsTableBody = document.getElementById('eventsBody');
            const paginationWrapper = document.getElementById('paginationWrapper');

            function fetchFilteredResults(url = '/admin/events') {
                const formData = new FormData(filterForm);
                const queryString = new URLSearchParams(formData).toString();

                fetch(`${url}?${queryString}`)
                    .then(response => response.text())
                    .then(html => {
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;

                        const newTbody = tempDiv.querySelector('tbody');
                        if (newTbody) {
                            eventsTableBody.innerHTML = newTbody.innerHTML;
                        }

                        const newPagination = tempDiv.querySelector('.pagination');
                        if (newPagination && paginationWrapper) {
                            paginationWrapper.innerHTML = newPagination.innerHTML;
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            filterSubmit.addEventListener('click', () => fetchFilteredResults());

            document.getElementById('refreshTable').addEventListener('click', () => {
                filterForm.reset();
                fetchFilteredResults();
            });

            searchInput.addEventListener('input', () => {
                clearTimeout(this.debounceTimeout);
                this.debounceTimeout = setTimeout(fetchFilteredResults, 300);
            });

            [statusSelect, eventDateInput, orderInput].forEach(input =>
                input.addEventListener('change', fetchFilteredResults)
            );

            document.addEventListener('click', function (event) {
                if (event.target.tagName === 'A' && event.target.closest('.pagination')) {
                    event.preventDefault();
                    fetchFilteredResults(event.target.href);
                }
            });

            document.getElementById('exportCsv').addEventListener('click', () => window.location.href = `/admin/events/export/csv`);
            document.getElementById('exportPdf').addEventListener('click', () => window.location.href = `/admin/events/export/pdf`);
        });
    </script>
@endpush