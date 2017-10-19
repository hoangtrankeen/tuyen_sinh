<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Slider;
use Image;
use Session;
use Storage;
class SliderController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $posts = Post::all();
        return view('manage/slider/create')->withPosts($posts);
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

            'title'     => 'required|max:150',
            'description' => 'sometimes|max:150',
            'slug'      =>  'required',
            'image'     => 'required|image',
            'post_id'   =>'sometimes|integer',
            'url'       => 'sometimes|max:50|min:3',
            'status'    => 'required|integer',
            'order'     => 'required|integer'

        ]);

        $slide = New Slider;

        $slide->title = $request->title; 
        $slide->description = $request->description; 
        $slide->slug = $request->slug; 
        $slide->post_id = $request->post_id; 
        $slide->url = $request->url; 
        $slide->status = $request->status; 
        $slide->order = $request->order; 
        $slide->created_by = $user_id; 

        //save image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('\manage_image\slider/' .$filename);
            Image::make($image)->save($location);
            $slide->image = $filename;
        }

        $slide->save();

        if($slide->save()){
            Session::flash('success', 'The slide was successfully created!');
            return  redirect()->route('slider.create');
        }

        return redirect('slider.create')->withInput();

       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
