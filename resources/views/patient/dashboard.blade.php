@extends('layouts.site')

@section('title', 'Patient Dashboard')

@section('content')

<section class="py-5 patient-dashboard-page">
    <div class="container">

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold section-title mb-2">Patient Dashboard</h2>
                <p class="text-muted mb-0">
                    View your upcoming appointments and manage your healthcare account easily.
                </p>
            </div>

            <a href="{{ url('/book-appointment') }}" class="btn btn-hero-primary px-4">
                <i class="bi bi-calendar2-plus me-1"></i> Book Appointment
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-4 shadow-sm border-0">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-4 shadow-sm border-0">
                {{ session('error') }}
            </div>
        @endif

        <div class="row g-4">

            <!-- Upcoming Appointment -->
            <div class="col-lg-5">
                <div class="service-card h-100">
                    <div class="p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="fw-bold mb-0">Upcoming Appointment</h4>
                            <i class="bi bi-calendar-check text-primary fs-3"></i>
                        </div>

                        @forelse($upcomingAppointments ?? [] as $appointment)
                            <div class="patient-info-box">
                                <div class="mb-3">
                                    <span class="patient-label">Doctor</span>
                                    <h5 class="fw-semibold mb-0">{{ $appointment->doctor }}</h5>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <span class="patient-label">Date</span>
                                        <div class="fw-medium">
                                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="patient-label">Time</span>
                                        <div class="fw-medium">{{ $appointment->time_slot }}</div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <span class="patient-label">Status</span>
                                    <div>
                                        @if($appointment->status == 'Upcoming')
                                            <span class="badge bg-success-subtle text-success-emphasis px-3 py-2 rounded-pill">Upcoming</span>
                                        @elseif($appointment->status == 'Completed')
                                            <span class="badge bg-secondary-subtle text-secondary-emphasis px-3 py-2 rounded-pill">Completed</span>
                                        @elseif($appointment->status == 'Cancelled')
                                            <span class="badge bg-danger-subtle text-danger-emphasis px-3 py-2 rounded-pill">Cancelled</span>
                                        @else
                                            <span class="badge bg-primary-subtle text-primary-emphasis px-3 py-2 rounded-pill">
                                                {{ $appointment->status }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if($appointment->status == 'Upcoming')
                                    <form action="{{ route('patient.appointments.cancel', $appointment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger px-4">
                                            Cancel Appointment
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="bi bi-calendar-x text-muted fs-1"></i>
                                <p class="text-muted mt-3 mb-0">No upcoming appointment found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- All Appointments -->
            <div class="col-lg-7">
                <div class="service-card h-100">
                    <div class="p-4">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                            <h4 class="fw-bold mb-0">Recent Appointments</h4>
                            <a href="{{ route('patient.appointments') }}" class="btn btn-outline-primary btn-sm px-3">
                                View All
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0 patient-table-modern">
                                <thead>
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments ?? [] as $appointment)
                                        <tr>
                                            <td class="fw-semibold">{{ $appointment->doctor }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                                            <td>{{ $appointment->time_slot }}</td>
                                            <td>
                                                @if($appointment->status == 'Upcoming')
                                                    <span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3 py-2">Upcoming</span>
                                                @elseif($appointment->status == 'Completed')
                                                    <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2">Completed</span>
                                                @elseif($appointment->status == 'Cancelled')
                                                    <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill px-3 py-2">Cancelled</span>
                                                @else
                                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">
                                                        {{ $appointment->status }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                No appointments found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-12">
                <div class="feature-card">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-8">
                            <h4 class="fw-bold mb-2">Manage your health information</h4>
                            <p class="text-muted mb-0">
                                View your records, update profile details, and keep your account information current.
                            </p>
                        </div>

                        <div class="col-md-4 text-md-end">
                            <a href="{{ route('patient.records') }}" class="btn btn-primary px-4 me-2 mb-2 mb-md-0">
                                Health Records
                            </a>
                            <a href="{{ route('patient.profile') }}" class="btn btn-outline-dark px-4">
                                My Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection