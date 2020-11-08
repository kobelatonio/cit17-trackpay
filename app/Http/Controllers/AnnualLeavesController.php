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
    	return view('leaves-annual.index', compact('leaveCategories'));
    }

    public function storeOrUpdate() {
    	$employees = Employee::get();
    	foreach($employees as $employee) {
    		$leavesSpentFromMinutesLate = 0;
    		if(request()->name == 'sick') {
    			$totalMinutesLate = DailyTimeRecord::where(['employee_id' => $employee->id])
    			->sum('minutes_late');
    			$leavesSpentFromMinutesLate = round((0.125/60) * $totalMinutesLate, 3);
    			// This computation is from the Civil Service Commission Philippines
    		}
			$leaveApplications = LeaveApplication::where(['employee_id' => $employee->id, 'leave_category_id' => LeaveCategory::where(['name' => request()->name])->first()->id])->get();
			$totalApprovedLeaves = 0;
			foreach($leaveApplications as $leaveApplication) {
				if($leaveApplication->status == "approved") {
				$totalApprovedLeaves += Carbon::parse($leaveApplication->start_date)->diffInDays(Carbon::parse($leaveApplication->end_date));
				}
			}
			$leaveDaysSpent = $leavesSpentFromMinutesLate + $totalApprovedLeaves;
    		$annualLeaveDays = LeaveCategory::where(['name' => request()->name])->select('annual_leave_days')->first()->annual_leave_days;
			$annualLeaveOfEmployee = AnnualLeave::where(['employee_id' => $employee->id, 'leave_category_id' => LeaveCategory::where(['name' => request()->name])->first()->id])->first();
			if($annualLeaveOfEmployee) {
				$annualLeaveOfEmployee->update(['leave_days_spent' => $leaveDaysSpent, 'leave_days_left' => ($annualLeaveDays - $leaveDaysSpent)]);
			} else {
				$annualLeaves = new AnnualLeave;
				$annualLeaves->employee_id = $employee->id;
				$annualLeaves->leave_category_id = LeaveCategory::where(['name' => request()->name])->first()->id;
				$annualLeaves->leave_days_spent = $leaveDaysSpent;
				$annualLeaves->leave_days_left = $annualLeaveDays - $leaveDaysSpent;
				$annualLeaves->save();
			}
			$annualLeavesOfEmployees = AnnualLeave::where(['leave_category_id' => LeaveCategory::where(['name' => request()->name])->first()->id])->join('employees', 'employees.id', '=', 'annual_leaves.employee_id')->get();
    	}
		$leaveCategories = LeaveCategory::get();
		return view('leaves-annual.storeOrUpdate', compact('annualLeavesOfEmployees', 'leaveCategories'));
    }
}
