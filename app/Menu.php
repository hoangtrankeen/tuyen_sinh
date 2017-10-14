<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{	

   protected $table = 'menus';

   protected $fillable = ['name','url','post_id'];

   public function childs(){
   		return $this->hasMany('App\Menu','parent_id','id')->orderBy('order','asc');
   }
   public function parent(){
   		return $this->belongsTo('App\Menu','parent_id','id');
   }
   public function category(){
   		return $this->hasOne('App\Category','id','category_id');
   }
   public function post(){
   		return $this->hasOne('App\Post','id','post_id');
   }

}
