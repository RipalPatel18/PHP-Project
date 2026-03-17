@extends('layouts.admin')

@section('title', 'Add Doctor')

@section('content')

  <div class="container py-5">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div>
        <h2 class="fw-bold mb-1">Add Doctor</h2>
        <p class="text-muted mb-0">Create a new doctor profile.</p>
      </div>

      <a href="{{ url('/admin/manage-doctors') }}" class="btn btn-outline-dark">
        <i class="bi bi-arrow-left me-1"></i> Back
      </a>
    </div>


    <div class="card border-0 shadow-sm rounded-4">
      <div class="card-body p-4 p-md-5">

        <form method="POST" action="#">
          @csrf

          <div class="row g-4">

            <div class="col-md-6">
              <label class="form-label fw-semibold">Full Name</label>
              <input type="text" class="form-control" placeholder="e.g., Dr. Sarah Johnson">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" placeholder="doctor@email.com">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Specialty</label>
              <input type="text" class="form-control" placeholder="e.g., Cardiology">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone</label>
              <input type="text" class="form-control" placeholder="e.g., +1 647 123 4567">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Clinic Address</label>
              <input type="text" class="form-control" placeholder="e.g., 123 Queen St W, Toronto">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Status</label>
              <select class="form-select">
                <option selected>Active</option>
                <option>Inactive</option>
              </select>

            </div>


            <div class="col-md-6">
              <label class="form-label fw-semibold">Profile Photo (optional)</label>
              <input type="file" class="form-control">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Bio / About</label>
              <textarea class="form-control" rows="4" placeholder="Short doctor description..."></textarea>
            </div>

          </div>

          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary px-4">
              Save Doctor
            </button>
            
          </div>

        </form>

      </div>
    </div>

  </div>
@endsection