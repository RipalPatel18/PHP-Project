<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Dashboard') - HealthCare Plus</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<<<<<<< HEAD

  <style>
    :root {
      --hc-primary: #1E88E5;
      --hc-primary-dark: #1565C0;
      --hc-light: #F4F8FB;
      --hc-dark: #1A1A1A;
    }

    body {
      background: var(--hc-light);
      font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    .navbar {
      background: #fff !important;
    }

    .navbar .nav-link {
      font-weight: 500;
      color: #1A1A1A;
      transition: .2s ease;
      position: relative;
    }

    .navbar .nav-link:hover {
      color: var(--hc-primary);
    }

    .navbar .nav-link.active {
      color: var(--hc-primary);
      font-weight: 700;
    }

    .btn-primary {
      background: var(--hc-primary);
      border: solid 1px #083a74;
    }

    .btn-primary:hover {
      background: var(--hc-primary-dark);
    }

    .footer {
      background: #0B1220;
      color: rgba(255, 255, 255, .85);
    }

    .footer-brand {
      font-weight: 700;
      font-size: 18px;
      color: #fff;
    }

    .footer-title {
      font-weight: 600;
      margin-bottom: 14px;
      color: #fff;
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
      color: #fff;
      padding-left: 4px;
    }

    .footer-divider {
      border-color: rgba(255, 255, 255, .08);
    }

    .footer-bottom {
      font-size: 13px;
      color: rgba(255, 255, 255, .55);
    }
  </style>
</head>

<body>

 <!-- Admin Navbar -->
=======
</head>

<body class="bg-light">
  
  <!-- Admin Navbar -->
>>>>>>> c6e839e (add files)
  <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ url('/admin/dashboard') }}">
        <img src="{{ asset('images/logo.png') }}" alt="HealthCare Plus" height="54">
        <span>HealthCare Plus</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAdmin">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navAdmin">
        <ul class="navbar-nav mx-auto gap-lg-3">
          <li class="nav-item">
<<<<<<< HEAD
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
              href="{{ url('/admin/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/manage-doctors*') ? 'active' : '' }}"
              href="{{ url('/admin/manage-doctors') }}">Manage Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/manage-services*') ? 'active' : '' }}"
              href="{{ url('/admin/manage-services') }}">Manage Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/delete-patients*') ? 'active' : '' }}"
=======
            <a class="nav-link fw-medium {{ request()->is('admin/dashboard') ? 'active fw-bold text-primary' : 'text-dark' }}"
              href="{{ url('/admin/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium {{ request()->is('admin/manage-doctors*') ? 'active fw-bold text-primary' : 'text-dark' }}"
              href="{{ url('/admin/manage-doctors') }}">Manage Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium {{ request()->is('admin/manage-services*') ? 'active fw-bold text-primary' : 'text-dark' }}"
              href="{{ url('/admin/manage-services') }}">Manage Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium {{ request()->is('admin/delete-patients*') ? 'active fw-bold text-primary' : 'text-dark' }}"
>>>>>>> c6e839e (add files)
              href="{{ url('/admin/delete-patients') }}">Delete Patients</a>
          </li>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>


  <!-- Footer -->
  <footer class="mt-5" style="background-color: #0B1220; color: rgba(255,255,255,.85);">
    <div class="container py-5">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('images/logo.png') }}" height="40" alt="HealthCare Plus">
            <span class="fw-bold fs-5">HealthCare Plus</span>
          </div>
          <p class="text-white-50 small mb-0">
            Admin portal to manage doctors, services, departments, and patients.
          </p>
        </div>


        <div class="col-6 col-lg-2">
          <h6 class="fw-semibold text-white mb-3">Admin Links</h6>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ url('/admin/dashboard') }}"
                class="text-white-50 text-decoration-none small">Dashboard</a></li>
            <li class="mb-2"><a href="{{ url('/admin/manage-doctors') }}"
                class="text-white-50 text-decoration-none small">Manage Doctors</a></li>
            <li class="mb-2"><a href="{{ url('/admin/manage-services') }}"
                class="text-white-50 text-decoration-none small">Manage Services</a></li>
            <li class="mb-2"><a href="{{ url('/admin/manage-departments') }}"
                class="text-white-50 text-decoration-none small">Manage Departments</a></li>
          </ul>
        </div>


        <div class="col-6 col-lg-2">
          <h6 class="fw-semibold text-white mb-3">Support</h6>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ url('/contact') }}" class="text-white-50 text-decoration-none small">Contact
                Us</a></li>
          </ul>

        </div>

        <div class="col-lg-4">
          <h6 class="fw-semibold text-white mb-3">Contact</h6>
          <p class="text-white-50 small mb-2"><i class="bi bi-telephone me-2"></i> +1 (647) - 1234</p>
          <p class="text-white-50 small mb-2"><i class="bi bi-envelope me-2"></i> support@healthcareplus.com</p>
          <p class="text-white-50 small mb-0"><i class="bi bi-geo-alt me-2"></i> Toronto, ON, Canada</p>
        </div>
      </div>


      <hr class="border-secondary my-4">

      <div class="d-flex flex-column flex-md-row justify-content-between text-white-50 small">
        <div>© {{ date('Y') }} HealthCare Plus. All rights reserved.</div>
        <div>Designed & Developed by Ripal Patel</div>
      </div>
    </div>
  </footer>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>