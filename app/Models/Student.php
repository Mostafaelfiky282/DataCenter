<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'college',
        'year',
        'level',
        'department',
        'program',
        'language',
        'status',
        'nationality',
        'male_freshmen', 
        'female_freshmen', 
        'male_remain', 
        'female_remain'
    ];
}
