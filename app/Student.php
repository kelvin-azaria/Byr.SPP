<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function schoolFees()
    {
        return $this->hasMany('App\SchoolFees');
    }

    public function academicYear()
    {
        return $this->hasMany('App\AcademicYear');
    }
}
