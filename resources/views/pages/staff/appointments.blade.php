@extends('layouts.site')

@section('title', 'All Appointments – Staff View')

@section('content')
    <div class="container py-5">

        <h2 class="fw-bold mb-4">All Appointments (Staff View)</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Patient</th>
                                <th class="py-3">Date</th>
                                <th class="py-3">Time</th>
                                <th class="py-3">Doctor</th>
                                <th class="py-3">Status</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $appt)
                                <tr>
                                    <td class="ps-4">{{ $appt->user->name ?? '—' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}</td>
                                    <td>{{ $appt->time_slot }}</td>
                                    <td>{{ $appt->doctor }}</td>
                                    <td>
                                        @php
                                            $badge = match (strtolower($appt->status)) {
                                                'confirmed' => 'success',
                                                'cancelled' => 'danger',
                                                'completed' => 'secondary',
                                                'upcoming' => 'primary',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}-subtle text-{{ $badge }} rounded-pill px-3">
                                            {{ $appt->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('staff.appointments.updateStatus', $appt->id) }}"
                                            class="d-flex align-items-center justify-content-center gap-2">
                                            @csrf
                                            <select name="status" class="form-select form-select-sm w-auto">
                                                @foreach(['Upcoming', 'Confirmed', 'Completed', 'Cancelled'] as $s)
                                                    <option value="{{ $s }}" {{ $appt->status === $s ? 'selected' : '' }}>
                                                        {{ $s }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary btn-sm px-3">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No appointments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection