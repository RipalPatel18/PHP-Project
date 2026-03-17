<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Patient - HealthCare Plus')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <!-- Patient Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ url('/patient/dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="HealthCare Plus" height="46">
                <span>HealthCare Plus</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#patientNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="patientNav">
                <ul class="navbar-nav mx-auto gap-lg-4">

                    <li class="nav-item">
                        <a class="nav-link fw-medium {{ request()->is('patient/dashboard') ? 'fw-semibold text-primary' : 'text-dark' }}"
                            href="{{ route('patient.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium {{ request()->is('patient/appointments') ? 'fw-semibold text-primary' : 'text-dark' }}"
                            href="{{ route('patient.appointments') }}">
                            Appointments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium {{ request()->is('patient/records') ? 'fw-semibold text-primary' : 'text-dark' }}"
                            href="{{ route('patient.records') }}">
                            Health Records
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium {{ request()->is('patient/profile') ? 'fw-semibold text-primary' : 'text-dark' }}"
                            href="{{ route('patient.profile') }}">
                            Profile
                        </a>
                    </li>

                </ul>

                <div class="d-flex align-items-center gap-2">
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



    <!-- Footer -->
    <footer class="mt-5" style="background-color: #0B1220; color: rgba(255,255,255,.85);">
        <div class="container py-5">
            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="{{ asset('images/logo.png') }}" height="40" alt="HealthCare Plus">
                        <span class="fw-bold fs-5 text-white">HealthCare Plus</span>
                    </div>
                    <p class="text-white-50 small mb-0">
                        Book appointments with trusted doctors, explore services,
                        and manage your health records securely.
                    </p>



                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="fw-semibold text-white mb-3">Patient</h6>
                    <ul class="list-unstyled">


                        <li class="mb-2"><a href="{{ url('/patient/dashboard') }}"
                                class="text-white-50 text-decoration-none small">Dashboard</a></li>
                        <li class="mb-2"><a href="{{ url('/patient/appointments') }}"
                                class="text-white-50 text-decoration-none small">Appointments</a></li>
                        <li class="mb-2"><a href="{{ url('/patient/records') }}"
                                class="text-white-50 text-decoration-none small">Health Records</a></li>
                        <li class="mb-2"><a href="{{ url('/patient/profile') }}"
                                class="text-white-50 text-decoration-none small">Profile</a></li>
                    </ul>


                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="fw-semibold text-white mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/contact') }}"
                                class="text-white-50 text-decoration-none small">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h6 class="fw-semibold text-white mb-3">Contact</h6>

                    <p class="text-white-50 small mb-2"><i class="bi bi-telephone me-2"></i> +1 (647) - 1234</p>
                    <p class="text-white-50 small mb-2"><i class="bi bi-envelope me-2"></i> support@healthcareplus.com
                    </p>
                    <p class="text-white-50 small mb-0"><i class="bi bi-geo-alt me-2"></i> Toronto, ON, Canada</p>
                </div>

            </div>

            <hr class="border-secondary my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between small"
                style="color: rgba(255,255,255,.55);">
                <div>© {{ date('Y') }} HealthCare Plus. All rights reserved.</div>
                <div>Designed & Developed by Ripal Patel</div>

                
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>