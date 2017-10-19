<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
   	 public function student(){
   		return $this->hasOne('App\Student','id','student_id');
   }
    public function course(){
   		return $this->hasOne('App\Course','id','course_id');
   }
}