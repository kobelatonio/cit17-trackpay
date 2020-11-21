@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
<span class="gray">Edit - </span>Employee {{ $employee->first_name }} {{ $employee->last_name }}
@endsection

@section('content')
<form method="POST" action="/employees/{{ $employee->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="first_name">First Name :</label>
	<input type="text" name="first_name" value="{{ $employee->first_name }}" autofocus><br>
	<label for="last_name">Last Name :</label>
	<input type="text" name="last_name" value="{{ $employee->last_name }}"><br>
	<label for="contact_number">Contact Number :</label>
	<input type="text" name="contact_number" value="{{ $employee->contact_number }}"><br>
	<label for="email_address">Email Address :</label>
	<input type="text" name="email_address" value="{{ $employee->email_address }}"><br>
	<label for="birthdate">Birthdate :</label>
	<input type="date" name="birthdate" value="{{ $employee->birthdate }}"><br>
	<label for="gender">Gender :</label>
	<select name="gender">
		@if($employee->gender == "Male")
		<option value="Male" selected> Male </option>
		<option value="Female"> Female </option>
		@else
		<option value="Male"> Male </option>
		<option value="Female" selected> Female </option>
		@endif
	</select><br>
	<label for="title">Position :</label>
	<select name="title">
	@foreach($positions as $position)
		@if($position->id == $employee->position_id)
		<option value="{{ $position->title }}" selected> {{ $position->title }} </option>
		@else
		<option value="{{ $position->title }}"> {{ $position->title }} </option>
		@endif
	@endforeach
	</select><br>
	<input type="submit" value="Submit">
</form>
@endsection