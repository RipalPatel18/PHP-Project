@extends('layouts.site')

@section('title', 'Patient Profile')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-1">My Profile</h2>
    <p class="text-muted mb-4">Update your account details and password.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">

        {{-- Profile Information --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-bold mb-4">Profile Information</h5>

                    <form method="POST" action="{{ route('patient.profile.update') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                       value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" name="dob" class="form-control"
                                       value="{{ old('dob') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Address</label>
                                <input type="text" name="address" class="form-control"
                                       value="{{ old('address', $user->address) }}">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Change Password --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-bold mb-4">Change Password</h5>

                    <form method="POST" action="{{ route('patient.password.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-dark w-100">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection