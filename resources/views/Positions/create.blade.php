@extends('layouts.master')

@section('title')
TrackPay - Positions
@endsection

@section('page')
<span class="gray">Create - </span>Position
@endsection

@section('content')
<form method="POST" action="/admin/positions/" class="edit-form"> 
	@csrf 
	<label for="title">Job Title :</label>
	<input type="text" name="title" placeholder="Enter title" autofocus><br>
	<label for="monthly_salary">Monthly Salary :</label>
	<input type="number" name="monthly_salary" placeholder="Enter monthly salary"><br>
	<label for="shift_start">Shift Start :</label>
	<input type="time" name="shift_start" placeholder="Enter shift start"><br>
	<label for="shift_end">Shift End :</label>
	<input type="time" name="shift_end" placeholder="Enter shift end"><br>
	<input type="submit" value="Submit">
</form>
@endsection