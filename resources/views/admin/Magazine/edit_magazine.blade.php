@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Magazine</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('magazines.update', $magazine->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="page_title" class="form-label">Page Title</label>
                                        <input type="text" class="form-control @error('page_title') is-invalid @enderror"
                                            id="page_title" name="page_title"
                                            value="{{ old('page_title', $magazine->page_title) }}" required>
                                        @error('page_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="4"
                                            required>{{ old('description', $magazine->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <!-- @if($magazine->image)
                                                <label for="current_image" class="form-label">Current Image</label><br>
                                                <img src="{{ asset('storage/' . $magazine->image) }}" alt="Current Image" width="100">
                                            @endif -->
                                        @if (!empty($magazine->image) && file_exists(public_path('uploads/' . $magazine->image)))
                                            <label for="current_image" class="form-label">Current Image</label><br>
                                            <img src="{{ asset('uploads/' . $magazine->image) }}" alt="Current Image"
                                                width="100">
                                        @elseif (!empty($magazine->image) && file_exists(public_path('storage/' . $magazine->image)))
                                            <label for="current_image" class="form-label">Current Image</label><br>
                                            <img src="{{ asset('storage/' . $magazine->image) }}" alt="Current Image"
                                                width="100">
                                        @else
                                            <label class="form-label">No Image Available</label>
                                        @endif

                                        <label for="image" class="form-label">Upload New Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <!-- @if($magazine->pdf)
                                                <label for="current_pdf" class="form-label">Current PDF</label><br>
                                                <a href="{{ asset('storage/' . $magazine->pdf) }}" target="_blank">View PDF</a>
                                            @endif -->
                                        @if (!empty($magazine->pdf) && file_exists(public_path('uploads/' . $magazine->pdf)))
                                            <label for="current_pdf" class="form-label">Current PDF</label><br>
                                            <a href="{{ asset('uploads/' . $magazine->pdf) }}" target="_blank">View PDF</a>
                                        @elseif (!empty($magazine->pdf) && file_exists(public_path('storage/' . $magazine->pdf)))
                                            <label for="current_pdf" class="form-label">Current PDF</label><br>
                                            <a href="{{ asset('storage/' . $magazine->pdf) }}" target="_blank">View PDF</a>
                                        @else
                                            <label class="form-label">No PDF Available</label>
                                        @endif

                                        <label for="pdf" class="form-label">Upload New PDF</label>
                                        <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf"
                                            name="pdf">
                                        @error('pdf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status" required>
                                            <option value="1" {{ old('status', $magazine->status) == '1' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ old('status', $magazine->status) == '0' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Magazine</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection