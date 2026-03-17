@extends('layouts.site')

@section('title', 'Patient Dashboard')

@section('content')
<<<<<<< HEAD
<div class="container py-5">

    <h2 class="fw-bold mb-4">Patient Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Upcoming Appointment --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-3">Upcoming Appointment</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">Date</th>
                            <th class="py-3">Time</th>
                            <th class="py-3">Doctor</th>
                            <th class="py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($upcomingAppointments as $appt)
                            <tr>
                                <td class="ps-4">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ $appt->time_slot }}</td>
                                <td>{{ $appt->doctor }}</td>
                                <td>
                                    @php
                                        $badge = match(strtolower($appt->status)) {
                                            'confirmed' => 'success',
                                            'cancelled' => 'danger',
                                            'completed' => 'secondary',
                                            default     => 'primary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                        {{ $appt->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No upcoming appointments.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- All Appointments --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-3">All Appointments</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">Date</th>
                            <th class="py-3">Time</th>
                            <th class="py-3">Doctor</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appt)
                            <tr>
                                <td class="ps-4">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ $appt->time_slot }}</td>
                                <td>{{ $appt->doctor }}</td>
                                <td>
                                    @php
                                        $badge = match(strtolower($appt->status)) {
                                            'confirmed' => 'success',
                                            'cancelled' => 'danger',
                                            'completed' => 'secondary',
                                            default     => 'primary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                        {{ $appt->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if(!in_array(strtolower($appt->status), ['cancelled', 'completed']))
                                        <form method="POST" action="{{ route('patient.appointments.cancel', $appt->id) }}"
                                              class="d-inline" onsubmit="return confirm('Cancel this appointment?')">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
=======
    <div class="container py-5">

        <h2 class="fw-bold mb-4">Patient Dashboard</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Upcoming Appointment --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-semibold mb-3">Upcoming Appointment</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Date</th>
                                <th class="py-3">Time</th>
                                <th class="py-3">Doctor</th>
                                <th class="py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingAppointments as $appt)
                                <tr>
                                    <td class="ps-4">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}</td>
                                    <td>{{ $appt->time_slot }}</td>
                                    <td>{{ $appt->doctor }}</td>
                                    <td>
                                        @php
                                            $badge = match (strtolower($appt->status)) {
                                                'confirmed' => 'success',
                                                'cancelled' => 'danger',
                                                'completed' => 'secondary',
                                                default => 'primary',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                            {{ $appt->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No upcoming appointments.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- All Appointments --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-semibold mb-3">All Appointments</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Date</th>
                                <th class="py-3">Time</th>
                                <th class="py-3">Doctor</th>
                                <th class="py-3">Status</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $appt)
                                <tr>
                                    <td class="ps-4">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}</td>
                                    <td>{{ $appt->time_slot }}</td>
                                    <td>{{ $appt->doctor }}</td>
                                    <td>
                                        @php
                                            $badge = match (strtolower($appt->status)) {
                                                'confirmed' => 'success',
                                                'cancelled' => 'danger',
                                                'completed' => 'secondary',
                                                default => 'primary',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                            {{ $appt->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if(!in_array(strtolower($appt->status), ['cancelled', 'completed']))
                                            <form method="POST" action="{{ route('patient.appointments.cancel', $appt->id) }}"
                                                class="d-inline" onsubmit="return confirm('Cancel this appointment?')">
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Cancel</button>
                                            </form>
                                        @else
                                            <span class="text-muted small">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No appointments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex gap-3 mt-4">
            <a href="{{ url('/book-appointment') }}" class="btn btn-primary px-4">
                Book Appointment
            </a>
        </div>
>>>>>>> c6e839e (add files)
@endsection