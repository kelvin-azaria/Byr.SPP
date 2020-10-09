<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function Teachers(Builder $query)
    {
        return $this->hasOne('App\Teacher');
    }

    public function Students(Builder $query)
    {
        return $this->hasMany('App\Student');
    }
}
