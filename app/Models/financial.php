<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class financial extends Model
{
    protected $fillable = [
        'college',
        'type',
        'Male_students_amount',
        'female_students_amount',
        'price',
        'year'
    ];
}
