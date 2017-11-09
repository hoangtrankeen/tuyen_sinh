<?php

namespace App\Http\Controllers;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post; 
use App\Category;
use App\Menu;
use App\Section;
use Session;
use Image;
use Storage;

use Illuminate\Support\Facades\Auth;


class SectionController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

      $data = [];  
      $data['categories'] = Category::all();
      $data['sections'] = Section::orderBy('position','asc')->get();
      $data['positions'] = Section::orderBy('position','asc')->pluck('position');
      return view('manage/sections/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->cate_id2);   
        // dd(json_encode($request->input('cate_id1')),true);   
        $sections = Section::all();      
        foreach($sections as $section){
            $id = $section->id;
            $section  = Section::find($id);
            $section->title =$request->input('title'.$id);
            $section->description = $request->input('description'.$id);
            $cates = json_encode($request->input('cate_id'.$id),true);
            $section->cate_id = $cates;
            $section->num_links =$request->input('num_links'.$id);
            $section->limit = $request->input('limit'.$id);

            $section->save();



        } 

        return redirect()->route('sections.index');
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
