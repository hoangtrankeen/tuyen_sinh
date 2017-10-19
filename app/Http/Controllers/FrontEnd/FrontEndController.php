<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Menu;
use App\Tag;
use App\Post; 
use App\Category;
use App\Slider;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {	
    	$slides = Slider::where('status',1)->get();
    	$parents = Menu::where('parent_id',0)->orderBy('order','asc')->get();
    	return view('frontend/main',compact('parents', 'slides'));
    } 
}
