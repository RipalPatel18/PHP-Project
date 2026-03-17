@extends('layouts.site')

@section('content')
<section class="py-5" style="background:#f4f8fc;">
  <div class="container">

<<<<<<< HEAD
    {{-- Header --}}
    <div class="text-center mb-5">
      <h1 class="fw-bold section-title mb-2">{{ $department->name }}</h1>
      <p class="text-muted mb-0">{{ $department->description ?? 'Specialized healthcare services and expert consultation.' }}</p>
    </div>

    {{-- Doctors in this department --}}
    <h3 class="fw-bold mb-3">Our Doctors</h3>
    <div class="row g-4 mb-5">
      @forelse($doctors as $doctor)
        <div class="col-md-6 col-lg-4">
          <div class="service-card h-100">
            <div class="p-4 d-flex align-items-center gap-3">
              <img src="{{ asset('images/doctors/' . ($doctor->image ?? 'default.jpg')) }}"
                   alt="{{ $doctor->name }}"
                   class="rounded-3 border"
                   style="width:70px;height:70px;object-fit:cover;">
              <div>
                <h6 class="fw-bold mb-1">{{ $doctor->name }}</h6>
                <p class="text-muted small mb-2">{{ $department->name }}</p>
                <a href="{{ route('doctor-profile', $doctor->id) }}"
                   class="btn btn-primary btn-sm px-3">View Profile</a>
=======
   <!-- Breadcrumb so user knows where they are -->
    <nav class="mb-4">
      <span class="text-muted small">
        <a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a> /
        <a href="{{ route('services') }}" class="text-muted text-decoration-none">Services</a> /
        {{ $department->name }}
      </span>
    </nav>

    <!-- Main department info card  -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body p-4">

        <!-- Department name and description from database -->
        <h5 class="fw-bold mb-2">{{ $department->name }} Department</h5>
        <p class="text-muted mb-4">
          {{ $department->description ?? 'Specialized healthcare services and expert consultation.' }}
        </p>

       <!-- Quick info row: location, phone, email, doctor count -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="d-flex align-items-start gap-2">
              <i class="bi bi-geo-alt text-primary mt-1"></i>
              <div>
                <div class="fw-semibold small">Location</div>
                <div class="text-muted small">Main Building</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="d-flex align-items-start gap-2">
              <i class="bi bi-telephone text-primary mt-1"></i>
              <div>
                <div class="fw-semibold small">Phone</div>
                <div class="text-muted small">+1 (647) 123-4567</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="d-flex align-items-start gap-2">
              <i class="bi bi-envelope text-primary mt-1"></i>
              <div>
                <div class="fw-semibold small">Email</div>
                <div class="text-muted small">support@healthcareplus.com</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="d-flex align-items-start gap-2">
              <i class="bi bi-people text-primary mt-1"></i>
              <div>
                <div class="fw-semibold small">Doctors</div>

                <!-- Count doctors in this department dynamically -->
                
                <div class="text-muted small">{{ $doctors->count() }} Specialist{{ $doctors->count() != 1 ? 's' : '' }}</div>
>>>>>>> c6e839e (add files)
              </div>
            </div>
          </div>
        </div>
<<<<<<< HEAD
      @empty
        <div class="col-12">
          <p class="text-muted">No doctors found in this department.</p>
        </div>
      @endforelse
    </div>

    {{-- Services in this department --}}
    <h3 class="fw-bold mb-3">Available Services</h3>
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th class="py-3 ps-4">Service Name</th>
                <th class="py-3">Duration</th>
                <th class="py-3">Price</th>
                <th class="py-3 text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($services as $service)
                <tr>
                  <td class="ps-4 fw-semibold">{{ $service->name }}</td>
                  <td>{{ $service->duration_minutes }} mins</td>
                  <td>${{ number_format($service->price, 0) }}</td>
                  <td class="text-center">
                    <a href="{{ route('book-appointment') }}"
                       class="btn btn-primary btn-sm px-3">Book Now</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center py-4 text-muted">No services found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
=======

       <!-- Department opening hours -->

        <div class="card border rounded-3 p-3">
          <div class="fw-semibold mb-1">Department Hours</div>
          <div class="text-muted small">Monday - Friday: 8:00 AM - 6:00 PM, Saturday: 9:00 AM - 2:00 PM</div>
        </div>

      </div>
    </div>



  <!-- Services offered in this department from database -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body p-4">
        <h5 class="fw-semibold mb-4">Services Offered</h5>

        <div class="row g-3">
          @forelse($services as $service)
            <div class="col-md-6">
              <div class="card border rounded-3 p-3 h-100">


                <!-- Service name and duration -->


                <div class="d-flex justify-content-between align-items-start mb-1">
                  <span class="fw-semibold">{{ $service->name }}</span>
                  <span class="badge bg-light text-dark border">{{ $service->duration_minutes }} mins</span>
                </div>


           <!-- Service description from database -->
                <p class="text-muted small mb-0">
                  {{ $service->description ?? 'Healthcare service and consultation.' }}
                </p>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-muted">No services found for this department.</p>
            </div>
          @endforelse
>>>>>>> c6e839e (add files)
        </div>
      </div>
    </div>

<<<<<<< HEAD
    {{-- Back button --}}
    <a href="{{ route('services') }}" class="btn btn-outline-primary px-4">
      Back to Services
    </a>
=======
    <!-- Doctors that belong to this department from database -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
      <div class="card-body p-4">
        <h5 class="fw-semibold mb-4">Our Doctors</h5>

        <div class="row g-3">
          @forelse($doctors as $doctor)
            <div class="col-md-6">
              <div class="card border rounded-3 p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                <!-- Doctor photo, fallback to default if no image -->
                  <img src="{{ asset('images/doctors/' . ($doctor->image ?? 'default.jpg')) }}"
                       alt="{{ $doctor->name }}"
                       class="rounded-3 border"
                       style="width:70px;height:70px;object-fit:cover;">
                  <div>
                    <h6 class="fw-bold mb-1">{{ $doctor->name }}</h6>
                    <p class="text-muted small mb-2">{{ $department->name }}</p>
                   <!-- Link to doctor profile page -->
                    <a href="{{ route('doctor-profile', $doctor->id) }}"
                       class="btn btn-primary btn-sm px-3">View Profile</a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-muted">No doctors found in this department.</p>
            </div>
          @endforelse
        </div>
      </div>
    </div>

   <!-- buttons at the bottom -->
    <div class="d-flex gap-3 flex-wrap">
      <a href="{{ route('book-appointment') }}" class="btn btn-primary px-4">Book Appointment</a>
      <a href="{{ route('services') }}" class="btn btn-success px-4">Back to Services</a>
    </div>
>>>>>>> c6e839e (add files)

  </div>
</section>
@endsection