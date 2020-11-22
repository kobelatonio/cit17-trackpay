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

    public function show(Employee $employee)
    {
    	$positions = Position::get();
    	return view('employees.show', compact('employee', 'positions'));
    }

    public function edit(Employee $employee)
    {
    	$positions = Position::get();
    	return view('employees.edit', compact('employee', 'positions'));
    }

    public function update(Employee $employee)
    {
        $validated_fields = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'birthdate' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required|in:Male,Female',
            'position_id' => 'required|numeric|min:1',
            'email' => 'required|email|unique:employees,email_address,'.$employee->id
            // Even if the email_address is not edited, this will avoid having
            // an error that the email_address already exists
        ]);
        $employee->update($validated_fields);
    	return redirect('/employees');
    }

    public function delete(Employee $employee)
    {
    	$employee->delete();
    	return redirect('/employees');
    }
}
