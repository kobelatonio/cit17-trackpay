<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveCategory;
use App\Employee;
use App\DailyTimeRecord;
use App\LeaveApplication;
use App\AnnualLeave;
use Carbon\Carbon;

class AnnualLeavesController extends Controller
{
    public function index() {
    	$leaveCategories = LeaveCategory::get();
    	return view('leave_annual.index', compact('leaveCategories'));
    }

    public function filter() {
    	$employees = Employee::get();
		$leave_categories = LeaveCategory::get();
    	if(!$employees->isEmpty()) {
	    	foreach($employees as $employee) {
	    		$leavesSpentFromMinutesLate = 0;
	    		if(request()->name == 'sick') {
	    			// Get the sum of all minutes_late of an employee
	    			$totalMinutesLate = $employee->daily_time_records->sum('minutes_late');
	    			// Compute the amount that will be added to the leave_days_spent based on minutes_late
	    			$leavesSpentFromMinutesLate = round((0.125/60) * $totalMinutesLate, 3);
	    		}
				$leaveApplications = $employee->leave_applications()->where('leave_category_id', request()->leave_category_id)->get(); 
				// Get all leave applications of an employee
				$totalApprovedLeaves = 0;
				foreach($leaveApplications as $leaveApplication) {
					if($leaveApplication->status == "Approved") { // Get all approved leave applications
					// Get the sum of days from the approved leave applications
					// which will be added to the leave_days_spent
					$totalApprovedLeaves += Carbon::parse($leaveApplication->start_date)->diffInDays(Carbon::parse($leaveApplication->end_date));
					}
				}
				$leaveDaysSpent = $leavesSpentFromMinutesLate + $totalApprovedLeaves;
				// Get the annual leave days of a leave category
	    		$annualLeaveDays = LeaveCategory::find(request()->leave_category_id)->annual_leave_days;
	    		// Get the annual leave record of an employee based on the leave category from the request
				$annualLeaveOfEmployee = $employee->annual_leaves()->where('leave_category_id', request()->leave_category_id)->first(); 
				if($annualLeaveOfEmployee) { // If an annual leave record exists, update it
					$annualLeaveOfEmployee->update(['leave_days_spent' => $leaveDaysSpent, 'leave_days_left' => ($annualLeaveDays - $leaveDaysSpent)]);
				} else { // If there's no existing annual leave record, create a new one
					$annualLeaves = new AnnualLeave;
					$annualLeaves->employee_id = $employee->id;
					$annualLeaves->leave_category_id = request()->leave_category_id;
					$annualLeaves->leave_days_spent = $leaveDaysSpent;
					$annualLeaves->leave_days_left = $annualLeaveDays - $leaveDaysSpent;
					$annualLeaves->save();
				}
	    	}
	    	// Get all annual leave records based on the leave category from the request
			$annual_leaves = AnnualLeave::where('leave_category_id', request()->leave_category_id)
				->join('employees', 'employees.id', '=', 'annual_leaves.employee_id')
				->orderBy('employees.first_name', 'ASC')
				->paginate(10);
			return view('leave_annual.filter', compact('annual_leaves', 'leave_categories'));
	    } else {
			return back()->withErrors([
                'error' => 'An employee should be registered first.'
            ]);
		}
    }
}
