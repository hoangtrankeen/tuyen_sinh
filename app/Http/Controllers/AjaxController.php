<?php

namespace App\Http\Controllers;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post; 
use App\Menu;
use App\Category;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function __construct() {
      $this->middleware(['auth', 'clearance']);
    }
    
    public function searchPost(Request $request){

        if ($request->ajax())
        {
            
            $posts = Post::where('title', 'like', '%' . $request->search . '%')->select('title as text', 'id')->get();
            // $returnHtml = view('manage/menus/search_post')->withPosts($posts)->render();

            // return response()->json(array('success'=>true, 'html'=>$returnHtml));
             return response()->json($posts);

             // dd($posts);
        }

    }
    public function bindMenu(Request $data){

    	if($data->parent_id !== null){
    		$menu = Menu::select('name', 'id')->where('id',$data->parent_id)->first();

            $parents = Menu::find($data->parent_id);

            $total= Menu::where('parent_id','=',$parents->parent_id)->count();
            // dd($total); 
    		return response()->json(array('menu'=>$menu, 'total'=>$total));
    	}
    	

    }

}
