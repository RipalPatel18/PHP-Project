@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">

<<<<<<< HEAD
    <h2 class="fw-bold mb-4">Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

=======

    <h2 class="fw-bold mb-4">Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

>>>>>>> c6e839e (add files)
   <!-- Stats -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-4">Today's Overview</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card border rounded-3 p-3">
                        <div class="fw-bold fs-3">{{ $totalPatients }}</div>
                        <div class="text-muted">Total Patients</div>
                    </div>
<<<<<<< HEAD
                </div>
=======


                </div>


>>>>>>> c6e839e (add files)
                <div class="col-md-4">
                    <div class="card border rounded-3 p-3">
                        <div class="fw-bold fs-3">{{ $totalDoctors }}</div>
                        <div class="text-muted">Total Doctors</div>
                    </div>
<<<<<<< HEAD
                </div>
=======


                </div>

>>>>>>> c6e839e (add files)
                <div class="col-md-4">
                    <div class="card border rounded-3 p-3">
                        <div class="fw-bold fs-3">{{ $totalAppointments }}</div>
                        <div class="text-muted">Total Appointments</div>
                    </div>
                </div>
<<<<<<< HEAD
=======


>>>>>>> c6e839e (add files)
            </div>
        </div>
    </div>

 <!-- Quick Actions -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-4">Quick Actions</h5>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('admin.manage-doctors') }}" class="btn btn-primary px-4">Manage Doctors</a>
                <a href="{{ route('admin.manage-services') }}" class="btn btn-success px-4">Manage Services</a>
            </div>
        </div>
    </div>

<<<<<<< HEAD
=======

    
>>>>>>> c6e839e (add files)
</div>
@endsection