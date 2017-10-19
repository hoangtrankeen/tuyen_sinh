<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Course;
use Session;
use Carbon\Carbon;

class CourseController extends Controller
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
        $course = Course::orderBy('id', 'desc')->paginate(8);
        return view('manage/courses/index')->withCourses($course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage/courses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // dd($request->exam_date);
        $user_id = Auth::id();

        // dd($user_id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'year' => 'required|integer',
            'exam_date' =>'required',

        ]);

        $exam_date = date('Y:m:d H:i:s',strtotime($request->exam_date));
        $course = New Course;
        $course->name = $request->name;
        $course->year = $request->year;
        $course->exam_date = $request->exam_date;
        $course->created_by = $user_id;
        if($course->save()){
          Session::flash('success', 'The user was successfully created!');
          return  redirect()->route('courses.index',$course->id);
        } else {
        return redirect()->route('courses.create');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('manage/courses/edit')->with('course',$course);
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
            'name' => 'required|max:255',
            'year' => 'required|integer',
            'exam_date' =>'required|date',

        ]);

        $course = Course::find($id);
        // dd($request->all());
        $exam_date = date('Y:m:d H:i:s',strtotime($request->exam_date));

        $course->name = $request->name;
        $course->year = $request->year;
        $course->exam_date = $exam_date;
        $course->created_by = $user_id;

        $course->save();
        if($course->save()){
          Session::flash('success', 'The user was successfully created!');
          return  redirect()->route('courses.index',$course->id);
      } else {
        return redirect()->route('courses.index');
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

        $course = Course::find($id);
        $course->delete();

        Session::flash('success', 'The course was successfully deleted!');
        return redirect()->route('courses.index');
    }
}
