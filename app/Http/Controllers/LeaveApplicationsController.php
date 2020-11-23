<?php

namespace App\Http\Controllers;

use App\LeaveApplication;
use App\LeaveCategory;
use App\Employee;
use Illuminate\Http\Request;

class LeaveApplicationsController extends Controller
{
    public function index()
    {
    	$leave_applications = LeaveApplication::get();
    	$leave_categories = LeaveCategory::get();
    	$employees = Employee::get();
    	return view('leave_applications.index', compact('employees', 'leave_categories', 'leave_applications'));
    }

    public function create()
    {
    	$leave_categories = LeaveCategory::get();
    	$employees = Employee::get();
    	if(!$leave_categories->isEmpty() && !$employees->isEmpty()) {
    		return view('leave_applications.create', compact('employees', 'leave_categories'));
    	} else {
    		return redirect('/admin/leave_applications')->with('alert', "Create an employee or leave category first!");
    	}
    }

    public function show(LeaveApplication $leave_application)
    {    	
        $leave_categories = LeaveCategory::get();
    	$employees = Employee::get();
    	return view('leave_applications.show', compact('employees', 'leave_categories', 'leave_application'));
    }

    public function store()
    {
     $validated_fields = request()->validate([
            'employee_id' => 'required',
            'leave_category_id' =>'required',
            'start_date'=> 'required',
            'end date' => 'required',
            'status'=> 'required',
            'reason_for_rejection' => 'required'

        ]);
        $leave_application->create($validated_fields);
    	return redirect('/admin/leave_applications');
    }

    public function edit(LeaveApplication $leave_application)
    {
        $leave_categories = LeaveCategory::get();
        $employees = Employee::get();
    	return view('leave_applications.edit', compact('employees', 'leave_categories', 'leave_application'));
    }

    public function update(LeaveApplication $leave_application)
    {
        $validated_fields = request()->validate([
            'employee_id' => 'required',
            'leave_category_id' =>'required',
            'start_date'=> 'required',
            'end date' => 'required',
            'status'=> 'required',
            'reason_for_rejection' => 'required'
        ]);

        $leave_application->update($validated_fields);
    	return redirect('/admin/leave_applications');
    }

    public function delete(LeaveApplication $leave_application)
    {
    	$leave_application->delete();
    	return redirect('/admin/leave_applications');
    }
}
