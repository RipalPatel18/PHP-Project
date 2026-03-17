@extends('layouts.site')

@section('content')

  <section class="py-5">
    <div class="container">


      @php
        $experienceMap = [
          'Dr. Daniel Kim' => '12 years of experience',
          'Dr. Sophia Martinez' => '10 years of experience',

          'Dr. Michael Thompson' => '15 years of experience',
          'Dr. Emily Carter' => '8 years of experience',
          'Dr. Olivia Bennett' => '9 years of experience',
        ];

        $experience = $experienceMap[$doctor->name] ?? '10 years of experience';


        $aboutMap = [
          'Dr. Daniel Kim' =>
            'Dr. Daniel Kim is a dedicated specialist with extensive experience in diagnosing and treating patients with compassion and care. He focuses on preventive treatment and long-term patient wellness.',

          'Dr. Sophia Martinez' =>
            'Dr. Sophia Martinez is an experienced physician known for her attentive care and strong clinical background. She works closely with patients to provide personalized treatment plans.',


          'Dr. Michael Thompson' =>
            'Dr. Michael Thompson is a board-certified doctor with many years of experience in patient care and consultation. He is passionate about delivering quality healthcare.',

          'Dr. Emily Carter' =>
            'Dr. Emily Carter provides thoughtful and evidence-based care. She believes in clear communication and supporting patients through every stage of treatment.',


          'Dr. Olivia Bennett' =>
            'Dr. Olivia Bennett is a compassionate physician focused on holistic care and strong patient relationships. She supports patients with personalized treatment and preventive healthcare guidance.',
        
        ];


        $about = $aboutMap[$doctor->name] ?? 'This doctor is committed to providing compassionate and patient-centered healthcare.';

        $availabilityMap = [

          'Dr. Daniel Kim' => [
            'Monday: 9:00 AM - 5:00 PM',
            'Tuesday: 9:00 AM - 5:00 PM',
            'Wednesday: 10:00 AM - 3:00 PM',
            'Friday: 9:00 AM - 1:00 PM',
          ],
          'Dr. Sophia Martinez' => [
            'Monday: 10:00 AM - 4:00 PM',
            'Tuesday: 9:00 AM - 5:00 PM',
            'Thursday: 11:00 AM - 6:00 PM',
            'Friday: 9:00 AM - 2:00 PM',
          ],
          'Dr. Michael Thompson' => [
            'Monday: 8:00 AM - 4:00 PM',
            'Wednesday: 9:00 AM - 5:00 PM',
            'Thursday: 9:00 AM - 1:00 PM',
            'Friday: 10:00 AM - 4:00 PM',
          ],
          'Dr. Emily Carter' => [
            'Tuesday: 9:00 AM - 5:00 PM',
            'Wednesday: 9:00 AM - 5:00 PM',
            'Thursday: 10:00 AM - 4:00 PM',
            'Saturday: 9:00 AM - 1:00 PM',
          ],
          'Dr. Olivia Bennett' => [
            'Monday: 9:00 AM - 4:00 PM',
            'Tuesday: 10:00 AM - 5:00 PM',
            'Thursday: 9:00 AM - 3:00 PM',
            'Friday: 11:00 AM - 2:00 PM',
          ],
        ];

        $availability = $availabilityMap[$doctor->name] ?? [

          'Monday: 9:00 AM - 5:00 PM',
          'Wednesday: 9:00 AM - 5:00 PM',
          'Friday: 10:00 AM - 2:00 PM',
        ];
      @endphp

      <div class="text-center mb-5">
        <h1 class="fw-bold section-title mb-2">Doctor Profile</h1>

        <p class="text-muted mb-0">Learn more about your healthcare specialist.</p>
      </div>

      <div class="service-card mb-4">
        <div class="p-4 p-md-5">
          <div class="row align-items-center g-4">

            <div class="col-md-3 text-center text-md-start">
              <img src="{{ asset('images/doctors/' . $doctor->image) }}" alt="{{ $doctor->name }}"
                class="rounded-4 shadow-sm border" style="width:190px;height:190px;object-fit:cover;">
            </div>

            <div class="col-md-9">
              <h2 class="fw-bold mb-2">{{ $doctor->name }}</h2>


              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="badge bg-primary">
                  {{ $doctor->department->name ?? 'General' }}
                </span>

                @if(!empty($doctor->location))
                  <span class="text-muted">
                    <i class="bi bi-geo-alt me-1"></i>
                    
                    {{ $doctor->location }}
                  </span>
                @endif
              </div>

              <p class="fs-5 text-muted mb-0">
                {{ $experience }}
              </p>
            </div>

          </div>
        </div>
      </div>

      <div class="service-card mb-4">
        <div class="p-4 p-md-5">
          <h3 class="fw-bold mb-3">About</h3>
          <p class="text-muted mb-0" style="line-height:1.8;">
            {{ $about }}
          </p>
        </div>
      </div>

      <div class="service-card mb-4">
        <div class="p-4 p-md-5">
          <h3 class="fw-bold mb-3">Availability</h3>
          <p class="fw-semibold mb-3">Available Days</p>

          @foreach($availability as $day)
            <p class="text-muted mb-2">{{ $day }}</p>
          @endforeach
        </div>
      </div>

      <div class="d-flex gap-3">
        <a href="{{ url('/book-appointment') }}" class="btn btn-primary px-4">
          Book Appointment
        </a>

        <a href="{{ route('find-doctor') }}" class="btn btn-outline-primary px-4">
          Back to list
        </a>
      </div>

    </div>
  </section>

@endsection