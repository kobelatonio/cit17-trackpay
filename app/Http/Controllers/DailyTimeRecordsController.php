<?php

namespace App\Http\Controllers;

use DB;
use App\Employee;
use App\DailyTimeRecord;
use App\Position;
use Illuminate\Http\Request;

class DailyTimeRecordsController extends Controller
{
    public function index() {
        return view('dtr.index');
    }

    public function store() {
		$employees = Employee::get();
		foreach($employees as $employee) {
            $dtr = DailyTimeRecord::where(['date' => request()->date, 'employee_id' => $employee->id])->first();
			if(!$dtr) {
				$dtr = new DailyTimeRecord;
				$dtr->date = request()->date;
				$dtr->employee_id = $employee->id;
                $position = Employee::where('employees.id', $employee->id)
                ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
				$dtr->shift_start = $position->shift_start;
				$dtr->shift_end = $position->shift_end;
				$dtr->remarks = 'Absent';
				$dtr->save();
			}
		}
		$dtrFiltered = DailyTimeRecord::where('daily_time_records.date', request()->date)
        ->join('employees', 'employees.id', '=', 'daily_time_records.employee_id')->get();
    	return view('dtr.store', compact('dtrFiltered'));
    }
}
