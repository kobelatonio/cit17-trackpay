@extends('layouts.master')

@section('title')
TrackPay - Job Positions
@endsection

@section('page')
<span class="gray">Edit - </span>{{ $position->title }} Position
@endsection

@section('content')
<form method="POST" action="/admin/positions/{{ $position->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="title">Job Title :</label>
	<input type="text" name="title" value="{{ $position->title }}" autofocus><br>
	<label for="monthly_salary">Monthly Salary :</label>
	<input type="number" name="monthly_salary" value="{{ $position->monthly_salary }}"><br>
	<label for="shift_start">Shift Start :</label>
	<input type="time" name="shift_start" value="{{ $position->shift_start }}"><br>
	<label for="shift_end">Shift End :</label>
	<input type="time" name="shift_end" value="{{ $position->shift_end }}"><br>
	<input type="submit" value="Submit">
</form>
@endsection