@extends('layouts.site')

@section('content')
<section class="py-5">
  <div class="container">
<!--      Page heading  -->
    <div class="text-center mb-5">
      <h1 class="fw-bold section-title mb-2">Doctor Profile</h1>
    </div>

     <!-- Doctor Info Card  -->
    <div class="service-card mb-4">
      <div class="p-4 p-md-5">
        <div class="row align-items-center g-4 text-center text-md-start">

           <!-- Doctor photo  -->
          <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-start">
            <img src="{{ asset('images/doctors/' . ($doctor->image ?? 'default.jpg')) }}"
                 alt="{{ $doctor->name }}"
                 class="rounded-4 shadow-sm border"
                 style="width:190px;height:190px;object-fit:cover;">
          </div>

           <!--  Doctor details  --> 
          <div class="col-12 col-md-9">
            <h2 class="fw-bold mb-2">{{ $doctor->name }}</h2>

             <!--  Department badge and location  --> 
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
              <span class="badge bg-primary">
                {{ optional($doctor->department)->name ?? 'General' }}
              </span>
              @if(!empty($doctor->location))
                <span class="text-muted">
                  <i class="bi bi-geo-alt me-1"></i>{{ $doctor->location }}
                </span>
              @endif
            </div>

            <!-- - Phone number  -->
            @if(!empty($doctor->phone))
              <p class="text-muted mb-1">
                <i class="bi bi-telephone me-2"></i>{{ $doctor->phone }}
              </p>
            @endif

            <!--  Clinic address  -->
            @if(!empty($doctor->address))
              <p class="text-muted mb-0">
                <i class="bi bi-building me-2"></i>{{ $doctor->address }}
              </p>
            @endif
          </div>

        </div>
      </div>
    </div>

    <!-- Availability Card  -->
    <div class="service-card mb-4">
      <div class="p-4 p-md-5">
        <h3 class="fw-bold mb-3">Availability</h3>

         <!-- Get availability slots from database ordered by day of week  -->
        @php
          $availabilities = \App\Models\DoctorAvailability::where('doctor_id', $doctor->id)
            ->orderByRaw("FIELD(day,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')")
            ->get();
        @endphp

        @if($availabilities->count())
           <!-- Loop through each availability slot  --> 
          <div class="row g-2">
            @foreach($availabilities as $slot)
              <div class="col-12 col-sm-6 col-md-4">
                <div class="border rounded-3 px-3 py-2 text-muted small">
                  <strong>{{ $slot->day }}:</strong>
                  {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} -
                  {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}
                </div>
              </div>
            @endforeach
          </div>
        @else
           <!-- - No availability set  --> 
          <p class="text-muted mb-0">No availability set yet.</p>
        @endif

      </div>
    </div>

     <!--  Action buttons  --> 
    <div class="d-flex flex-column flex-sm-row gap-3">
      <a href="{{ url('/book-appointment') }}" class="btn btn-primary px-4">
        Book Appointment
      </a>
      <a href="{{ route('find-doctor') }}" class="btn btn-outline-primary px-4">
        Back to List
      </a>
    </div>

  </div>
</section>
@endsection