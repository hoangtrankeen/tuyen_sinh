<?php

namespace App\Http\Controllers;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post; 
use App\Category;
use App\Menu;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{   

    public function __construct() {
      $this->middleware(['auth', 'clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $parents = Menu::where('parent_id',0)->orderBy('order','asc')->paginate(5);

        return view('manage/menus/index')->withParents($parents);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $parents = Menu::where('parent_id','=','0')->orderBy('order','asc')->get();

        $categories = Category::where('parent_id','=', 0)->get();

        $posts = Post::all();

        return view('manage/menus/create',compact('categories', 'posts', 'parents'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

       $user_id = Auth::id();

       $this->validate($request, [
        'name'        => 'required|max:255',
            // 'category_id' => 'sometimes|integer',

        'url'         => 'sometimes|max:50',
        'parent_id'   => 'required|integer',          
        'order'       => 'required|integer',
    ]);

       $menu  = new Menu;
       $menu->name = $request->name;
       $menu->category_id = $request->category_id;
       $menu->post_id = $request->post_id;
       $menu->url = $request->url;
       $menu->status = $request->status;
       $menu->slug = $request->slug;
       $menu->parent_id = $request->parent_id;
       $menu->order = $request->order;
       $menu->created_by = $user_id;

       $menu->save();
       if($menu->save()){
          Session::flash('success', 'The menu was successfully created!');
          return  redirect()->route('menus.index');
      } else {
        return redirect()->route('menus.create');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $thismenu = Menu::find($id);
     $parents = Menu::where('parent_id', '=', 0)->where('id','!=',$thismenu->id)->get();
     $categories = Category::where('parent_id', '=', 0)->get();
     $posts = Post::all();
     // dd($thismenu);
     return view('manage/menus/edit',compact('thismenu', 'parents', 'categories', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       $user_id = Auth::id();

            $this->validate($request, [
            'name'        => 'required|max:255',
                // 'category_id' => 'sometimes|integer',

            'url'         => 'sometimes|max:50',
            'parent_id'   => 'required|integer',          
            'order'       => 'required|integer',
        ]);

            $menu  = Menu::find($id);
            $menu->name = $request->name;
            $menu->category_id = $request->category_id;
            $menu->post_id = $request->post_id;
            $menu->url = $request->url;
            $menu->parent_id = $request->parent_id;
            $menu->order = $request->order;
            $menu->created_by = $user_id;

            $menu->save();
            
            if($menu->save()){
              Session::flash('success', 'The menu was successfully updated!');
              return  redirect()->route('menus.index');
          } else {
            return redirect()->route('menus.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        $menu->childs()->delete();
        Session::flash('success', 'The menu was successfully deleted!');
        return redirect()->route('menus.index');
    }

}
