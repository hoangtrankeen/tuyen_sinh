<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
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
        $tags = Tag::all();
        return view('manage/tags/index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user_id = Auth::id();
        $this->validate($request, array('name' => 'required|max:190'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->created_by = $user_id;
        $tag->save();

        Session::flash('success', 'New Tag was successfully created!');
        return  redirect()->route('tags.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view ('manage/tags/show')->withTag($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theTag = Tag::find($id);
        $tags = Tag::all();

        return view('manage/tags/edit')->withTags($tags)->with('theTag',$theTag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {   
        $user_id = Auth::id();
        $tag = Tag::find($id);
        $this->validate($request, array(
            'name'=> 'required|max:191'
        ));

        $tag->name = $request->name;
        $tag->created_by = $user_id;
        $tag->save();

        Session::flash('success', 'Successfully save your new tag!');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', 'Tag was deleted successfully');

        return redirect()->route('tags.index');
    }
}
