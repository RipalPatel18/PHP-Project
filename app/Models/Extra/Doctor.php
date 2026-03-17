<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //Databse
    protected $fillable = [
        
        'name',
        'specialty',
        'location',
        'image',
    ];
}