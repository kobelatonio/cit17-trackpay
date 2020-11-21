@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
<span class="gray">Create - </span>Employee
@endsection

@section('content')
<form method="POST" action="/employees/" class="edit-form"> 
	@csrf 
	<label for="first_name">First Name :</label>
	<input type="text" name="first_name" placeholder="Enter first name" autofocus><br>
	<label for="last_name">Last Name :</label>
	<input type="text" name="last_name" placeholder="Enter last name"><br>
	<label for="contact_number">Contact Number :</label>
	<input type="text" name="contact_number" placeholder="Enter contact number"><br>
	<label for="birthdate">Birthdate :</label>
	<input type="date" name="birthdate" placeholder="Enter birthdate"><br>
	<label for="gender">Gender :</label>
	<select name="gender">
		<option value="" disabled selected hidden>Choose gender</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select><br>
	<label for="title">Position :</label>
	<select name="title">
	@foreach($positions as $position)
		<option value="{{ $position->id }}">{{ $position->title }}</option>
	@endforeach
	</select><br>
	<label for="email_address">Email Address :</label>
	<input type="email" name="email_address" placeholder="Enter email address"><br>
	<label for="password">Password :</label>
	<input type="password" name="password" placeholder="Enter password"><br>
	<input type="submit" value="Submit">
</form>
@endsection