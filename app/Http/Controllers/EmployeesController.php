<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;

class EmployeesController extends Controller
{
    public function index()
    {
    	$employees = Employee::get();
    	return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $positions = Position::get();
        if(count($positions) == 0) {
            Return back()->withErrors([
                'error' => 'A job position has to be created first.'
            ]);
        } else {
            return redirect('/register');
        }
        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
    	$positions = Position::get();
    	return view('employees.show', compact('employee'));
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
            'email' => 'required|email|unique:employees,email,'.$employee->id
            // Even if the email is not edited, this will avoid having
            // an error that the email already exists
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
