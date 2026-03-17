@extends('layouts.site')

@section('content')
<section class="py-5" style="background:#f4f8fc;">
  <div class="container">

    {{-- Breadcrumb --}}
    <nav class="mb-4">
      <span class="text-muted small">
        <a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a> /
        <a href="{{ route('services') }}" class="text-muted text-decoration-none">Services</a> /
        {{ $service->name }}
      </span>
    </nav>

    {{-- Service Name & Description --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body p-4">
        <h5 class="fw-bold mb-2">{{ $service->name }}</h5>
        <p class="text-muted mb-0">
          {{ $service->description ?? 'Detailed service information available upon request.' }}
        </p>
      </div>
    </div>

    {{-- Duration & Price --}}
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
          <div class="card-body p-4">
            <h6 class="fw-bold mb-3">Service Details</h6>
            <p class="text-muted mb-1">
              <strong>Department:</strong> {{ optional($service->department)->name ?? '—' }}
            </p>
            <p class="text-muted mb-1">
              <strong>Duration:</strong> {{ $service->duration_minutes }} minutes
            </p>
            <p class="text-muted mb-0">
              <strong>Price:</strong> ${{ number_format($service->price, 0) }}
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
          <div class="card-body p-4">
            <h6 class="fw-bold mb-3">Pricing Information</h6>
            <p class="text-muted mb-2">${{ number_format($service->price, 0) }} per session</p>
            <p class="text-muted small mb-0">
              <strong>* Prices may vary based on insurance coverage and specific requirements. Contact us for detailed pricing.</strong>
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex gap-3 flex-wrap">
      <a href="{{ route('book-appointment') }}" class="btn btn-primary px-4">
        Book Appointment
      </a>
      <a href="{{ route('services') }}" class="btn btn-success px-4">
        Back to Services
      </a>
    </div>

  </div>
</section>
@endsection