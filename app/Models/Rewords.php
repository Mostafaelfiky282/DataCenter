<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rewords extends Model
{
    protected $fillable = [
        'college',
        'level',
        'type',
        'male_students_amount',
        'female_students_amount',
        'price'
    ];
}
