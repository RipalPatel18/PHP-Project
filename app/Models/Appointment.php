<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'email',
        'doctor',
        'department',
        'appointment_date',
        'time_slot',
        'phone',
        'notes',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}