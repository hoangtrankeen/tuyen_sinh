<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = ['name','parent_id'];

     public function students()
    {
        return $this->hasMany('App\Student');
    }

}
