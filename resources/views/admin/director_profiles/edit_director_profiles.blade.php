@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Director Profile</h5>

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

                                <form action="{{ route('director_profiles.update', $directorProfile->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $directorProfile->name) }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Position -->
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                                            id="position" name="position"
                                            value="{{ old('position', $directorProfile->position) }}" required>
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Company -->
                                    <div class="mb-3">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company"
                                            value="{{ old('company', $directorProfile->company) }}" required>
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address"
                                            rows="3">{{ old('address', $directorProfile->address) }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status" required>
                                            <option value="1" {{ old('status', $directorProfile->status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $directorProfile->status) == '0' ? 'selected' : '' }}>Inactive</option>
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
                                            rows="4">{{ old('description', $directorProfile->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Current Photo -->
                                    <!-- @if($directorProfile->photo)
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                            <img src="{{ asset('storage/' . $directorProfile->photo) }}" alt="Current Photo" width="100">
                                        </div>
                                    @endif -->
                                    @if (!empty($directorProfile->photo) && file_exists(public_path('uploads/' . $directorProfile->photo)))
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                            <img src="{{ asset('uploads/' . $directorProfile->photo) }}" alt="Current Photo"
                                                width="100">
                                        </div>
                                    @elseif (!empty($directorProfile->photo) && file_exists(public_path('storage/' . $directorProfile->photo)))
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                            <img src="{{ asset('storage/' . $directorProfile->photo) }}" alt="Current Photo"
                                                width="100">
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="current_photo" class="form-label">Current Photo</label><br>
                                            <img src="{{ asset('assets/user.png') }}" alt="No Photo Available"
                                                width="100">
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

                                    <button type="submit" class="btn btn-primary">Update Director Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection