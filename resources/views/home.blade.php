@extends('layouts.site')

@section('title', 'HealthCare Plus')

@section('content')
  <section class="hero-card py-5">
    <div class="container py-4">
      <div class="row align-items-center g-4">

        <div class="col-lg-6">
          <p class="hero-badge mb-3">HealthCare Plus</p>
          <h1 class="fw-bold display-5 mb-3">Your Health, Our Priority</h1>
          <p class="text-muted mb-4" style="max-width:520px;">
            Book appointments with trusted doctors, explore services, and manage your care easily.
          </p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="{{ url('/book-appointment') }}" class="btn btn-primary btn-lg px-4">
              Book Appointment
            </a>
            <a href="{{ url('/find-doctor') }}" class="btn btn-success btn-lg px-4">
              Find a Doctor
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <img src="{{ asset('images/hero-doctor.jpg') }}" class="img-fluid rounded-4 shadow"
            style="height:420px;width:100%;object-fit:cover;" alt="Doctor">
        </div>

      </div>
    </div>
  </section>
@endsection