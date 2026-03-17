<?php

namespace Database\Seeders;

use App\Models\HealthRecord;
use Illuminate\Database\Seeder;

class HealthRecordSeeder extends Seeder
{
    public function run(): void
    {
        HealthRecord::factory(25)->create();
    }
}