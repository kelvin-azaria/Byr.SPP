<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
  public function students()
  {
    return $this->hasMany('App\Student');
  }
}
