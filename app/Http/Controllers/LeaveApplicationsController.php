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
    	$leave_applications = LeaveApplication::orderBy('start_date', 'DESC')
                ->paginate(10);
    	return view('leave_applications.index', compact('employees', 'leave_categories', 'leave_applications'));
    }

    public function create()
    {
    	$leave_categories = LeaveCategory::get();
    	$employees = Employee::orderBy('first_name', 'ASC')->get();
    	if(!$leave_categories->isEmpty() && !$employees->isEmpty()) {
    		return view('leave_applications.create', compact('employees', 'leave_categories'));
    	} else {
    		return back()->withErrors([
                'error' => 'An employee or leave category has to be created first.'
            ]);
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
            'leave_category_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'reason_for_rejection' => 'nullable'
        ]);
        LeaveApplication::create($validated_fields);
    	return redirect('/leave_applications');
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
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'reason_for_rejection' => 'nullable'
        ]);
        $leave_application->update($validated_fields);
    	return redirect('/leave_applications');
    }

    public function delete(LeaveApplication $leave_application)
    {
    	$leave_application->delete();
    	return redirect('/leave_applications');
    }
}
