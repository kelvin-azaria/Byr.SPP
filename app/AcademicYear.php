<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
  public function Students(Builder $query)
  {
    return $this->hasMany('App\Student');
  }
}
