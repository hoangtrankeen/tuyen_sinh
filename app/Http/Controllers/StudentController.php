<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use Image;
use Session;
use Storage;
use App\Province;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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
     $students = Student::orderBy('id', 'desc')->paginate(8);
     return view('manage/students/index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $courses = Course::all();
        $provinces = Province::where('parent_id',1)->orderBy('name')->get();
        return view('manage/students/create')->withCourses($courses)->withProvinces($provinces);
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

            'name'           =>'required|max:50',
            'birth'          =>'required|date',
            'address'        =>'required|max:100',
            'email'          =>'required|email|unique:students,email',
            'phone'          =>'required',

            'province_id'   =>'sometimes|max:100',
            'identification' =>'sometimes',
            'ident_image'    =>'sometimes|image',
            'date_issue'     =>'sometimes',
            'place_issue'    =>'sometimes|max:100',
            'image'          =>'sometimes|image',
            'work_place_id'  =>'sometimes',
            'exam_place_id'  =>'sometimes',
            'practice_opt'   =>'sometimes',
            'payment_status' =>'sometimes',
            'expense'        =>'sometimes',
            'course_id'      =>'sometimes',

        ));   


        $user_id = Auth::id();
        $dateissue = date('Y:m:d',strtotime($request->date_issue));
        $birth = date('Y:m:d',strtotime($request->birth));


        $student = new Student;
        $student->name = $request->name;
        $student->birth = $birth;
        $student->address = $request->address;
        $student->province_id = $request->province_id;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->identification = $request->identification;
        //ident_image
        $student->date_issue = $dateissue;
        $student->place_issue = $request->place_issue;
        //image
        $student->work_place_id = $request->work_place_id;
        $student->exam_place_id = $request->exam_place_id;
        $student->practice_opt = $request->practice_opt;
        $student->payment_status = $request->payment_status;
        $student->expense = $request->expense;
        $student->course_id = $request->course_id;
        $student->created_by =$user_id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('\manage_image\profile/' .$filename);
            Image::make($image)->save($location);

            $student->image = $filename;
        }

        if($request->hasFile('ident_image')){
            $imageb = $request->file('ident_image');
            $filenameb = time() . '.' . $imageb->getClientOriginalExtension();
            $locationb = public_path('\manage_image\identify/' .$filenameb);
            Image::make($imageb)->save($locationb);

            $student->ident_image = $filenameb;
        }

        $student->save();

        return redirect()->route('students.index');
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

        $courses = Course::all();
        $student =  Student::find($id);
        $provinces = Province::where('parent_id',1)->orderBy('name')->get();
        return view('manage/students/edit')->withStudent($student)->withCourses($courses)->withProvinces($provinces);
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

      $this->validate($request, array(

        'name'           =>'required|max:50',
        'birth'          =>'required',
        'address'        =>'required|max:100',
        'email'          =>'required|email|unique:students,email,'.$id,
        'phone'          =>'required',

        'province_id'   =>'sometimes|max:100',
        'identification' =>'sometimes',
        'ident_image'    =>'sometimes|image',
        'date_issue'     =>'sometimes',
        'place_issue'    =>'sometimes|max:100',
        'image'          =>'sometimes|image',
        'work_place_id'  =>'sometimes',
        'exam_place_id'  =>'sometimes',
        'practice_opt'   =>'sometimes',
        'payment_status' =>'sometimes',
        'expense'        =>'sometimes',
        'course_id'      =>'sometimes',
    ));   

      $user_id = Auth::id();
      $dateissue = date('Y:m:d',strtotime($request->date_issue));
      $birth = date('Y:m:d',strtotime($request->birth));

      $student =  Student::find($id);
      $student->name = $request->name;
      $student->birth = $birth;
      $student->address = $request->address;
      $student->province_id = $request->province_id;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $student->identification = $request->identification;
        //ident_image
      $student->date_issue = $dateissue;
      $student->place_issue = $request->place_issue;
        //image
      $student->work_place_id = $request->work_place_id;
      $student->exam_place_id = $request->exam_place_id;
      $student->practice_opt = $request->practice_opt;
      $student->payment_status = $request->payment_status;
      $student->expense = $request->expense;
      $student->course_id = $request->course_id;
      $student->created_by =$user_id;

      if($request->hasFile('image')){
            // add the new photo
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('\manage_image\profile/' .$filename);
        Image::make($image)->save($location);
        $oldFilename = $student->image;

            // update the database
        $student->image = $filename;

            //Delete the old one
        Storage::delete($oldFilename);
    }

    if($request->hasFile('ident_image')){
            // add the new photo
        $imageb = $request->file('ident_image');
        $filenameb = time() . '.' . $imageb->getClientOriginalExtension();
        $locationb = public_path('\manage_image\identify/' .$filenameb);
        Image::make($imageb)->save($locationb);
        $oldFilenameb = $student->ident_image;

            // update the database
        $student->ident_image = $filenameb;

            //Delete the old one
        Storage::delete($oldFilenameb);
    }
    $student->save();

    return redirect()->route('students.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        Session::flash('success', 'The course was successfully deleted!');
        return redirect()->route('students.index');
    }
}
