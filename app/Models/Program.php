<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function college(){
        return $this->belongsTo(college::class);
    }
    protected $fillable = [
        'college_id',
        'department_id',
        'name'
    ];
}
