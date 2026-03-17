@extends('layouts.site')

@section('content')
<div class="row g-4">
  <div class="col-lg-4">
    <div class="card shadow-sm">
      
      <div class="card-body text-center">
        <img class="rounded-circle hc-avatar-lg" src="https://i.pravatar.cc/300?img={{ $id }}" alt="Doctor avatar">
        <h5 class="fw-bold mt-3 mb-0">Dr. Sample {{ $id }}</h5>

        <div class="text-muted">Cardiologist</div>

        <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">

          <span class="badge text-bg-primary">Toronto</span>

          <span class="badge text-bg-success">Available</span>

          <span class="badge text-bg-light border">8+ yrs</span>
        </div>

        <hr>

        <div class="text-start small">

          <div class="d-flex justify-content-between"><span class="text-muted">Email</span><span>doctor{{ $id }}@mail.com</span></div>
          <div class="d-flex justify-content-between"><span class="text-muted">Phone</span><span>(416) 000-0000</span></div>
          <div class="d-flex justify-content-between"><span class="text-muted">Fee</span><span class="fw-semibold">$80</span></div>
        </div>

        <a href="#" class="btn btn-primary w-100 mt-3">Book Appointment</a>

      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <h5 class="fw-bold">About</h5>
        <p class="text-muted mb-0">

          Professional bio goes here. This will be pulled from the database later.
        </p>
      </div>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="fw-bold mb-0">Availability</h5>

          <span class="text-muted small">Select a time slot</span>
        </div>

        <div class="mt-3">
          <div class="fw-semibold mb-2">Today</div>
          <div class="d-flex flex-wrap gap-2">

            @foreach (['10:00 AM','10:30 AM','11:00 AM','11:30 AM','2:00 PM','2:30 PM'] as $t)
              <button class="btn btn-outline-secondary btn-sm">{{ $t }}</button>
            @endforeach
          </div>
        </div>

        <div class="mt-4">
          <div class="fw-semibold mb-2">Tomorrow</div>

          <div class="d-flex flex-wrap gap-2">
            @foreach (['9:00 AM','9:30 AM','1:00 PM','1:30 PM','4:00 PM'] as $t)
              <button class="btn btn-outline-secondary btn-sm">{{ $t }}</button>
            @endforeach
          </div>
        </div>

        <div class="alert alert-info mt-4 mb-0">
          Next step: we’ll connect this to the database and booking form.
        </div>
      </div>
    </div>

  </div>
</div>

@endsection