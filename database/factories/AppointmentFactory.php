<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        $patientId = User::where('role', 'patient')->inRandomOrder()->value('id');

        $doctorId = User::where('role', 'doctor')->inRandomOrder()->value('id');

        return [
            'patient_id' => $patientId,

            'doctor_id' => $doctorId,
            'department_id' => Department::inRandomOrder()->value('id'),

            'appointment_date' => fake()->dateTimeBetween('-1 month', '+2 months')->format('Y-m-d'),
            'appointment_time' => fake()->randomElement([
                '09:00:00',
                '10:00:00',
                '10:30:00',
                '11:00:00',
                '01:00:00',
                '02:00:00',
                '03:30:00',
                '04:00:00',
                
            ]),

            'status' => fake()->randomElement(['upcoming', 'completed', 'cancelled']),

            'notes' => fake()->randomElement([
                'Routine checkup',
                'Follow-up consultation',

                'Skin allergy symptoms',
                'Knee pain assessment',
                'Annual health review',
                'Prescription renewal',
                'Child fever consultation',
                'Heart screening appointment',

            ]),
        ];

    }
}
