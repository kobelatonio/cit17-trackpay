<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deductible;
use App\DeductibleRecord;
use App\Employee;

class DeductibleRecordsController extends Controller
{
    public function index() {
    	$deductibles = Deductible::get();
    	return view('deductible-records.index', compact('deductibles'));
    }

    public function store() {
    	$employees = Employee::get();
    	foreach($employees as $employee) {
    		$deductibleRecord = DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => Deductible::where(['type' => request()->type])->first()->id, 'employee_id' => $employee->id])->first();
    		if(!$deductibleRecord) {
    			$record = new DeductibleRecord;
    			$record->date = request()->date."-01";
    			$record->employee_id = $employee->id;
    			$record->deductible_id = Deductible::where(['type' => request()->type])->first()->id;
    			$record->is_deducted = 1;
    			$position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
    			$deductionAmount = (Deductible::where(['type' => request()->type])->first()->percentage / 100) * $position->monthly_salary;
    			$record->deduction_amount = $deductionAmount;
    			$record->save();
    		}
    	}
    	$deductibleRecords = DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => Deductible::where(['type' => request()->type])->first()->id])->join('employees', 'employees.id', '=', 'deductible_records.employee_id')->get();
    	$deductibles = Deductible::get();

		return view('deductible-records.store', compact('deductibleRecords', 'deductibles'));
    }

    public function edit($date, Employee $employee, Deductible $deductible) {
    	$deductibleRecord = DeductibleRecord::where(['date' => $date, 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first();
		return view('deductible-records.edit', compact('deductibleRecord', 'employee', 'deductible'));
	}

	public function update($date, Employee $employee, Deductible $deductible) { 
		$deductibleRecord = DeductibleRecord::where(['date' => $date, 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first();
		if(request()->has('is_deducted')) {
			$deductibleRecord->is_deducted = 1;
			$position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
    		$deductionAmount = (Deductible::where(['id' => $deductible->id])->first()->percentage / 100) * $position->monthly_salary;
    		$deductibleRecord->deduction_amount = $deductionAmount;
		} else {
			$deductibleRecord->is_deducted = 0;
			$deductibleRecord->deduction_amount = 0;
		}
		$deductibleRecord->save();
		$deductibleRecords = DeductibleRecord::where(['date' => $date, 'deductible_id' => $deductible->id])->join('employees', 'employees.id', '=', 'deductible_records.employee_id')->get();
    	$deductibles = Deductible::get();
		return view('deductible-records.store', compact('deductibleRecords', 'deductibles'));
	}

}
