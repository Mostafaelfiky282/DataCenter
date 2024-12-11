<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function college()
{
    return $this->belongsTo(College::class, 'college_id', 'id');
}

    protected $fillable = ['college_id','name'];
}
