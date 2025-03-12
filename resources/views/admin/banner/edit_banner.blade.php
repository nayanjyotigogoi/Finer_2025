@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Banner</h5>

                            <!-- Form -->
                            <form 
                                action="{{ route('banners.update', $banner->id) }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        id="name" 
                                        name="name" 
                                        value="{{ old('name', $banner->name) }}" 
                                        required
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Caption -->
                                <div class="mb-3">
                                    <label for="caption" class="form-label">Caption</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('caption') is-invalid @enderror" 
                                        id="caption" 
                                        name="caption" 
                                        value="{{ old('caption', $banner->caption) }}"
                                    >
                                    @error('caption')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Upload</label>
                                    <input 
                                        type="file" 
                                        class="form-control @error('image') is-invalid @enderror" 
                                        id="image" 
                                        name="image"
                                    >
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($banner->image)
                                        <img 
                                            src="{{ asset('uploads/banners/' . basename($banner->image)) }}" 
                                            alt="Banner Image" 
                                            class="img-thumbnail mt-2" 
                                            width="150"
                                        >
                                    @endif
                                </div>

                                <!-- Order -->
                                <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input 
                                        type="number" 
                                        class="form-control @error('order') is-invalid @enderror" 
                                        id="order" 
                                        name="order" 
                                        value="{{ old('order', $banner->order) }}" 
                                        required
                                    >
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea 
                                        class="form-control @error('description') is-invalid @enderror" 
                                        id="description" 
                                        name="description" 
                                        rows="4"
                                    >{{ old('description', $banner->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select 
                                        class="form-select @error('status') is-invalid @enderror" 
                                        id="status" 
                                        name="status" 
                                        required>
                                        <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update Banner</button>
                                </div>
                            </form>
                            <!-- End Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
