<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable =[
        'college',
        'nationality',
        'program',
        'level_zero',
        'level_one',
        'level_two',
        'level_three',
        'level_four',
        'level_five',
        'level_six'
    ];
}
