<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function Classroom(Builder $query)
    {
        return $this->belongsTo('App\Classroom');
    }
}
