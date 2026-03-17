@extends('layouts.site')

@section('content')

    <section class="py-5" style="background:#f4f8fc;">

        <div class="container">

            @php
                $imageMap = [
                    'Dr. Daniel Kim' => 'daniel.jpg',
                    'Dr. Sophia Martinez' => 'sophia.jpg',
                    'Dr. Michael Thompson' => 'michael.jpg',
                    'Dr. Emily Carter' => 'emily.jpg',
                    'Dr. Olivia Bennett' => 'olivia.jpg',
                ];
            @endphp

            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="fw-bold section-title mb-2">Find a Doctor</h1>
                <p class="text-muted mb-0">Search trusted doctors by specialty and location.</p>
            </div>

            <!-- Search Box -->
            <div class="service-card mb-5">
                <div class="p-4 p-md-5">

                    <form method="GET" action="{{ route('find-doctor') }}" class="row g-4 align-items-end">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Specialty</label>

                            <select name="specialty" class="form-select form-select-lg rounded-3">

                                <option value="">All Specialties</option>

                                @foreach($departments as $department)

                                    <option value="{{ $department->id }}" {{ request('specialty') == $department->id ? 'selected' : '' }}>

                                        {{ $department->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-4">

                            <label class="form-label fw-semibold">Location</label>

                            <input type="text" name="location" class="form-control form-control-lg rounded-3"
                                placeholder="Enter location" value="{{ request('location') }}">

                        </div>

                        <div class="col-md-4 d-grid">

                            <button type="submit" class="btn btn-primary btn-lg rounded-3">

                                <i class="bi bi-search me-2"></i>Search

                            </button>

                        </div>

                    </form>

                </div>
            </div>

            <!-- Doctor List -->
            <div class="d-flex flex-column gap-4">

                @forelse($doctors as $doctor)

                    @php
                        $image = $imageMap[$doctor->name] ?? 'default.jpg';
                    @endphp

                    <div class="service-card">

                        <div class="p-4 p-md-5">

                            <div class="row align-items-center g-4">

                                <!-- Doctor Image -->
                                <div class="col-12 col-md-2 text-center text-md-start">

                                    <img src="{{ asset('images/doctors/' . $image) }}"
                                        onerror="this.src='{{ asset('images/doctors/default.jpg') }}';"
                                        alt="{{ $doctor->name }}" class="rounded-4 shadow-sm border"
                                        style="width:120px;height:120px;object-fit:cover;">

                                </div>

                                <!-- Doctor Info -->
                                <div class="col-12 col-md-7">

                                    <h3 class="fw-bold mb-2">

                                        {{ $doctor->name }}

                                    </h3>

                                    <div class="d-flex flex-wrap align-items-center gap-2">

                                        <span class="badge rounded-pill bg-primary">

                                            {{ $doctor->department->name ?? 'General' }}

                                        </span>

                                        @if(!empty($doctor->location))

                                            <span class="text-muted small">

                                                <i class="bi bi-geo-alt me-1"></i>

                                                {{ $doctor->location }}

                                            </span>

                                        @endif

                                    </div>

                                </div>

                                <!-- CTA -->
                                <div class="col-12 col-md-3 text-md-end">

                                    <a href="{{ route('doctor-profile', $doctor->id) }}"
                                        class="btn btn-outline-primary rounded-pill px-4 py-2">

                                        View Profile

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="service-card">

                        <div class="p-5 text-center">

                            <h5 class="fw-bold mb-2">

                                No doctors found

                            </h5>

                            <p class="text-muted mb-0">

                                Try changing your specialty or location search.

                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

@endsection