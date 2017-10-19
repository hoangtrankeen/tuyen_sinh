<?php

namespace App\Http\Controllers;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post; 
use App\Category;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        // dd(compact('categories','allCategories'));
        // return view('manage/categories/categoryTreeview',compact('categories','allCategories'));
        
        $posts = Post::orderBy('id','desc')->paginate(10);   
        return view('manage.posts.index',compact('categories','allCategories','posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all();
        $categories = Category::where('parent_id','=',0)->get();
        return view('manage/posts/create')->withCategories($categories)->withTags($tags);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                // rules, criteria
            'title'          => 'required|max:190',
            'sub_title'      => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'    => 'required|integer',
            'is_featured'    => 'required|integer',
            'body'           => 'required',
            'image'          => 'sometimes|image'
        ));

        $user_id = Auth::id();

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;
        $post->is_featured = $request->is_featured;
        $post->body = $request->body;
        $post->layout_id = $request->layout_id;
        $post->created_by =$user_id; 

        //save image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('\manage_image\posts/' .$filename);
            Image::make($image)->save($location);
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);
        
        Session::flash('success', 'The post was successfully save!');

        //redirect to another page
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // return view('posts.show')->with('post',$post);
        // return view('manage.posts.show'.$post->layout_id)->withPost($post);
        return view('manage.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id); 
        $categories = Category::where('parent_id','=',0)->get();
        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        //return the view and pass in the var we previously created
        return view('manage.posts.edit')->withPost($post)->withCategories($categories)->withTags($tags2);
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

        //validate the data before we use it 
       $this->validate($request, array(
                // rules, criteria
        'title' => 'required|max:255',
        'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug,'.$id,
        'category_id' => 'required|integer',
        'body'  => 'required',
        'image' => 'image'
    ));

       $user_id = Auth::id();
        // save the  data to the database
        $post = Post::find($id); // find an existing row by id and save on top of an existing row
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->is_featured = $request->is_featured;
        $post->body = $request->body;
        $post->layout_id = $request->layout_id;
        $post->created_by =$user_id; 

        if($request->hasFile('image')){
            // add the new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('\manage_image\posts/' .$filename);
            Image::make($image)->save($location);
            $oldFilename = $post->image;

            // update the database
            $post->image = $filename;

            //Delete the old one
            Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)){
           $post->tags()->sync($request->tags);
       } else {
        $post->tags()->sync(array());
    }

        //set flash data with success message
    Session::flash('success', 'This post was successfully saved');
        //redirect with flash data  to posts.show
    return redirect()->route('posts.edit', $post->id);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
