@extends('layouts.admin')

@section('content')
  <div class="container py-5">


    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div>

        <h2 class="fw-bold mb-1">Add Department</h2>
        <p class="text-muted mb-0">Create a new department for the system.</p>
      </div>

      <a href="{{ route('admin.manage-departments') }}" class="btn btn-outline-dark">
        ← Back
      </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
      <div class="card-body p-4 p-md-5">


<<<<<<< HEAD
      
      <form action="#" method="POST">
        @csrf
=======
>>>>>>> c6e839e (add files)

        <form action="#" method="POST">
          @csrf

          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Department Name</label>
              <input type="text" class="form-control" placeholder="e.g., Cardiology" required>
            </div>


            <div class="col-md-6">
              <label class="form-label fw-semibold">Short Description</label>
              <input type="text" class="form-control" placeholder="e.g., Heart and cardiovascular care" required>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Details (optional)</label>
              <textarea class="form-control" rows="4" placeholder="Add more details about this department..."></textarea>
            </div>

            <div class="col-12 d-flex gap-2">

              <button type="submit" class="btn btn-primary px-4">
                Save Department
              </button>
              
              <a href="{{ route('admin.manage-departments') }}" class="btn btn-outline-secondary px-4">
                Cancel

              </a>


            </div>

          </div>

        </form>

      </div>
    </div>

  </div>
@endsection