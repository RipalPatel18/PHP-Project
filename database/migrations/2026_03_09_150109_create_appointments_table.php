<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void

    {
        Schema::create('appointments', function (Blueprint $table) {

            $table->id();
            $table->string('patient_name');
            $table->string('email');
            $table->string('doctor');
            $table->date('appointment_date');
            $table->string('time_slot');
            $table->string('phone');
            $table->text('notes')->nullable();
            
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');

    }
};