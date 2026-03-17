<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function doctors()
    {
        return $this->hasMany(User::class)->where('role', 'doctor');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}