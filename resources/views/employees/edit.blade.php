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
	<input type="text" name="first_name" value="{{ $employee->first_name }}" autofocus required><br>
	<label for="last_name">Last Name :</label>
	<input type="text" name="last_name" value="{{ $employee->last_name }}" required><br>
	<label for="contact_number">Contact Number :</label>
	<input type="text" name="contact_number" value="{{ $employee->contact_number }}" required><br>
	<label for="email">Email Address :</label>
	<input type="email" name="email" value="{{ $employee->email }}" required><br>
	<label for="birthdate">Birthdate :</label>
	<input type="date" name="birthdate" value="{{ $employee->birthdate }}" required><br>
	<label for="gender">Gender :</label>
	<select name="gender" required>
		@if($employee->gender == "Male")
		<option value="Male" selected> Male </option>
		<option value="Female"> Female </option>
		@else
		<option value="Male"> Male </option>
		<option value="Female" selected> Female </option>
		@endif
	</select><br>
	<label for="title">Position :</label>
	<select name="position_id" required>
	@foreach($positions as $position)
		@if($position->id == $employee->position_id)
		<option value="{{ $position->id }}" selected> {{ $position->title }} </option>
		@else
		<option value="{{ $position->id }}"> {{ $position->title }} </option>
		@endif
	@endforeach
	</select><br>
	<input type="submit" value="Submit">	
	@include('layouts.errors')
</form>
@endsection