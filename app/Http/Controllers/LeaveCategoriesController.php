<?php

namespace App\Http\Controllers;
use App\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCategoriesController extends Controller
{
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
