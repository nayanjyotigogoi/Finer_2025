@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Past President Profile</h5>

                                <!-- Show validation errors if any -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('past_presidents.update', $pastPresident->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $pastPresident->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Position -->
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                                            id="position" name="position"
                                            value="{{ old('position', $pastPresident->position) }}" required>
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Company -->
                                    <div class="mb-3">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company"
                                            value="{{ old('company', $pastPresident->company) }}" required>
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" rows="3">{{ old('address', $pastPresident->address) }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status" required>
                                            <option value="1" {{ old('status', $pastPresident->status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $pastPresident->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description"
                                            rows="4">{{ old('description', $pastPresident->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Current Photo -->
                                    <!-- @if($pastPresident->photo)
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                            <img src="{{ asset('storage/' . $pastPresident->photo) }}" alt="Current Photo" width="100">
                                        </div>
                                    @endif -->
                                    @if (!empty($president->photo) && file_exists(public_path('uploads/' . $president->photo)))
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                                <img src="{{ asset('uploads/' . $president->photo) }}" alt="Photo"
                                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                            @elseif (!empty($president->photo) && file_exists(public_path('storage/' . $president->photo)))
                                                <img src="{{ asset('storage/' . $president->photo) }}" alt="Photo"
                                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                            @else
                                                <img src="{{ asset('assets/default_profile.png') }}" alt="No Photo"
                                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                        </div>
                                    @endif


                                    <!-- Photo -->
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">New Photo (Optional)</label>
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                            id="photo" name="photo">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Past President Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection