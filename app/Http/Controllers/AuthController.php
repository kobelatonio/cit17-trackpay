<?php

namespace App\Http\Controllers;

use Auth;
use App\Position;
use App\Employee;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
    	return view('login');
    }

    public function login() {
    	$credentials = request()->validate([
			'email' => 'required', 
			'password' => 'required'
		]);
		
		if(Auth::attempt($credentials)) { 
			return redirect('/dashboard');
		}

		Return back()->withErrors([
			'credentials' => 'Incorrect email or password'
		]);
    }

    public function logout() {
    	Auth::logout(); 
		return redirect('/'); 
    }

    public function register() {
    	Auth::logout(); 
    	// There's a link to the page of employee register from the admin's employees page
    	// so the admin should be logged out when an employee registers or signs up
    	$positions = Position::get();
    	return view('register', compact('positions'));
    }

    public function store() {
    	$validated_fields = request()->validate([ 
			'first_name' => 'required',
			'last_name' => 'required',
			'contact_number' => 'required',
			'birthdate' => 'required|date_format:Y-m-d|before:today',
			'gender' => 'required|in:Male,Female',
			'position_id' => 'required',
			'email_address' => 'required|unique:employees',
			'password' => 'required'
		]);
		$validated_fields['password'] = bcrypt($validated_fields['password']);
		$employee = Employee::create($validated_fields); 
		return redirect('/');
    }
}
