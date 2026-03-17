<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory

{
    public function definition(): array

    {
        static $departments = [

            'Cardiology',
            'Pediatrics',
            'Orthopedics',
            'Dermatology',
            'Neurology',
            'Radiology',
            'General Medicine',
            'ENT',
            'Oncology',
            'Gastroenterology',

        ];

        return [
            'name' => fake()->unique()->randomElement($departments),

            'description' => fake()->randomElement([

                'Specialized care for diagnosis and treatment.',
                'Comprehensive medical services for patients.',
                'Expert consultation and patient-centered treatment.',
                'Advanced care with experienced specialists.',
                'Clinical support for routine and complex cases.',

            ]),
            
        ];

    }
}