<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function Classroom(Builder $query)
    {
        return $this->belongsTo('App\Classroom');
    }

    public function SchoolFees(Builder $query)
    {
        return $this->hasMany('App\SchoolFees');
    }

    public function AcademicYear(Builder $query)
    {
        return $this->hasMany('App\AcademicYear');
    }
}
