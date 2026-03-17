@extends('layouts.site')

@section('content')
<section class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h1 class="fw-bold section-title mb-2">Doctor Profile</h1>
    </div>

    {{-- Doctor Info Card --}}
    <div class="service-card mb-4">
      <div class="p-4 p-md-5">
        <div class="row align-items-center g-4">

          <div class="col-md-3 text-center text-md-start">
            <img src="{{ asset('images/doctors/' . ($doctor->image ?? 'default.jpg')) }}"
                 alt="{{ $doctor->name }}"
                 class="rounded-4 shadow-sm border"
                 style="width:190px;height:190px;object-fit:cover;">
          </div>

          <div class="col-md-9">
            <h2 class="fw-bold mb-2">{{ $doctor->name }}</h2>

            <div class="d-flex align-items-center gap-3 mb-3">
              <span class="badge bg-primary">
                {{ optional($doctor->department)->name ?? 'General' }}
              </span>
              @if(!empty($doctor->location))
                <span class="text-muted">
                  <i class="bi bi-geo-alt me-1"></i>{{ $doctor->location }}
                </span>
              @endif
            </div>

            @if(!empty($doctor->phone))
              <p class="text-muted mb-1">
                <i class="bi bi-telephone me-2"></i>{{ $doctor->phone }}
              </p>
            @endif

            @if(!empty($doctor->address))
              <p class="text-muted mb-0">
                <i class="bi bi-building me-2"></i>{{ $doctor->address }}
              </p>
            @endif
          </div>

        </div>
      </div>
    </div>

    {{-- Availability Card — pulled from doctor_availabilities table --}}
    <div class="service-card mb-4">
      <div class="p-4 p-md-5">
        <h3 class="fw-bold mb-3">Availability</h3>

        @php
          $availabilities = \App\Models\DoctorAvailability::where('doctor_id', $doctor->id)
            ->orderByRaw("FIELD(day,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')")
            ->get();
        @endphp

        @if($availabilities->count())
          @foreach($availabilities as $slot)
            <p class="text-muted mb-2">
              <strong>{{ $slot->day }}:</strong>
              {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} -
              {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}
            </p>
          @endforeach
        @else
          <p class="text-muted mb-0">No availability set yet.</p>
        @endif
      </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex gap-3">
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