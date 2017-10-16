<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{	
	public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    
    public function index()
    {
    	return view('manage.main');
    } 

    public function denypage()
    {
    	return view('manage.deny');
    } 
}
