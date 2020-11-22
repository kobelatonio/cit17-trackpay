<?php

namespace App\Http\Controllers;

use Auth;
use App\Position;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
    	return view('login');
    }

    public function login() {
    	$credentials = request()->validate([
			'email' => 'required|email', 
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
			'position_id' => 'required|numeric|min:1',
			'email' => 'required|unique:employees|email',
			'password' => 'required|min:10'
		]);
		$validated_fields['password'] = bcrypt($validated_fields['password']);
		$employee = Employee::create($validated_fields); 
		return redirect('/');
    }

    public function edit() {
    	return view('edit-password');
    }

    public function update() {
    	$validated_fields = request()->validate([ 
			'user_type' => 'required|in:1,2',
			'email' => 'required|email',
			'old_password' => 'required',
			'new_password' => 'required|min:10|',
			'confirm_new_password' => 'required|same:new_password'
		]);

		if($validated_fields['user_type'] == 1) {
			if(Auth::attempt(['email' => $validated_fields['email'], 'password' => $validated_fields['old_password']])) { 
				User::find(Auth::id())->update(['password' => bcrypt(request()->new_password)]);
				Auth::logout();
				return redirect('/');
			}
		} else if($validated_fields['user_type'] == 2){
			if(Auth::guard('employee')->attempt(['email' => $validated_fields['email'], 'password' => $validated_fields['old_password']])) { 
				Employee::find(Auth::guard('employee')->user()->id)->update(['password' => bcrypt(request()->new_password)]);
				Auth::logout();
				return redirect('/');
			}
		} else {
			Return back()->withErrors([
				'user_type' => 'Incorrect user type input'
			]);
		}

		Return back()->withErrors([
			'credentials' => 'Incorrect email or password'
		]);
    }
}
