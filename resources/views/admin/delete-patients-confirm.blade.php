@extends('layouts.admin')

@section('title', 'Confirm Delete Patient')

@section('content')
<div class="container py-5">


  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
    <div>
      <h2 class="fw-bold mb-1 text-danger">Confirm Delete</h2>
      <p class="text-muted mb-0">You are about to delete Patient ID: {{ $id }}.</p>
    </div>



    <a href="{{ route('admin.delete-patients') }}" class="btn btn-outline-dark">
      <i class="bi bi-arrow-left me-1"></i> Back
    </a>
  </div>




  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-5 text-center">

      <i class="bi bi-exclamation-triangle-fill text-danger display-4 mb-3"></i>

      <h4 class="fw-bold mb-3">
        Are you sure you want to delete this patient account?
      </h4>



      <p class="text-muted mb-4">
        This action cannot be undone. The patient will lose access to their dashboard and records.
      </p>

      <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('admin.delete-patients') }}" class="btn btn-outline-secondary px-4">
          Cancel
        </a>

        
        <button type="button" class="btn btn-danger px-4">
          Yes, Delete Patient
        </button>
      </div>

    </div>
  </div>

</div>
@endsection