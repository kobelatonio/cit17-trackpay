<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> aa5c42a2b066680a5300f586a5ca2d372e46cbe5
use App\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCategoriesController extends Controller
{
<<<<<<< HEAD
    //Index
      public function index(){  

      	$leaveCategories = LeaveCategory::all();
      	return view('leave-categories.index',compact('leaveCategories'));
        	
       }
      public function show(LeaveCategory $id){

            
      		return view('leave-categories.show',compact('id'));
  
       }
      public function create(){

           	return view('leave-categories.create');
       }
      public function store(){

         	$lecat = new LeaveCategory;
         	$lecat->name = request()->name;
         	$lecat->annual_leave_days=request()->annual_leavedays;
         	$lecat->save();
         	return redirect('/admin/leaves-categories');

       }
      public function edit (LeaveCategory $id){
           	return view('leave-categories.edit',compact('id'));
          }
       
      public function update (LeaveCategory $id){

          $id->update([
                'name'=> request()->name,
                'annual_leave_days'=> request()->annual_leavedays
          ]);
        return redirect('/admin/leaves-categories');
  	   
       }
      public function delete(LeaveCategory $id){

        $id->delete();
        return redirect('/admin/leaves-categories');
      }
       
    	
       
    
    
}
=======
    public function index()
    {
        $leave_categories = LeaveCategory::get();
        return view('leave_categories.index', compact('leave_categories'));
    }

    public function create()
    {
        return view('leave_categories.create');
    }

    public function show(LeaveCategory $leave_category)
    {
        return view('leave_categories.show', compact('leave_category'));
    }

    public function store()
    {
        $leave_category = new LeaveCategory;
        $leave_category->name = request()->name;
        $leave_category->annual_leave_days = request()->annual_leave_days;
        $leave_category->save();
        return redirect('/admin/leave_categories');
    }

    public function edit(LeaveCategory $leave_category)
    {
        return view('leave_categories.edit', compact('leave_category'));
    }

    public function update(LeaveCategory $leave_category)
    {
        $leave_category->name = request()->name;
        $leave_category->annual_leave_days = request()->annual_leave_days;
        $leave_category->save();
        return redirect('/admin/leave_categories');
    }

    public function delete(LeaveCategory $leave_category)
    {
        $leave_category->delete();
        return redirect('/admin/leave_categories');
    }
}
>>>>>>> aa5c42a2b066680a5300f586a5ca2d372e46cbe5
