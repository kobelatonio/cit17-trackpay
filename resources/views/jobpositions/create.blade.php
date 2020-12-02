@extends('layouts.master')

@section('title')
TrackPay - Positions
@endsection

@section('page')
<span class="gray">Create - </span>Position
@endsection

@section('content')
<form method="POST" action="/positions/" class="edit-form"> 
	@csrf 
	<label for="title">Job Title :</label>
	<input type="text" name="title" placeholder="Enter title" autofocus required><br>
	<label for="monthly_salary">Monthly Salary :</label>
	<input type="number" name="monthly_salary" placeholder="Enter monthly salary" required><br>
	<label for="shift_start">Shift Start :</label>
	<input type="time" name="shift_start" placeholder="Enter shift start" required><br>
	<label for="shift_end">Shift End :</label>
	<input type="time" name="shift_end" placeholder="Enter shift end" required><br>
	<input type="submit" value="Submit">
	@include('layouts.errors')
</form>
@endsection