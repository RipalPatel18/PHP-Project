<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthRecordFactory extends Factory
{
    public function definition(): array
    {
        $patientId = User::where('role', 'patient')->inRandomOrder()->value('id');
        
        $doctorId = User::where('role', 'doctor')->inRandomOrder()->value('id');

        return [
            'patient_id' => $patientId,
            'doctor_id' => $doctorId,
            'record_type' => fake()->randomElement([

                'lab_report',
                'prescription',
                'x_ray',
                'other',
            ]),
            'record_date' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'diagnosis' => fake()->randomElement([

                'Routine blood test results',
                'Seasonal allergy treatment',
                'Mild knee inflammation',
                'Skin rash diagnosis',
                'Normal annual checkup',
                'Flu treatment follow-up',
                'Back pain assessment',
                'Blood pressure monitoring',

            ]),
            'details' => fake()->randomElement([

                'Patient advised to continue medication and follow up in two weeks.',
                'No major issues detected. Routine monitoring recommended.',
                'Prescription provided with dosage instructions.',
                'Further imaging suggested for detailed evaluation.',

                'Symptoms improving. Continue current care plan.',
            ]),
        ];
    }
}