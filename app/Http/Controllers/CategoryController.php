<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller 
{
    public function __construct() {
      $this->middleware(['auth', 'clearance']);
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

      public function index()
      {
        $categories = Category::where('parent_id', '=', 0)->paginate(3);
        $allCategories = Category::pluck('name','id')->all();
        // dd(compact('categories','allCategories'));
        return view('manage/categories/index',compact('categories','allCategories'));

      }


      public function create()
      { 
        
        $categories = Category::where('parent_id', '=', 0)->paginate(3);

        // dd(compact('categories','allCategories'));
        return view('manage/categories/create')->withCategories($categories);
      }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      $user_id = Auth::id();
      $this->validate($request, [
        'name' => 'required',
      ]);
        // $input = $request->all();


      $category = new Category;

      $category->name = $request->name;
      $category->parent_id = $request->parent_id;
      $category->created_by = $user_id;

      $category->save();

      if($category->save()){
        Session::flash('success', 'The category was successfully created!');
        return  redirect()->route('categories.index');
      } else {
        return redirect()->route('categories.index');
      }
    }

    public function edit($id)
    {
      $thiscat = Category::find($id);
      $categories = Category::where('parent_id', '=', 0)->where('id','!=',$thiscat->id)->get();

      return view('manage/categories/edit')->withThiscat($thiscat)->withCategories($categories);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());

      $category = Category::find($id);

      $user_id = Auth::id();

      $this->validate($request, [
        'name' => 'required',
        'parent_id' => 'required'
      ]);

      $category->name = $request->name;
      $category->parent_id = $request->parent_id;
      $category->created_by = $user_id;

      $category->save();

      if($category->save()){

        Session::flash('success', 'The category was successfully changed!');
        return  redirect()->route('categories.index');
      } 
    }

    public function destroy($id)
    {   
        $category = Category::find($id);
        $category->delete();
        $category->childs()->delete();
        Session::flash('success', 'The category was successfully deleted!');
        return redirect()->route('categories.index');
    }


}
