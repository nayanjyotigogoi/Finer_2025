@extends('layouts.admin_app')

@section('content')
<div class="container">
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User</h5>

                            <!-- User Edit Form -->
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>

                                <!-- Phone -->
                                <!-- <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                </div> -->

                                <!-- Designation -->
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation', $user->designation) }}">
                                </div>

                                <!-- Description -->
                                <!-- <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $user->description) }}</textarea>
                                </div> -->

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <!-- Order -->
                                <!-- <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $user->order) }}" required>
                                </div> -->

                                <!-- Profile Image -->
                                <!-- <div class="mb-3">
                                    <label for="image" class="form-label">Profile Image</label>
                                    @if($user->image)
                                    <div>
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" width="100">
                                    </div>
                                    @endif
                                    <input type="file" name="image" id="image" class="form-control">
                                </div> -->

                                <!-- Password (Only if changing password) -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                    <a href="{{ route('admin.users.view_user') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
