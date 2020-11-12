<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;

class EmployeesController extends Controller
{
    public function index()
    {
    	$positions = Position::get();
    	$employees = Employee::get();
    	return view('employees.index', compact('employees', 'positions'));
    }

    public function create()
    {
    	$positions = Position::get();
    	if(!$positions->isEmpty()) {
    		return view('employees.create', compact('positions'));
    	} else {
    		return redirect('/admin/employees')->with('alert', "Create a job position first!");
    	}
    }

    public function show(Employee $employee)
    {
    	$positions = Position::get();
    	return view('employees.show', compact('employee', 'positions'));
    }

    public function store()
    {
    	$employee = new Employee;
    	$employee->first_name = request()->first_name;
    	$employee->last_name = request()->last_name;
    	$employee->contact_number = request()->contact_number;
    	$employee->email_address = request()->email_address;
    	$employee->birthdate = request()->birthdate;
    	$employee->gender = request()->gender;
    	$employee->username = request()->first_name.request()->last_name.substr(request()->contact_number, 0, 4); // system-generated username
    	$employee->password = substr(request()->contact_number, 7, 11).substr(request()->birthdate, 0, 4); // system-generated password
    	$position = Position::where('title', request()->title)->first();
    	$employee->position_id = $position->id;
    	$employee->save();
    	return redirect('/admin/employees');
    }

    public function edit(Employee $employee)
    {
    	$positions = Position::get();
    	return view('employees.edit', compact('employee', 'positions'));
    }

    public function update(Employee $employee)
    {
    	$employee->first_name = request()->first_name;
    	$employee->last_name = request()->last_name;
    	$employee->contact_number = request()->contact_number;
    	$employee->email_address = request()->email_address;
    	$employee->birthdate = request()->birthdate;
    	$employee->gender = request()->gender;
    	$position = Position::where('title', request()->title)->first();
    	$employee->position_id = $position->id;
    	$employee->save();
    	return redirect('/admin/employees');
    }

    public function delete(Employee $employee)
    {
    	$employee->delete();
    	return redirect('/admin/employees');
    }
}
