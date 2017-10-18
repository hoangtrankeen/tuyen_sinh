<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return view('welcome');
});

// Route::get('/form', function () {
// 	return view('auth/register2');
// });


Auth::routes();

// Route::prefix('dashboard')->middleware('role:superadministrator|administrator|editor|author|contributor|supporter|subscriber')->group(function(){
Route::prefix('dashboard')->group(function(){
	Route::get('/', 'ManageController@index');

	Route::get('/deny','ManageController@denypage');

	Route::resource('/users', 'UserController');
	
	Route::resource('roles', 'RoleController');

	Route::resource('permissions', 'PermissionController');
	//Certficate
	Route::resource('/certificates', 'CertificateController'); 

	//
	Route::post('/getStudent', 'AjaxController@getStudent');

	//


	//Course
	Route::resource('/courses', 'CourseController'); 
	//Students
	Route::resource('/students', 'StudentController');


	//Menus
	Route::resource('/menus', 'MenuController');
	//Search post 
	Route::get('/searchpost','AjaxController@searchPost');
	//bindmenu
	Route::get('/bindmenu','AjaxController@bindMenu');
	//Categories
	Route::resource('categories','CategoryController');
	// Route::post('add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory']);

	//Tags
	Route::resource('tags', 'TagController', array('except'=>['create']));
	//Posts
	Route::resource('posts','PostController');

	// Return all posts that related to a Category
	Route::get('postscat/{cat_id}','PostController@showPostsCat')->name('manage.postscat');


});	


