<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void

    {
        $departments = [
            ['name' => 'Cardiology', 'description' => 'Heart and cardiovascular care'],
            ['name' => 'Pediatrics', 'description' => 'Healthcare for children'],
            ['name' => 'Orthopedics', 'description' => 'Bone and joint treatment'],
            ['name' => 'Dermatology', 'description' => 'Skin care and treatment'],
            ['name' => 'Neurology', 'description' => 'Brain and nervous system care'],
            ['name' => 'General Medicine', 'description' => 'General health consultation'],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                
                ['name' => $department['name']],
                ['description' => $department['description']]
            );
        }
    }
}