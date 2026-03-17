@extends('layouts.doctor')

@section('title', 'Doctor Profile')

@section('content')
<div class="container py-5">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
        <div>
            <h2 class="fw-bold mb-1">My Profile</h2>
            <p class="text-muted mb-0">Update your account details and password.</p>
        </div>
    </div>

<<<<<<< HEAD
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">

        <!-- Profile Information -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3">Profile Information</h5>

                    <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

=======

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">


        <!-- Profile Information -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3">Profile Information</h5>

                    <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

>>>>>>> c6e839e (add files)
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" placeholder="Enter your name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}" placeholder="Enter your email">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}" placeholder="e.g., +1 647 123 4567">
                            </div>

<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Department</label>
                                <select name="department_id" class="form-select">
                                    <option value="">— Select Department —</option>
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->id }}" {{ old('department_id', $doctor->department_id) == $dept->id ? 'selected' : '' }}>
                                            {{ $dept->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Clinic Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $doctor->address) }}" placeholder="Enter your clinic address">
                            </div>
<<<<<<< HEAD
                        </div>

                        <div class="mt-4">
=======

                        </div>

                        <div class="mt-4">
                            
>>>>>>> c6e839e (add files)
                            <button type="submit" class="btn btn-primary px-4">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3">Change Password</h5>

                    <form method="POST" action="{{ route('doctor.password.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Enter current password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection