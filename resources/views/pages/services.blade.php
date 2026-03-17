@extends('layouts.site')

@section('content')
<section class="py-5 bg-white">
  <div class="container">

<<<<<<< HEAD
    {{-- Page Header --}}
=======
    {{-- Page header --}}
>>>>>>> c6e839e (add files)
    <div class="text-center mb-5">
      <h1 class="fw-bold section-title mb-2">Services & Departments</h1>
      <p class="text-muted mb-0">Browse departments and explore available services at HealthCare Plus.</p>
    </div>

<<<<<<< HEAD
    {{-- Departments --}}
=======
    {{-- Departments heading --}}
>>>>>>> c6e839e (add files)
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
      <h3 class="fw-bold mb-0">Our Departments</h3>
    </div>

<<<<<<< HEAD
    <div class="row g-4 mb-5">
      @foreach($departments as $department)
        <div class="col-md-6 col-lg-3">
          <div class="service-card h-100">
            <div class="p-4">
              <h5 class="fw-semibold mb-1">{{ $department->name }}</h5>

              {{-- Use description from database, fallback if empty --}}
              <p class="text-muted small mb-3">
                {{ $department->description ?? 'Healthcare services and treatment.' }}
              </p>

              <a href="{{ route('department.show', $department->id) }}"
                 class="btn btn-primary btn-sm px-4">View Department</a>
            </div>
          </div>
=======
    {{-- Department cards --}}
    <div class="row g-4 mb-5">
      @foreach($departments as $department)
        <div class="col-12 col-sm-6 col-lg-3">

          {{-- Entire card is clickable --}}
          <a href="{{ route('department.show', $department->id) }}"
             class="text-decoration-none">
            <div class="service-card h-100">
              <div class="p-4">

                {{-- Department name --}}
                <h5 class="fw-semibold mb-1 text-dark">{{ $department->name }}</h5>

                {{-- Department description --}}
                <p class="text-muted small mb-3">
                  {{ $department->description ?? 'Healthcare services and treatment.' }}
                </p>

                <span class="btn btn-primary btn-sm px-4">View Department</span>

              </div>
            </div>
          </a>

>>>>>>> c6e839e (add files)
        </div>
      @endforeach
    </div>

<<<<<<< HEAD
    {{-- Services Table --}}
    <h3 class="fw-bold mb-3">Available Services</h3>

=======
    {{-- Services table heading --}}
    <h3 class="fw-bold mb-3">Available Services</h3>

    {{-- Services table - table-responsive makes it scroll on mobile --}}
>>>>>>> c6e839e (add files)
    <div class="table-responsive">
      <table class="table table-bordered align-middle bg-white">
        <thead class="table-light">
          <tr>
            <th style="width:40%;">Service Name</th>
            <th>Department</th>
            <th class="text-center" style="width:160px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($services as $service)
            <tr>
<<<<<<< HEAD
              <td class="fw-semibold">{{ $service->name }}</td>
              <td>{{ optional($service->department)->name ?? 'General' }}</td>
=======
              {{-- Service name --}}
              <td class="fw-semibold">{{ $service->name }}</td>

              {{-- Department name, fallback to General --}}
              <td>{{ optional($service->department)->name ?? 'General' }}</td>

              {{-- Learn more button --}}
>>>>>>> c6e839e (add files)
              <td class="text-center">
                <a href="{{ route('service.show', $service->id) }}"
                   class="btn btn-primary btn-sm px-3">Learn More</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center py-4 text-muted">No services found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</section>
@endsection