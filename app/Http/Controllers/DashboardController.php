<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\DailyTimeRecord;


class DashboardController extends Controller
{
    public function index() {
    	$totalEmployees = Employee::get()->count();
    	$totalDTRForCurrentMonth = DailyTimeRecord::whereBetween('date', [date('Y-m'.'-01'), date('Y-m'.'-31')])->get()->count();
    	$totalNumberOfEarlyForCurrentMonth = DailyTimeRecord::whereBetween('date', [date('Y-m'.'-01'), date('Y-m'.'-31')])->where(['remarks' => 'Early'])->get()->count();
        if($totalDTRForCurrentMonth == 0) {
            $punctuality = 0;
        } else {
            $punctuality = round(($totalNumberOfEarlyForCurrentMonth / $totalDTRForCurrentMonth) * 100, 0);
        }
    	if(date('d') > 0 && date('d') <= 15) {
    		$daysBeforePayday = 15-date('d');
    	} else {
    		if(date('m') == 1 || date('m') == 3 || date('m') == 5 || date('m') == 7 || date('m') == 8 || date('m') == 10 || date('m') == 12) {
    			$daysBeforePayday = 31-date('d');
    		} else {
    			$daysBeforePayday = 30-date('d');
    		}
    	}
    	$employees = Employee::get(); 
    	$employeesWithBirthday = [];
    	$count = 0;
    	foreach($employees as $employee) {
    		$birthdate = $employee->birthdate; 
    		$month = date("m", strtotime($birthdate));
    		if($month == date('m')) {
    			$employeesWithBirthday[] = $employee;
    			$count += 1;
    		}
    	}
    	return view('dashboard.index', compact('totalEmployees', 'punctuality', 'daysBeforePayday', 'employeesWithBirthday'));
    }
}
