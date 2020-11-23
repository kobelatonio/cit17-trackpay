@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
<span class="gray">Show - </span>Employee {{ $employee->first_name }} {{ $employee->last_name }} 
@endsection

@section('content')
<form class="edit-form">
	<label for="first_name">First Name :</label>
	<input type="text" name="first_name" value="{{ $employee->first_name }}" readonly><br>
	<label for="last_name">Last Name :</label>
	<input type="text" name="last_name" value="{{ $employee->last_name }}" readonly><br>
	<label for="contact_number">Contact Number :</label>
	<input type="text" name="contact_number" value="{{ $employee->contact_number }}" readonly><br>
	<label for="email_address">Email Address :</label>
	<input type="text" name="email_address" value="{{ $employee->email_address }}" readonly><br>
	<label for="birthdate">Birthdate :</label>
	<input type="date" name="birthdate" value="{{ $employee->birthdate }}" readonly><br>
	<label for="gender">Gender :</label>
	<input type="text" name="gender" value="{{ $employee->gender }}" readonly><br>
	<label for="title">Position :</label>
	@foreach($positions as $position)
		@if($position->id == $employee->position_id)
		<input type="text" name="gender" value="{{ $position->title }}" readonly><br>
		@endif
	@endforeach
	<a class="edit" href="/admin/employees">Back</a>
</form>
@endsection