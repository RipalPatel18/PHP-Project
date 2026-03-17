@extends('layouts.site')

@section('content')

  <section class="py-5" style="background: #f4f8fc;">
    <div class="container">

      <div class="text-center mb-5">
        <h1 class="fw-bold section-title mb-2">Contact Us</h1>
        <p class="text-muted mb-0">We’re here to help. Send us a message anytime.</p>
      </div>

      <!-- Submitted Form with sucess message-->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="row g-4">

        <!-- Contact Form -->
        <div class="col-lg-7">
          <div class="service-card h-100">
            <div class="p-4 p-md-5">

              <div class="mb-4">
                <h4 class="fw-bold mb-2">Send Us a Message</h4>
                <p class="text-muted mb-0">Fill out the form below and our team will get back to you soon.</p>
              </div>

              <!-- Post Request -->
              <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="row g-4">


                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>

                    <input type="text" name="name" class="form-control rounded-3" placeholder="Enter your full name">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-3" placeholder="Enter your email">
                  </div>

                  <div class="col-12">
                    <label class="form-label fw-semibold">Subject</label>
                    <input type="text" name="subject" class="form-control rounded-3" placeholder="Enter subject">
                  </div>

                  <div class="col-12">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea name="message" class="form-control rounded-3" rows="5"
                      placeholder="Write your message..."></textarea>
                  </div>

                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                    <i class="bi bi-send me-2"></i>Send Message

                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-5">
          <div class="service-card h-100">

            <div class="p-4 p-md-5">

              <h4 class="fw-bold mb-4">Contact Information</h4>

              <div class="d-flex align-items-start gap-3 mb-4">
                <div class="fs-4 text-primary">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                  <h6 class="fw-semibold mb-1">Phone</h6>
                  <p class="text-muted mb-0">+1 (647) 123-4567</p>

                </div>
              </div>

              <div class="d-flex align-items-start gap-3 mb-4">

                <div class="fs-4 text-primary">
                  <i class="bi bi-envelope-fill"></i>
                </div>

                <div>
                  <h6 class="fw-semibold mb-1">Email</h6>
                  <p class="text-muted mb-0">support@healthcareplus.com</p>
                </div>
              </div>

              <div class="d-flex align-items-start gap-3 mb-4">
                <div class="fs-4 text-primary">

                  <i class="bi bi-geo-alt-fill"></i>
                </div>


                <div>

                  <h6 class="fw-semibold mb-1">Address</h6>
                  <p class="text-muted mb-0">Toronto, ON, Canada</p>
                </div>
              </div>

              <div class="d-flex align-items-start gap-3">
                <div class="fs-4 text-primary">
                  <i class="bi bi-clock-fill"></i>

                </div>

                <div>
                  <h6 class="fw-semibold mb-1">Hours</h6>
                  <p class="text-muted mb-1">Mon - Fri: 8:00 AM - 6:00 PM</p>
                  <p class="text-muted mb-0">Sat: 9:00 AM - 2:00 PM</p>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </div>
  </section>

@endsection