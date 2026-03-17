@extends('layouts.doctor')

@section('title', 'Doctor Availability')

@section('content')
<<<<<<< HEAD
<div class="container py-5">

    <h2 class="fw-bold mb-4">Doctor Availability</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
=======
    <div class="container py-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h2 class="fw-bold mb-2">Doctor Availability</h2>
            <p class="text-muted mb-0">Manage the days and time slots patients can book.</p>
>>>>>>> c6e839e (add files)
        </div>
    @endif

<<<<<<< HEAD
 <!-- Add Availability -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-4">Add Availability</h5>

            <form method="POST" action="{{ route('doctor.availability.store') }}">
                @csrf
=======
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h4 class="fw-semibold mb-4">Add Availability</h4>

            <form method="POST" action="{{ route('doctor.availability.store') }}">
                @csrf

>>>>>>> c6e839e (add files)
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Day</label>
                        <select name="day" class="form-select">
                            <option value="">Select Day</option>
<<<<<<< HEAD
                            @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
=======
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
>>>>>>> c6e839e (add files)
                                <option value="{{ $day }}" {{ old('day') === $day ? 'selected' : '' }}>{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>

<<<<<<< HEAD
=======


>>>>>>> c6e839e (add files)
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Start Time</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">End Time</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}" class="form-control">
                    </div>
                </div>

                <div class="mt-4">
<<<<<<< HEAD
                    <button type="submit" class="btn btn-dark px-4">Add slot</button>
                </div>
            </form>
        </div>
    </div>

   <!-- Current Availability -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 pb-0">
            <h5 class="fw-semibold mb-3">Current Availability</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4">Day</th>
                        <th class="py-3 text-center">Time</th>
                        <th class="py-3 text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($availabilities as $slot)
                        <tr>
                            <td class="ps-4 fw-semibold">{{ $slot->day }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}
                            </td>
                            <td class="text-end pe-4">
                                <form method="POST" action="{{ route('doctor.availability.delete', $slot->id) }}" class="d-inline" onsubmit="return confirm('Remove this slot?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-dark btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">No availability set yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
=======
                    <button type="submit" class="btn btn-primary px-4">Add Slot</button>

                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 pb-0">
                <h4 class="fw-semibold mb-4">Current Availability</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3">Day</th>
                            <th class="py-3">Time</th>
                            <th class="text-end pe-4 py-3">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @forelse($availabilities as $slot)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $slot->day }}</td>
                                <td>{{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} -
                                    {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}</td>
                                <td class="text-end pe-4">
                                    <form method="POST" action="{{ route('doctor.availability.delete', $slot->id) }}"
                                        class="d-inline" onsubmit="return confirm('Remove this slot?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-dark btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        
                            <tr>

                                <td colspan="3" class="text-center py-5 text-muted">No availability set yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
>>>>>>> c6e839e (add files)
@endsection