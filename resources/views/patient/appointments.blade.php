@extends('layouts.site')

@section('title', 'My Appointments')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">Manage Appointments</h2>

    <div class="card">
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($appointments as $appointment)

                        <tr>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                            </td>

                            <td class="text-center">
                                {{ $appointment->time_slot }}
                            </td>

                            <td class="text-center">
                                {{ $appointment->doctor }}
                            </td>

                            <td class="text-center">
                                {{ ucfirst($appointment->status) }}
                            </td>

                            <td class="text-center">

                                @if(strtolower($appointment->status) !== 'completed')

                                    <form action="{{ route('patient.appointments.cancel',$appointment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-outline-secondary btn-sm">
                                            Cancel
                                        </button>
                                    </form>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center py-4">
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

@endsection