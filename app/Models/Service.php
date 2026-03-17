<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'duration_minutes', 'price', 'description'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}