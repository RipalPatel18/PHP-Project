@extends('layouts.site')

@section('content')
<section class="py-5" style="background:#f4f8fc;">
  <div class="container">

    <div class="text-center mb-5">
      <h1 class="fw-bold section-title mb-2">Book Appointment</h1>
      <p class="text-muted mb-0">Fill in your details to schedule an appointment with a doctor.</p>
    </div>

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

    <div class="service-card">
      <div class="p-4 p-md-5">

        <form method="POST" action="{{ route('book-appointment.store') }}">
          @csrf

          <div class="row g-4">

            <div class="col-md-6">
              <label class="form-label fw-semibold">Patient Name</label>
              <input type="text" name="patient_name" class="form-control"
                     placeholder="Enter your full name" value="{{ old('patient_name') }}">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" name="email" class="form-control"
                     placeholder="Enter your email" value="{{ old('email') }}">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Select Doctor</label>
              <select name="doctor" class="form-select">
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->name }}" {{ old('doctor') == $doctor->name ? 'selected' : '' }}>
                    {{ $doctor->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Appointment Date</label>
              <input type="date" name="appointment_date" class="form-control"
                     value="{{ old('appointment_date') }}" min="{{ date('Y-m-d') }}">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Time Slot</label>
              <select name="time_slot" class="form-select">
                <option value="">Select Time</option>
                <option {{ old('time_slot') == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                <option {{ old('time_slot') == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                <option {{ old('time_slot') == '11:30 AM' ? 'selected' : '' }}>11:30 AM</option>
                <option {{ old('time_slot') == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                <option {{ old('time_slot') == '02:30 PM' ? 'selected' : '' }}>02:30 PM</option>
                <option {{ old('time_slot') == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone</label>
              <input type="text" name="phone" class="form-control"
                     placeholder="Enter your phone number" value="{{ old('phone') }}">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Notes</label>
              <textarea name="notes" class="form-control" rows="4"
                        placeholder="Enter reason for appointment">{{ old('notes') }}</textarea>
            </div>

          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2">
              Confirm Booking
            </button>
          </div>

        </form>

      </div>
    </div>

  </div>
</section>
@endsection