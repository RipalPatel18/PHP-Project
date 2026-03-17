@extends('layouts.site')

@section('content')

  <!-- Hero Section  -->
  <section class="hero-section d-flex align-items-center" style="background:
                    url('{{ asset('images/hero-doctor.jpg') }}') center center / cover no-repeat;">
    <!-- Background Image: https://www.freepik.com/free-photo/artistic-blurry-colorful-wallpaper-background_38064988.htm#fromView=search&page=1&position=11&uuid=aaa9e71d-23bf-42d5-a886-71e46a11e4a6&query=light+blue+and+white+background -->
    <!-- Doctor Image : https://www.freepik.com/free-psd/doctor-preparing-routine-medical-check_44989994.htm#fromView=search&page=1&position=12&uuid=f3b05630-f764-4be4-88ba-be4bcc238b33&query=doctor+image -->
    <div class="container text-primary">
      <div class="row">
        <div class="col-lg-6">

          <h1 class="display-4 fw-bold mb-3">
            Your Health,<br>Our Priority
          </h1>


          <p class="lead mb-4 text-white" style="max-width:520px;">
            Book appointments with trusted doctors, explore healthcare services,
            and manage your medical records securely — anytime.
          </p>

          <div class="d-flex gap-3 flex-wrap">
            <a href="{{ url('/book-appointment') }}" class="btn btn-hero-primary btn-lg px-4">
              Book Appointment
            </a>

            <a href="{{ url('/find-doctor') }}" class="btn btn-success btn-lg px-4">
              Find a Doctor
            </a>
          </div>

        </div>
      </div>
    </div>

  </section>

  <!-- Why Choose Us -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center fw-bold section-title mb-4">Why Choose Us</h2>

      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="feature-card text-center h-100">
            <div class="display-6 mb-2 text-primary"><i class="bi bi-calendar2-check"></i></div>
            <h5 class="fw-semibold">Easy Scheduling</h5>
            <p class="text-muted small mb-0">
              Book appointments online 24/7. Pick a date, time, and doctor in seconds.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="feature-card text-center h-100">
            <div class="display-6 mb-2 text-success"><i class="bi bi-person-badge"></i></div>
            <h5 class="fw-semibold">Expert Doctors</h5>
            <p class="text-muted small mb-0">
              Browse verified profiles by specialization, location, and availability.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="feature-card text-center h-100">
            <div class="display-6 mb-2 text-danger"><i class="bi bi-file-earmark-medical"></i></div>
            <h5 class="fw-semibold">Digital Records</h5>
            <p class="text-muted small mb-0">
              Keep your health information secure and accessible from your dashboard.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Our Services -->
  <section class="services-section py-5">
    <div class="container">
      <h2 class="text-center fw-bold section-title mb-2">Our Services</h2>
      <p class="text-center text-muted mb-5">
        Comprehensive services across multiple specialties to meet your medical needs.
      </p>

      <div class="row g-4">

        <!-- Cardiology -->
        <div class="col-md-4">
          <div class="service-card h-100">
            <div class="service-img-wrapper">
              <!-- https://www.freepik.com/free-photo/young-doctor-is-using-stethoscope-listen-heartbeat-patient-shot-female-doctor-giving-male-patient-check-up_28001928.htm#fromView=keyword&page=1&position=0&uuid=74cce208-df22-463a-bea1-5d5bfa57e75c&query=Cardiologist -->
              <img src="{{ asset('images/services/cardiology.jpg') }}" alt="Cardiology">
            </div>
            <div class="p-4 text-center">
              <h5 class="fw-semibold mb-2">Cardiology</h5>
              <p class="text-muted small mb-3">
                Heart screenings, diagnostics, and personalized treatment plans.
              </p>

            </div>
          </div>
        </div>

        <!-- Pediatrics -->
        <div class="col-md-4">
          <div class="service-card h-100">
            <div class="service-img-wrapper">
              <!-- https://www.freepik.com/free-photo/doctor-doing-their-work-pediatrics-office_21536843.htm#fromView=search&page=1&position=2&uuid=f4451483-3d3d-4d8d-9f3c-cd9a9e93cec9&query=Pediatrics -->
              <img src="{{ asset('images/services/pediatrics.jpg') }}" alt="Pediatrics">
            </div>
            <div class="p-4 text-center">
              <h5 class="fw-semibold mb-2">Pediatrics</h5>
              <p class="text-muted small mb-3">
                Specialized care for infants, children, and adolescents.
              </p>

            </div>
          </div>
        </div>

        <!-- Orthopedics -->
        <div class="col-md-4">
          <div class="service-card h-100">
            <div class="service-img-wrapper">
              <!-- https://www.freepik.com/free-photo/male-doctor-pointing-human-skeleton-show-spinal-cord-explain-mechanical-disorders-rehabilitation-cabinet-specialist-explaining-back-bones-system-physical-therapy_24689489.htm#fromView=search&page=1&position=26&uuid=b456f46e-3b3e-426c-a356-da4c6426132d&query=Orthopedics -->
              <img src="{{ asset('images/services/orthopedics.jpg') }}" alt="Orthopedics">
            </div>
            <div class="p-4 text-center">
              <h5 class="fw-semibold mb-2">Orthopedics</h5>
              <p class="text-muted small mb-3">
                Bone, joint, and muscle care including injury recovery support.
              </p>

            </div>
          </div>
        </div>

      </div>

      <div class="text-center mt-5">
        <a href="{{ url('/services') }}" class="btn btn-primary px-4">
          View All Services
        </a>
      </div>
    </div>
  </section>

  <!-- Booking Appointment help Section  -->
  <section class="py-5">
    <div class="container">
      <div class="p-4 p-md-5 rounded-4 text-white" style="background: #1565C0;">
        <div class="row align-items-center g-3">
          <div class="col-md-8">
            <h3 class="fw-bold mb-2">Need help booking an appointment?</h3>
            <p class="mb-0" style="opacity:.9;">
              Our support team can help you find the right doctor and schedule faster.
              
            </p>
          </div>

          <div class="col-md-4 text-md-end">
            <a href="{{ url('/contact') }}" class="btn btn-light px-4">Contact Us</a>
            <a href="{{ url('/find-doctor') }}" class="btn btn-outline-light px-4 ms-2">Browse Doctors</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection