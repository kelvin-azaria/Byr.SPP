<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function classroom()
    {
        return $this->hasMany('App\Classroom');
    }
}
