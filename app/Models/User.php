<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password',
        'role', 'phone', 'address',
        'department_id', 'location', 'image',
=======
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'department_id',
        'location',
        'image',
>>>>>>> c6e839e (add files)
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
<<<<<<< HEAD
        'password'          => 'hashed',
=======
        'password' => 'hashed',
>>>>>>> c6e839e (add files)
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function availabilities()
    {
        return $this->hasMany(DoctorAvailability::class, 'doctor_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

<<<<<<< HEAD
    /** Resolve profile image URL with a fallback avatar */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/doctors/' . $this->image);
        }

        $seed = urlencode($this->name);
        return "https://ui-avatars.com/api/?name={$seed}&background=0d6efd&color=fff&size=200";
    }
=======




>>>>>>> c6e839e (add files)
}