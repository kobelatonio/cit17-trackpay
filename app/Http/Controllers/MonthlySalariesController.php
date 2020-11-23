<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\MonthlySalary;
use App\DeductibleRecord;
use App\Deductible;
use App\Position;

class MonthlySalariesController extends Controller
{
    public function index() {
    	return view('payroll.index');
    }

    public function storeOrUpdate() {
        $employees = Employee::get();
        if(!$employees->isEmpty()) { // If there are employees
        	foreach($employees as $employee) {
        		$deductibles = Deductible::get();
        		$totalDeductionAmount = 0; 
                // This variable will be subtracted from the gross pay to get the net pay
        		foreach($deductibles as $deductible) { 
                    // For each deductible type, check if an employee has an existing
                    // deductible record based on the date from the request
        			$deductible_record = DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first();
    				if(!$deductible_record) { // If there's no deductible record, create a new one
    	    			$record = new DeductibleRecord;
                        $record->date = request()->date."-01";
                        $record->employee_id = $employee->id;
                        $record->deductible_id = $deductible->id;
                        $record->is_deducted = 1;
                        $position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
                        $deduction_amount = ($deductible->percentage / 100) * $position->monthly_salary;
                        $record->deduction_amount = $deduction_amount;
                        $record->save();
                    }
    	    		$totalDeductionAmount += DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first()->deduction_amount; 
                    // This is the sum of the amounts of all deductible records of an employee
        		}
        		$monthly_salary = MonthlySalary::where(['date' => request()->date."-01", 'employee_id' => $employee->id])->first();
    			if(!$monthly_salary) { 
                    // If an employee has no record yet on the monthly_salaries, create a new one
                    $monthly_salary = new MonthlySalary;
                }   
                // If monthly_salary exists, the following codes will create a new one
                // Otherwise, the following codes will only update the existing one
    			$monthly_salary->date = request()->date."-01";
    			$monthly_salary->employee_id = $employee->id;
    			$position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
    			$monthly_salary->gross_pay = $position->monthly_salary;
    			$monthly_salary->total_deductibles = $totalDeductionAmount;
    			$monthly_salary->net_pay = $position->monthly_salary - $totalDeductionAmount;
    			$monthly_salary->first_cutoff_pay = ($position->monthly_salary - $totalDeductionAmount)/2;
    			$monthly_salary->second_cutoff_pay = ($position->monthly_salary - $totalDeductionAmount)/2;
    			$monthly_salary->save();
        	}
    		$monthly_salaries = MonthlySalary::where(['date' => request()->date."-01"])->get();
    		return view('payroll.storeOrUpdate', compact('monthly_salaries', 'employees'));
        } else {
            return redirect('/admin/payroll')->with('alert', "Create an employee first!");
        }
    }

    public function show(MonthlySalary $monthly_salary) {
        $employee = Employee::where(['id' => $monthly_salary->employee_id])->first();
        $position = Position::where(['id' => $employee->position_id])->first();
    	$deductibleRecords = DeductibleRecord::where(['date' => $monthly_salary->date, 'employee_id' => $monthly_salary->employee_id, 'is_deducted' => 1])->join('deductibles', 'deductibles.id', '=', 'deductible_records.deductible_id')->get();
    	return view('payroll.show', compact('monthly_salary', 'deductibleRecords', 'employee', 'position'));
    }
}
