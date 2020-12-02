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
    	return view('deductible_records.index', compact('deductibles'));
    }

    public function filter() {
        $employees = Employee::get();
        $deductibles = Deductible::get();
        if(!$employees->isEmpty()) {
        	foreach($employees as $employee) {
                // Check if an employee has an existing deductible record
                // based on the date (month & year) and deductible type from the request
        		$deductible_record = $employee->deductible_records()->where(["date" => request()->date."-01", "deductible_id" => request()->deductible_id])->first();
                // If an employee doesn't have one, create a new deductible record
        		if(!$deductible_record) {
        			$record = new DeductibleRecord;
        			$record->date = request()->date."-01";
        			$record->employee_id = $employee->id;
        			$record->deductible_id = request()->deductible_id;
        			$record->is_deducted = 1;
                    // Get the percentage of the deductible type to calculate
                    // the amount that will be deducted to the monthly salary
        			$deduction_amount = (Deductible::find(request()->deductible_id)->percentage / 100) * $employee->position->monthly_salary;
        			$record->deduction_amount = $deduction_amount;
        			$record->save();
        		}
        	}
            // Get all deductible records based on the date and deductible type from the request
        	$deductible_records = DeductibleRecord::where(["date" => request()->date."-01", "deductible_id" => request()->deductible_id])
                ->join('employees', 'employees.id', '=', 'deductible_records.employee_id')
                ->orderBy('employees.first_name', 'ASC')
                ->paginate(10);
    		return view('deductible_records.filter', compact('deductible_records', 'deductibles'));
        } else {
            return back()->withErrors([
                'error' => 'An employee has to be registered first.'
            ]);
        }
    }

    public function edit(DeductibleRecord $deductible_record) {
		return view('deductible_records.edit', compact('deductible_record'));
	}

	public function update(DeductibleRecord $deductible_record) { 
		if(request()->has('is_deducted')) { // If is_deducted is set to true  
			$deductible_record->is_deducted = 1;
            // Get the percentage of the deductible type to calculate
            // the deduction_amount that will be deducted to the monthly salary
    		$deductionAmount = (Deductible::find($deductible_record->deductible_id)->percentage / 100) * $deductible_record->employee->position->monthly_salary;
    		$deductible_record->deduction_amount = $deductionAmount;
		} else { // If is_deducted is set to false  
			$deductible_record->is_deducted = 0;
			$deductible_record->deduction_amount = 0;
		}
		$deductible_record->save();
        // Get all deductible records based on the date and deductible type from the request
		$deductible_records = DeductibleRecord::where(['date' => $deductible_record->date, 'deductible_id' => $deductible_record->deductible_id])->get();
        $deductibles = Deductible::get();
        return view('deductible_records.store', compact('deductible_records', 'deductibles'));
	}
}
