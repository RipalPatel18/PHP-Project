<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $services = [

            'General Consultation',
            'Heart Checkup',
            'Cardiac Screening',
            'Child Wellness Visit',
            'Skin Treatment',
            'X-Ray Imaging',
            'MRI Scan',
            'Blood Test',
            'Physical Therapy',
            'Dental Cleaning',
            'Vaccination',
            'Health Screening',

        ];

        return [
            'department_id' => Department::inRandomOrder()->value('id') ?? Department::factory(),

            'name' => fake()->randomElement($services),
            'duration_minutes' => fake()->randomElement([15, 30, 45, 60, 90, 120]),
            'price' => fake()->randomElement([50, 75, 100, 120, 150, 200, 300, 500]),

            'description' => fake()->randomElement([
                'Professional care provided by experienced healthcare staff.',
                'Routine service for diagnosis, treatment, and follow-up.',
                'Patient-focused care with modern medical support.',
                'Quality consultation and treatment for better health outcomes.',
                'Essential service designed to support patient wellness.',
            ]),

        ];
    }
    
}