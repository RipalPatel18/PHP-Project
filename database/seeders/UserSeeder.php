<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@healthcareplus.com'],
            [
                'name' => 'Admin User',
                'phone' => '6470000001',
                'address' => 'Toronto, ON',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        // Doctors
        User::factory()->count(8)->create([
            'role' => 'doctor',
            'password' => Hash::make('password'),
        ]);

        // Patients
        User::factory()->count(20)->create([
            'role' => 'patient',
            'password' => Hash::make('password'),
        ]);
    }
}