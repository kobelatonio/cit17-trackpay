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
    	$leave_application = new LeaveApplication;
    	$leave_application->employee_id = request()->employee_id;
    	$leave_application->leave_category_id = request()->leave_category_id;
    	$leave_application->start_date = request()->start_date;
    	$leave_application->end_date = request()->end_date;
    	$leave_application->status = request()->status;
    	$leave_application->reason_for_rejection = request()->reason_for_rejection;
    	$leave_application->save();
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
        $leave_application->employee_id = request()->employee_id;
        $leave_application->leave_category_id = request()->leave_category_id;
        $leave_application->start_date = request()->start_date;
        $leave_application->end_date = request()->end_date;
        $leave_application->status = request()->status;
        $leave_application->reason_for_rejection = request()->reason_for_rejection;
        $leave_application->save();
    	return redirect('/admin/leave_applications');
    }

    public function delete(LeaveApplication $leave_application)
    {
    	$leave_application->delete();
    	return redirect('/admin/leave_applications');
    }
}
