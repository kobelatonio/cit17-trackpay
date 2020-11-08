<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\DailyTimeRecord;


class HomeController extends Controller
{
    public function index() {
    	$totalEmployees = Employee::get()->count();
    	$totalDTRForCurrentMonth = DailyTimeRecord::where(['date' => date('Y-m-d')])->get()->count();
    	$totalNumberOfEarlyForCurrentMonth = DailyTimeRecord::where(['date' => date('Y-m-d'), 'remarks' => 'Early'])->get()->count();
    	$punctuality = round(($totalNumberOfEarlyForCurrentMonth / $totalDTRForCurrentMonth) * 100, 0);
    	$daysBeforePayday = 0;
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
    	return view('home', compact('totalEmployees', 'punctuality', 'daysBeforePayday', 'employeesWithBirthday'));
    }
}
