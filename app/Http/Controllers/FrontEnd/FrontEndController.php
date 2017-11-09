<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Menu;
use App\Tag;
use App\Post; 
use App\Category;
use App\Slider;
use App\Section;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {	
        $data=[''];
    	$data['slides'] = Slider::where('status',1)->get();
    	$data['parents'] = Menu::where('parent_id',0)->orderBy('order','asc')->get();

        //Section 1
        $data['section1'] = Section::where('position','1')->first();

        $cate_ids_1 =  $data['section1']->cate_id;
    
        $data['cates_1'] = Category::where('id',json_decode($cate_ids_1))->get();

        $data['post_1'] = Post::whereIn('category_id',json_decode($cate_ids_1))->orderBy('created_at','desc')->first();

        $data['posts_1'] = Post::whereIn('category_id',json_decode($cate_ids_1))
                                ->orderBy('created_at','desc')
                                ->skip(1)
                                ->take($data['section1']->num_links)
                                ->get();

        $data['section2'] = Section::where('position','2')->first();

        $data['cates_2'] = Category::where('id', json_decode($data['section2']->cate_id))->first();

        $data['posts_2'] = Post::whereIn('category_id',$data['cates_2'])->orderBy('id','desc')->get();
        // dd($data['posts_2']);



        $data['section3'] = Section::where('position','3')->first();
    	$data['section4'] = Section::where('position','4')->first();

         
    	// $cate = [];
    	// foreach($data['sections']  as $sec){
    	// 	array_push($cate,json_decode($sec->cate_id));
    	// }


    	// $post1 = Category::whereIn('id',$cate[0])->get();

    	// dd($post1[0]->posts);
    	// $data['sections'] = Section::all();

        //Slider

        $data['sliders'] = Slider::all();
    	return view('frontend/content/home',$data);
    } 
}
