<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\DailyTimeRecord;


class DashboardController extends Controller
{
    public function index() {
        // Get total number of employees
    	$totalEmployees = Employee::get()->count();

        // Get percentage of punctuality for current month
    	$totalDTRForCurrentMonth = DailyTimeRecord::whereBetween('date', [date('Y-m'.'-01'), date('Y-m'.'-31')])->get()->count();
    	$totalNumberOfEarlyForCurrentMonth = DailyTimeRecord::whereBetween('date', [date('Y-m'.'-01'), date('Y-m'.'-31')])->where(['remarks' => 'Early'])->get()->count();
        if($totalDTRForCurrentMonth == 0) {
            $punctuality = 0;
        } else {
            $punctuality = round(($totalNumberOfEarlyForCurrentMonth / $totalDTRForCurrentMonth) * 100, 0);
        }

        // Get number of days before payday
    	if(date('d') > 0 && date('d') <= 15) {
    		$daysBeforePayday = 15-date('d');
    	} else {
            $daysInCurrentMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    		if($daysInCurrentMonth == 31) {
    			$daysBeforePayday = 31-date('d');
    		} else {
    			$daysBeforePayday = 30-date('d');
    		}
    	}

        // Get all employees with birthdays in current month
    	$employees = Employee::get(); 
    	$employeesWithBirthday = [];
    	foreach($employees as $employee) {
    		if(date("m", strtotime($employee->birthdate)) == date('m')) {
    			$employeesWithBirthday[] = $employee;
    		}
    	}

    	return view('dashboard.index', compact('totalEmployees', 'punctuality', 'daysBeforePayday', 'employeesWithBirthday'));
    }
}
