<?php

namespace App\Http\Controllers;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post; 
use App\Menu;
use App\Category;
use App\Student;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Auth;


class AjaxController extends Controller
{   

    public function __construct( Request $request) {
      $this->middleware(['auth', 'clearance']);
      $this->request = $request;
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

    public function getStudent(Request $request){

        if ($request->ajax()){

            
            $html = [];
            $i = 0;
            $students = Student::where('course_id',$request->course_id)->get();
            foreach($students as $student){

                $html[$i++] = '<option value='.$student->id.'>'.$student->name.'</option>';

            }
            return response()->json(array('students'=>$html));
        }
        
    }
    public function getStudentMail(){
        // dd($this->request->course_id);
        if($this->request->course == 'all'){
            $students = Student::all();
        }else
        {
           $course_id = $this->request->course;
           $students = Student::where('course_id',$course_id)->get();
        }    
        $html = view('manage/mailer/bindingemail')->withStudents($students)->render();
        return   response()->json(['html'=>$html]);
    }

}
