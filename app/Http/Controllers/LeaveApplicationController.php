<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
    public function index()
    {
    	$leaves = Leave::all();
    	return view('leaves_applications.index', compact('leaves'));
    }

    public function create(Leave $leave)
	{
		return view('leave-applications.create');
	}    	
    
	//public function store()
	//{
		//$appleave = new Leave;
		//$appleave->name= request()->name;
		//$appleave->
	//}
}
