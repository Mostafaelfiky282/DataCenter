<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_Activity extends Model
{
    protected $fillable = [
        'college',
        'type',
        'male_student_amount',
        'female_student_amount',
        'price'
    ];
}
