@extends('layouts.site')

@section('content')
    <section class="py-5" style="background:#f4f8fc;">
        <div class="container">

            @php
                $imageMap = [
<<<<<<< HEAD
                    'Dr. Daniel Kim' => 'daniel.jpg',
                    'Dr. Sophia Martinez' => 'sophia.jpg',
                    'Dr. Michael Thompson' => 'michael.jpg',
                    'Dr. Emily Carter' => 'emily.jpg',
                    'Dr. Olivia Bennett' => 'olivia.jpg',
                ];
            @endphp

            {{-- Header --}}
=======
                    'Dr. Daniel Kim'       => 'daniel.jpg',
                    'Dr. Sophia Martinez'  => 'sophia.jpg',
                    'Dr. Michael Thompson' => 'michael.jpg',
                    'Dr. Emily Carter'     => 'emily.jpg',
                    'Dr. Olivia Bennett'   => 'olivia.jpg',
                ];
            @endphp

             <!-- Header  -->
>>>>>>> c6e839e (add files)
            <div class="text-center mb-5">
                <h1 class="fw-bold section-title mb-2">Find a Doctor</h1>
                <p class="text-muted mb-0">Search trusted doctors by specialty and location.</p>
            </div>

<<<<<<< HEAD
            {{-- Search Box --}}
            <div class="service-card mb-5">
                <div class="p-4 p-md-5">
                    <form method="GET" action="{{ route('find-doctor') }}" class="row g-4 align-items-end">
                        <div class="col-md-4">
=======
             <!--  Search Box  -->
            <div class="service-card mb-5">
                <div class="p-4 p-md-5">
                    <form method="GET" action="{{ route('find-doctor') }}" class="row g-4 align-items-end">
                        <div class="col-12 col-md-4">
>>>>>>> c6e839e (add files)
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
<<<<<<< HEAD
                        <div class="col-md-4">
=======
                        <div class="col-12 col-md-4">
>>>>>>> c6e839e (add files)
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" class="form-control form-control-lg rounded-3"
                                placeholder="Enter location" value="{{ request('location') }}">
                        </div>
<<<<<<< HEAD
                        <div class="col-md-4 d-grid">
=======
                        <div class="col-12 col-md-4 d-grid">
>>>>>>> c6e839e (add files)
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                <i class="bi bi-search me-2"></i>Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

<<<<<<< HEAD
            {{-- Doctor List --}}
=======
             <!--  Doctor List  -->
>>>>>>> c6e839e (add files)
            <div class="d-flex flex-column gap-4">
                @forelse($doctors as $doctor)
                    @php
                        $image = $imageMap[$doctor->name] ?? 'default.jpg';
                    @endphp
                    <div class="service-card">
                        <div class="p-4 p-md-5">
<<<<<<< HEAD
                            <div class="row align-items-center g-4">

                                <div class="col-12 col-md-2 text-center text-md-start">
=======
                            <div class="row align-items-center g-4 text-center text-md-start">

                                 <!--  Doctor image  -->
                                <div class="col-12 col-md-2 d-flex justify-content-center justify-content-md-start">
>>>>>>> c6e839e (add files)
                                    <img src="{{ asset('images/doctors/' . $image) }}"
                                        onerror="this.src='{{ asset('images/doctors/default.jpg') }}';"
                                        alt="{{ $doctor->name }}" class="rounded-4 shadow-sm border"
                                        style="width:120px;height:120px;object-fit:cover;">
                                </div>

<<<<<<< HEAD
                                <div class="col-12 col-md-7">
                                    <h3 class="fw-bold mb-2">{{ $doctor->name }}</h3>
                                    <div class="d-flex flex-wrap align-items-center gap-2">
=======
                                 <!--  Doctor info  -->
                                <div class="col-12 col-md-7">
                                    <h3 class="fw-bold mb-2">{{ $doctor->name }}</h3>
                                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-2">
>>>>>>> c6e839e (add files)
                                        <span class="badge rounded-pill bg-primary">
                                            {{ optional($doctor->department)->name ?? 'General' }}
                                        </span>
                                        @if(!empty($doctor->location))
                                            <span class="text-muted small">
                                                <i class="bi bi-geo-alt me-1"></i>{{ $doctor->location }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

<<<<<<< HEAD
                                <div class="col-12 col-md-3 text-md-end">
=======
                                <!-- View profile button  -->
                                <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end">
>>>>>>> c6e839e (add files)
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
                            <h5 class="fw-bold mb-2">No doctors found</h5>
                            <p class="text-muted mb-0">Try changing your specialty or location search.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection