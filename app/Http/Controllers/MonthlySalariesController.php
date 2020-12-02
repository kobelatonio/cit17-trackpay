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

    public function filter() {
        $employees = Employee::get();
        if(!$employees->isEmpty()) { // If there are employees
        	foreach($employees as $employee) {
        		$deductibles = Deductible::get();
        		$totalDeductionAmount = 0; 
                // This variable will be subtracted from the gross pay to get the net pay
        		foreach($deductibles as $deductible) { 
                    // For each deductible type, check if an employee has an existing
                    // deductible record based on the date from the request
    				if(!$employee->deductible_records()->where(["date" => request()->date."-01", "deductible_id" => $deductible->id])->first()) { 
                        // If there's no deductible record, create a new one
    	    			$record = new DeductibleRecord;
                        $record->date = request()->date."-01";
                        $record->employee_id = $employee->id;
                        $record->deductible_id = $deductible->id;
                        $record->is_deducted = 1;
                        $record->deduction_amount = ($deductible->percentage / 100) * $employee->position->monthly_salary;
                        $record->save();
                    }
    	    		$totalDeductionAmount += $employee->deductible_records()->where('deductible_id', $deductible->id)->first()->deduction_amount;
                    // This is the sum of the amounts of all deductible records of an employee
        		}
        		$monthly_salary = $employee->monthly_salaries()->where('date', request()->date."-01")->first();
    			if(!$monthly_salary) { 
                    // If an employee has no record yet on the monthly_salaries, create a new one
                    $monthly_salary = new MonthlySalary;
                }   
                // If monthly_salary exists, the following codes will create a new one
                // Otherwise, the following codes will only update the existing one
    			$monthly_salary->date = request()->date."-01";
    			$monthly_salary->employee_id = $employee->id;
    			$monthly_salary->gross_pay = $employee->position->monthly_salary;
    			$monthly_salary->total_deductibles = $totalDeductionAmount;
    			$monthly_salary->net_pay = $employee->position->monthly_salary - $totalDeductionAmount;
    			$monthly_salary->first_cutoff_pay = ($employee->position->monthly_salary - $totalDeductionAmount)/2;
    			$monthly_salary->second_cutoff_pay = ($employee->position->monthly_salary - $totalDeductionAmount)/2;
    			$monthly_salary->save();
        	}
    		$monthly_salaries = MonthlySalary::where(['date' => request()->date."-01"])->join('employees', 'employees.id', '=', 'monthly_salaries.employee_id')
                ->orderBy('employees.first_name', 'ASC')
                ->get();
    		return view('payroll.filter', compact('monthly_salaries', 'employees'));
        } else {
            Return back()->withErrors([
                'error' => 'An employee has to be registered first.'
            ]);
        }
    }

    public function show(MonthlySalary $monthly_salary) {
    	$deductible_records = $monthly_salary->employee->deductible_records()->where(['date' => $monthly_salary->date, 'is_deducted' => 1])->get();
    	return view('payroll.show', compact('monthly_salary', 'deductible_records'));
    }
}
