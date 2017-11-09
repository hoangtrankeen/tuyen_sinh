<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;

class RouteController extends Controller
{	

	public function geturl()
	{	
		return view('frontend/posts/post');
	} 
	
	public function getSlug($slug)
	{	
		$menu = Menu::where('slug',$slug)->first();

		if($menu->post_id != null){
			
			$posts = Post::where('id',$menu->post_id)->get();
			return view('frontend/posts/form',compact('posts'));
		}
		elseif ($menu->category_id != null) {
			
			$posts = Post::where('category_id',$menu->category_id)->get();
			return view('frontend/posts/form',compact('posts'));
		}
		elseif ($menu->url != null) {
			
			return redirect()->route($menu->url);
		}
	}
		
	
}
