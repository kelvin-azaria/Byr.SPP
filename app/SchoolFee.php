<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    public function Student(Builder $query)
    {
        return $this->belongsTo('App\Student');
    }
}
