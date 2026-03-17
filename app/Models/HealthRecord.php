<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    //databse
        protected $fillable = [
        'user_id',
        'record_type',
        'doctor',
        'record_date',
        'notes',
        'file',
    ];

    public function patient()

    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        
        return $this->belongsTo(User::class, 'doctor_id');
    }
}