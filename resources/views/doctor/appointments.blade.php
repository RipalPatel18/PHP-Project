@extends('layouts.doctor')

@section('title', 'Appointments')

@section('content')
<<<<<<< HEAD
<div class="container py-5">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Appointments</h2>
            <p class="text-muted mb-0">View and manage your patient appointments.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">Patient</th>
                            <th class="py-3">Date</th>
                            <th class="py-3">Time</th>
                            <th class="py-3">Reason</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $appointment->patient_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ $appointment->time_slot }}</td>
                                <td class="text-muted">{{ $appointment->notes ?? 'General Consultation' }}</td>
                                <td>
                                    @php
                                        $badge = match($appointment->status) {
                                            'Upcoming'  => 'primary',
                                            'Confirmed' => 'success',
                                            'Cancelled' => 'danger',
                                            default     => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                        {{ $appointment->status }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    @if($appointment->status === 'Upcoming')
                                        <form method="POST" action="{{ route('doctor.appointments.confirm', $appointment->id) }}" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-outline-success btn-sm">Confirm</button>
                                        </form>
                                        <form method="POST" action="{{ route('doctor.appointments.cancel', $appointment->id) }}" class="d-inline ms-1" onsubmit="return confirm('Cancel this appointment?')">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-outline-danger btn-sm">Cancel</button>
                                        </form>
                                    @else
                                        <span class="text-muted small">No actions</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No appointments found.</td>
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

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

            <h2 class="fw-bold mb-1">Appointments</h2>
            <p class="text-muted mb-0">View and manage your patient appointments.</p>
        </div>

        @if(session('success'))

            <div class="alert alert-success rounded-4">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                   <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">Patient</th>
                            <th class="py-3">Date</th>
                            <th class="py-3">Time</th>
                            <th class="py-3">Reason</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end pe-4">Actions</th>


                        </tr>
                    </thead>
                    <tbody>


                        @forelse($appointments as $appointment)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $appointment->patient_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ $appointment->time_slot }}</td>
                                <td class="text-muted">{{ $appointment->notes ?? 'General Consultation' }}</td>
                                <td>
                                    @php
                                        $badge = match ($appointment->status) {
                                            'Upcoming' => 'primary',
                                            'Confirmed' => 'success',
                                            'Cancelled' => 'danger',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                        {{ $appointment->status }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    @if($appointment->status === 'Upcoming')


                                        <form method="POST" action="{{ route('doctor.appointments.confirm', $appointment->id) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-primary btn-sm">Confirm</button>
                                        </form>


                                        <form method="POST" action="{{ route('doctor.appointments.cancel', $appointment->id) }}"
                                            class="d-inline ms-1" onsubmit="return confirm('Cancel this appointment?')">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-dark btn-sm">Cancel</button>
                                        </form>


                                    @else
                                        <span class="text-muted small">No actions</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No appointments found.</td>
                            </tr>

                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
>>>>>>> c6e839e (add files)
@endsection