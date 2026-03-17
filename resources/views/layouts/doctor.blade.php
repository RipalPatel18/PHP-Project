<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Doctor Dashboard') - HealthCare Plus</title>

<!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    :root{
      --hc-primary:#1E88E5;
      --hc-primary-dark:#1565C0;
      --hc-light:#F4F8FB;
      --hc-dark:#1A1A1A;
    }
    body{ background:var(--hc-light); font-family:'Inter',sans-serif; }
    .navbar{ background:#fff!important; }
    .navbar .nav-link{ font-weight:500; color:#1A1A1A; transition:.2s ease; position:relative; }
    .navbar .nav-link:hover{ color:var(--hc-primary); }
    .navbar .nav-link.active{ color:var(--hc-primary); }
    .navbar .nav-link::after{
      content:""; position:absolute; left:8px; bottom:-6px; width:0%; height:2px;
      background:var(--hc-primary); border-radius:999px; transition:.25s ease;
    }
    .navbar .nav-link:hover::after{ width:calc(100% - 16px); }
    .navbar .nav-link.active::after{ width:calc(100% - 16px); }

    .logo-text{ font-size:16px; letter-spacing:.2px; color:var(--hc-dark); }
    .btn-primary{ background:var(--hc-primary); border:solid 1px #083a74; }
    .btn-primary:hover{ background:var(--hc-primary-dark); }
    .btn{ transition:.25s ease; }
    .btn:hover{ transform:translateY(-2px); }

    /* Footer Styling */
    .footer{ background:#0B1220; color:rgba(255,255,255,.85); }
    .footer-brand{ font-weight:700; font-size:18px; color:#fff; }
    .footer-title{ font-weight:600; margin-bottom:14px; color:#fff; }
    .footer-text{ color:rgba(255,255,255,.65); font-size:14px; }
    .footer-links li{ margin-bottom:8px; }
    .footer-links a{ text-decoration:none; color:rgba(255,255,255,.65); font-size:14px; transition:.2s ease; }
    .footer-links a:hover{ color:#fff; padding-left:4px; }
    .footer-divider{ border-color:rgba(255,255,255,.08); }
    .footer-bottom{ font-size:13px; color:rgba(255,255,255,.55); }
  </style>
</head>

<body>

  {{-- Doctor Navbar --}}
  <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ url('/doctor/dashboard') }}">
        <img src="{{ asset('images/logo.png') }}" alt="HealthCare Plus" height="54">
        <span class="logo-text">HealthCare Plus</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDoctor">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navDoctor">
        <ul class="navbar-nav mx-auto gap-lg-3">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('doctor/dashboard') ? 'active' : '' }}"
               href="{{ url('/doctor/dashboard') }}">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('doctor/availability*') ? 'active' : '' }}"
               href="{{ url('/doctor/availability') }}">Availability</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('doctor/appointments*') ? 'active' : '' }}"
               href="{{ url('/doctor/appointments') }}">Appointments</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('doctor/profile*') ? 'active' : '' }}"
               href="{{ url('/doctor/profile') }}">Profile</a>
          </li>
        </ul>

        <div class="d-flex gap-2 align-items-center">
         

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <!-- footer -->
  <footer class="footer mt-5">
    <div class="container py-5">
      <div class="row g-4">

        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('images/logo.png') }}" height="40" alt="HealthCare Plus">
            <span class="footer-brand">HealthCare Plus</span>
          </div>
          <p class="footer-text mb-0">
            Doctor portal to manage appointments, availability, and patient scheduling efficiently.
          </p>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="footer-title">Doctor Links</h6>
          <ul class="list-unstyled footer-links">
            <li><a href="{{ url('/doctor/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/doctor/appointments') }}">Appointments</a></li>
            <li><a href="{{ url('/doctor/availability') }}">Availability</a></li>
            <li><a href="{{ url('/doctor/profile') }}">Profile</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="footer-title">Support</h6>
          <ul class="list-unstyled footer-links">
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-lg-4">
          <h6 class="footer-title">Contact</h6>
          <p class="footer-text mb-2"><i class="bi bi-telephone me-2"></i> +1 (647) - 1234</p>
          <p class="footer-text mb-2"><i class="bi bi-envelope me-2"></i> support@healthcareplus.com</p>
          <p class="footer-text"><i class="bi bi-geo-alt me-2"></i> Toronto, ON, Canada</p>
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