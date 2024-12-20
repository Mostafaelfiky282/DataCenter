<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function departments()
{
    return $this->hasMany(Department::class, 'college_id', 'id');
}

public function users(){
    return $this->hasMany(User::class, 'college_id', 'id');
}

    protected $fillable = ['name'];
}
