<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Certificate;
use Image;
use Session;
use Storage;
use App\Province;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{   

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $courses = Course::all();
        $students = Student::all();

        return view('manage/certificates/create')->withCourses($courses)->withStudents($students);
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
            'course_id'     => 'required',
            'student_id' => 'required',
            'multi_choice' => 'required',
            'practice'  => 'required',
            'cer_code'   => 'required|unique:certificates',
            'issue_code'  => 'required|unique:certificates',
            'date_issue'   => 'required|date',
          

          ]);
        $dateissue = date('Y:m:d',strtotime($request->date_issue));
        $certificate = new Certificate;


        $certificate->course_id = $request->course_id;
        $certificate->student_id = $request->student_id;
        $certificate->practice = $request->practice;
        $certificate->multi_choice = $request->multi_choice;
        $certificate->cer_code = $request->cer_code;
        $certificate->issue_code = $request->issue_code;
        $certificate->date_issue = $dateissue;
        $certificate->status = $request->status;
        $certificate->created_by = $user_id;

        $certificate->save();

        Session::flash('success', 'The certificate was successfully created!');
        return  redirect()->route('certificates.create');

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

        $certificate = Certificate::find($id);

        $courses = Course::all();
        $students = Student::all();

        return view('manage/certificates/edit', compact('certificate','courses','students'));
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
            'course_id'     => 'required',
            'student_id' => 'required',
            'multi_choice' => 'required',
            'practice'  => 'required',
            'cer_code'   => 'required|unique:certificates,cer_code,'.$id,
            'issue_code'  => 'required|unique:certificates,issue_code,'.$id,
            'date_issue'   => 'required|date',
          

          ]);
        $dateissue = date('Y:m:d',strtotime($request->date_issue));
        $certificate =  Certificate::find($id);

        $certificate->course_id = $request->course_id;
        $certificate->student_id = $request->student_id;
        $certificate->practice = $request->practice;
        $certificate->multi_choice = $request->multi_choice;
        $certificate->cer_code = $request->cer_code;
        $certificate->issue_code = $request->issue_code;
        $certificate->date_issue = $dateissue;
        $certificate->status = $request->status;
        $certificate->created_by = $user_id;

        $certificate->save();

        Session::flash('success', 'The certificate was successfully updated!');
        return  redirect()->route('certificates.edit',$certificate->id);
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
