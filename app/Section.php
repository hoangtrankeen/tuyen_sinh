<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    public function categories(){
    	return $this->hasMany('App\Category','cate_id');
    }
}
