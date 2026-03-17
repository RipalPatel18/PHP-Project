@extends('layouts.admin')

@section('title', 'Delete Doctor')

@section('content')
<div class="container py-5">


  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
    <div>
      <h2 class="fw-bold mb-1 text-danger">Delete Doctor</h2>
      <p class="text-muted mb-0">Confirm before removing this doctor.</p>
    </div>

    <a href="{{ url('/admin/manage-doctors') }}" class="btn btn-outline-dark">
      <i class="bi bi-arrow-left me-1"></i> Back
    </a>
  </div>


  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-5 text-center">

      <i class="bi bi-exclamation-triangle-fill text-danger display-4 mb-3"></i>

      <h4 class="fw-bold mb-3">
        Are you sure you want to delete Doctor ID: {{ $id }} ?
      </h4>

      <p class="text-muted mb-4">
        This action cannot be undone.
      </p>

      <div class="d-flex justify-content-center gap-3">
        <a href="{{ url('/admin/manage-doctors') }}" class="btn btn-outline-secondary px-4">
          Cancel
        </a>

        <button type="button" class="btn btn-danger px-4">
          Yes, Delete
        </button>
        
      </div>

    </div>
  </div>

</div>
@endsection