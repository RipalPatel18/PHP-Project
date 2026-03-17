<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HealthCare Plus</title>

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    :root {
      --hc-primary: #1E88E5;
      --hc-primary-dark: #1565C0;
      --hc-accent: #2ECC71;
      --hc-light: #F4F8FB;
      --hc-dark: #1A1A1A;
      --hc-muted: #6c757d;
    }

    body {
      background: var(--hc-light);
      font-family: 'Inter', sans-serif;
    }

    /* Navbar */
    .navbar {
      background: #ffffff !important;
    }

    /* Nav Hover */
    .navbar .nav-link {
      position: relative;
      font-weight: 500;
      color: #1A1A1A;
      transition: .2s ease;
    }

    .navbar .nav-link:hover {
      color: var(--hc-primary);
    }

    .navbar .nav-link::after {
      content: "";
      position: absolute;
      left: 8px;
      bottom: -6px;
      width: 0%;
      height: 2px;
      background: var(--hc-primary);
      border-radius: 999px;
      transition: .25s ease;
    }

    .navbar .nav-link:hover::after {
      width: calc(100% - 16px);
    }

    .logo-text {
      font-size: 16px;
      letter-spacing: .2px;
      color: var(--hc-dark);
    }

    .badge-soft {
      background: var(--hc-primary);
      color: white;
      border-radius: 999px;
      padding: 6px 14px;
      font-size: 13px;
    }

    .btn-primary {
      background: var(--hc-primary);
      border: solid 1px #083a74;
    }

    .btn-primary:hover {
      background: var(--hc-primary-dark);
    }

    .btn-dark {
      background: var(--hc-dark);
    }

    .btn-hero-primary {
      background: linear-gradient(135deg, #1E88E5, #1565C0);
      border: none;
      color: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(30, 136, 229, .35);
      transition: all .3s ease;
    }

    .btn-hero-primary:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 30px rgba(30, 136, 229, .45);
      background: linear-gradient(135deg, #2196F3, #0D47A1);
      color: #fff;
    }

    .btn-hero-primary:active {
      transform: translateY(-1px);
    }

    /* Hero Section */
    .hero-section {
      height: 600px;
      width: 100%;
      display: flex;
      align-items: center;

      background:
        linear-gradient(to right,
          rgba(255, 255, 255, .96) 0%,
          rgba(255, 255, 255, .90) 40%,
          rgba(255, 255, 255, .55) 65%,
          rgba(255, 255, 255, 0) 85%),
        url('/images/hero-doctor.jpg') right center / 520px auto no-repeat;

      background-color: #f4f8fb;
      border-bottom: 1px solid rgba(0, 0, 0, .05);
    }

    .hero-section h1 {
      font-size: 66px;
      line-height: 1.05;
      letter-spacing: -0.5px;
      color: #031d5a;
    }

    .hero-section .lead {
      font-size: 24px;
      color: rgba(15, 23, 42, .75) !important;
    }

    /* -- Mobile (max 768px) -- */
    @media (max-width: 768px) {
      .hero-section {
        height: auto;
        padding: 60px 0;
        background-image: none !important;
        text-align: center;
      }

      .hero-section h1 {
        font-size: 36px;
      }

      .hero-section .lead {
        font-size: 18px;
      }
    }

    /* -- Tablet (max 991px) -- */
    @media (max-width: 991px) {
      .hero-section {
        height: auto;
        padding: 50px 0;
        background-size: 300px auto;
        background-position: right bottom;
      }

      .hero-section h1 {
        font-size: 46px;
      }

      .hero-section .lead {
        font-size: 20px;
      }

      .d-flex.gap-2 {
        margin-top: 12px;
        flex-direction: column;
      }
    }

    /* Services */
    .service-img {
      height: 320px;
      width: 100%;
      object-fit: cover;
    }

    .feature-card {
      background: white;
      border-radius: 18px;
      padding: 28px;
      transition: .25s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, .08);
    }

    .service-card {
      background: white;
      border-radius: 18px;
      overflow: hidden;
      transition: .25s ease;
    }

    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, .08);
    }

    .section-title {
      color: var(--hc-primary);
    }

    .services-section {
      background: #ffffff;
    }

    .service-card {
      background: #fff;
      border-radius: 18px;
      overflow: hidden;
      transition: .3s ease;
      border: 1px solid rgba(15, 23, 42, .06);
    }

    .service-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 45px rgba(0, 0, 0, .08);
    }

    .service-img-wrapper {
      height: 210px;
      overflow: hidden;
    }

    .service-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: .4s ease;
    }

    .service-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: .4s ease;
    }

    .service-card:hover img {
      transform: scale(1.05);
    }

    .service-link {
      text-decoration: none;
      font-weight: 600;
      color: var(--hc-primary);
      font-size: 14px;
      transition: .2s ease;
    }

    .service-link:hover {
      color: var(--hc-primary-dark);
    }

    /* Footer Styling */
    .footer {
      background: #0B1220;
      color: rgba(255, 255, 255, .85);
    }

    .footer-brand {
      font-weight: 700;
      font-size: 18px;
      color: #ffffff;
    }

    .footer-title {
      font-weight: 600;
      margin-bottom: 14px;
      color: #ffffff;
    }

    .footer-text {
      color: rgba(255, 255, 255, .65);
      font-size: 14px;
    }

    .footer-links li {
      margin-bottom: 8px;
    }

    .footer-links a {
      text-decoration: none;
      color: rgba(255, 255, 255, .65);
      font-size: 14px;
      transition: .2s ease;
    }

    .footer-links a:hover {
      color: #ffffff;
      padding-left: 4px;
    }

    .footer-social {
      color: rgba(255, 255, 255, .75);
      font-size: 18px;
      transition: .2s ease;
    }

    .footer-social:hover {
      color: var(--hc-primary);
      transform: translateY(-2px);
    }

    .footer-divider {
      border-color: rgba(255, 255, 255, .08);
    }

    .footer-bottom {
      font-size: 13px;
      color: rgba(255, 255, 255, .55);
    }

    .bg-shape {
      position: absolute;
      border-radius: 50%;
      filter: blur(40px);
      opacity: .35;
      z-index: 0;
    }

    .bg-shape-1 {
      width: 320px;
      height: 320px;
      background: #1E88E5;
      top: 40px;
      left: -120px;
    }

    .bg-shape-2 {
      width: 280px;
      height: 280px;
      background: #2ECC71;
      bottom: 40px;
      right: -100px;
    }

    .btn {
      transition: .25s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .feature-card:hover,
    .service-card:hover {
      border: 1px solid rgba(30, 136, 229, .25);
    }

    .service-card img {
      transition: .3s ease;
    }

    .service-card:hover img {
      transform: scale(1.04);
    }

    .fade-in {
      animation: fadeUp .8s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(18px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="HealthCare Plus" height="54">
        <span class="logo-text">HealthCare Plus</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav mx-auto gap-lg-3">

          @auth
            @if(auth()->user()->role === 'patient')
              <li class="nav-item"><a class="nav-link" href="{{ url('/patient/dashboard') }}">Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/patient/appointments') }}">Appointments</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/patient/records') }}">Health Records</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/patient/profile') }}">Profile</a></li>
            @else
              <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/find-doctor') }}">Find Doctor</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/book-appointment') }}">Book Appointment</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Us</a></li>
            @endif
          @else
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/find-doctor') }}">Find Doctor</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/book-appointment') }}">Book Appointment</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Us</a></li>
          @endauth

        </ul>

        <div class="d-flex gap-2">
          @auth
            <!-- <a class="btn btn-outline-dark" href="{{ url('/dashboard') }}">Dashboard</a> -->

            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-danger">Logout</button>
            </form>
          @else
            <a class="btn btn-outline-dark" href="{{ url('/login') }}">Login</a>
            <a class="btn btn-primary" href="{{ url('/register') }}">Register</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container py-5">
      <div class="row g-4">

        <!-- Comapny info -->
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('images/logo.png') }}" height="40" alt="HealthCare Plus">
            <span class="footer-brand">HealthCare Plus</span>
          </div>

          <p class="footer-text mb-0">
            Book appointments with trusted doctors, explore services,
            and manage your health records securely.
          </p>
        </div>

        <!-- Quick Links -->
        <div class="col-6 col-lg-2">
          <h6 class="footer-title">Quick Links</h6>
          <ul class="list-unstyled footer-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/find-doctor') }}">Find Doctor</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/book-appointment') }}">Appointment</a></li>
          </ul>
        </div>

        <!-- Support -->
        <div class="col-6 col-lg-2">
          <h6 class="footer-title">Support</h6>
          <ul class="list-unstyled footer-links">
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>

          </ul>
        </div>

        <!-- Contact -->
        <div class="col-lg-4">
          <h6 class="footer-title">Contact</h6>
          <p class="footer-text mb-2">
            <i class="bi bi-telephone me-2"></i> +1 (647) - 1234
          </p>
          <p class="footer-text mb-2">
            <i class="bi bi-envelope me-2"></i> support@healthcareplus.com
          </p>
          <p class="footer-text">
            <i class="bi bi-geo-alt me-2"></i> Toronto, ON, Canada
          </p>
        </div>

      </div>

      <hr class="footer-divider my-4">

      <div class="d-flex flex-column flex-md-row justify-content-between footer-bottom">
        <div>© {{ date('Y') }} HealthCare Plus. All rights reserved.</div>
        <div>Designed & Developed by Ripal Patel</div>
      </div>

    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>