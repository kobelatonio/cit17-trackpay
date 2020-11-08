<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\MonthlySalary;
use App\DeductibleRecord;
use App\Deductible;

class MonthlySalariesController extends Controller
{
    public function index() {
    	return view('payroll.index');
    }

    public function storeOrUpdate() {
    	$employees = Employee::get();
    	foreach($employees as $employee) {
    		$deductibles = Deductible::get();
    		$totalDeductionAmount = 0;
    		foreach($deductibles as $deductible) {
    			$deductibleRecord = DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first();
				if(!$deductibleRecord) {
	    			$record = new DeductibleRecord;
	    			$record->date = request()->date."-01";
	    			$record->employee_id = $employee->id;
	    			$record->deductible_id = $deductible->id;
	    			$record->is_deducted = 1;
	    			$position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
	    			$deductionAmount = ($deductible->percentage / 100) * $position->monthly_salary;
	    			$record->deduction_amount = $deductionAmount;
	    			$record->save();
	    		}
	    		$totalDeductionAmount += DeductibleRecord::where(['date' => request()->date."-01", 'deductible_id' => $deductible->id, 'employee_id' => $employee->id])->first()->deduction_amount;
    		}
    		$monthlySalary = MonthlySalary::where(['date' => request()->date."-01", 'employee_id' => $employee->id])->first();
			if(!$monthlySalary) {
    			$salary = new MonthlySalary;
    			$salary->date = request()->date."-01";
    			$salary->employee_id = $employee->id;
    			$position = Employee::where('employees.id', $employee->id)->join('positions', 'employees.position_id', '=', 'positions.id')->first();
    			$salary->gross_pay = $position->monthly_salary;
    			$salary->total_deductibles = $totalDeductionAmount;
    			$salary->net_pay = $position->monthly_salary - $totalDeductionAmount;
    			$salary->first_cutoff_pay = ($position->monthly_salary - $totalDeductionAmount)/2;
    			$salary->second_cutoff_pay = ($position->monthly_salary - $totalDeductionAmount)/2;
    			$salary->save();
    		}
    	}
		$monthlySalaries = MonthlySalary::where(['date' => request()->date."-01"])->join('employees', 'employees.id', '=', 'monthly_salaries.employee_id')->get();
		return view('payroll.storeOrUpdate', compact('monthlySalaries'));
    }

    public function show($date, Employee $employee) {
    	$monthlySalary = MonthlySalary::where(['date' => $date, 'employee_id' => $employee->id])
    	->join('employees', 'employees.id', '=', 'monthly_salaries.employee_id')
    	->join('positions', 'positions.id', '=', 'employees.position_id')
    	->first();
    	$deductibleRecords = DeductibleRecord::where(['date' => $date, 'employee_id' => $employee->id, 'is_deducted' => 1])->join('deductibles', 'deductibles.id', '=', 'deductible_records.deductible_id')->get();

    	return view('payroll.show', compact('monthlySalary', 'deductibleRecords'));
    }
}
