@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')
  <div class="container py-5">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div>
        <h2 class="fw-bold mb-1">Add Service</h2>
        <p class="text-muted mb-0">Create a new service.</p>
      </div>

      <a href="{{ url('/admin/manage-services') }}" class="btn btn-outline-dark">
        <i class="bi bi-arrow-left me-1"></i> Back
      </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
      <div class="card-body p-4 p-md-5">

        <form method="POST" action="#">
          @csrf

          <div class="row g-4">

            <div class="col-md-6">
              <label class="form-label fw-semibold">Service Name</label>
              <input type="text" class="form-control" placeholder="e.g., Heart Checkup">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Department</label>
              <select class="form-select">
                <option selected>Select Department</option>
                <option>General Medicine</option>
                <option>Cardiology</option>
                <option>Dental</option>
                <option>Pediatrics</option>
                <option>Orthopedics</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Description</label>
              <textarea class="form-control" rows="4" placeholder="Short service description..."></textarea>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Duration (minutes)</label>
              <input type="number" class="form-control" placeholder="30">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Price (optional)</label>
              <input type="text" class="form-control" placeholder="$100">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Status</label>
              <select class="form-select">
                <option selected>Active</option>
                <option>Inactive</option>
              </select>
            </div>

          </div>

          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary px-4">
              Save Service
            </button>
          </div>

        </form>

      </div>
    </div>

  </div>
@endsection