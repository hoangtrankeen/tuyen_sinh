<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function course()
    {
        return $this->hasOne('App\Course');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
