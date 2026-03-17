@extends('layouts.site')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>

    <h3 class="fw-bold mb-0">Find a Doctor</h3>
    <div class="text-muted small">Search by specialization, location, and availability.</div>

  </div>
  <a class="btn btn-outline-primary" href="{{ route('services.index') }}">View Services</a>

</div>

<div class="card shadow-sm mb-3">
  <div class="card-body">
    <div class="row g-2 align-items-end">

      <div class="col-md-4">
        <label class="form-label small text-muted">Doctor Name</label>
        <input class="form-control" placeholder="e.g., John Smith" />
      </div>
      <div class="col-md-3">
        <label class="form-label small text-muted">Specialization</label>
        <select class="form-select">
          <option>All</option>
          <option>Dentist</option>
          <option>Cardiologist</option>

          <option>Dermatologist</option>
          <option>Pediatrician</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label small text-muted">Location</label>
        <input class="form-control" placeholder="Toronto" />

      </div>
      <div class="col-md-2 d-grid">
        <button class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</div>

<div class="row g-3">
  @for ($i = 1; $i <= 9; $i++)
    <div class="col-md-6 col-lg-4">
      <div class="card hc-card-hover h-100 shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-center">

            <img class="rounded-circle hc-avatar" src="https://i.pravatar.cc/150?img={{ $i }}" alt="Doctor avatar">
            <div class="flex-grow-1">
              <div class="fw-bold">Dr. {{ ['Ava','Noah','Mia','Liam','Emma','Lucas','Olivia','Ethan','Sophia'][$i-1] }} Carter</div>
              <div class="text-muted small">
                {{ ['Dentist','Cardiologist','Dermatologist','Pediatrician','Dentist','Cardiologist','Dermatologist','Pediatrician','General'][($i-1)%9] }}
                • Toronto
              </div>
            </div>
            <span class="badge text-bg-success">Available</span>
          </div>

          <div class="mt-3 d-flex justify-content-between align-items-center">

            <div class="text-muted small">Fee: <span class="fw-semibold">$80</span></div>

            <a class="btn btn-outline-primary btn-sm" href="{{ route('doctors.show', $i) }}">View Profile</a>
          </div>
        </div>
        
      </div>

    </div>
  @endfor
</div>
@endsection