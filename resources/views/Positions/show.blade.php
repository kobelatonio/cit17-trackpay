@extends('layouts.master')

@section('title')
TrackPay - Job Positions
@endsection

@section('page')
<span class="gray">Show - </span>{{ $position->title }} Position
@endsection

@section('content')
<form class="edit-form">
	<label for="title">Title :</label>
	<input type="text" name="title" value="{{ $position->title }}" readonly><br>
	<label for="monthly_salary">Monthly Salary :</label>
	<input type="text" name="monthly_salary" value="Php {{ number_format($position->monthly_salary, 2, '.', ',') }}" readonly><br>
	<label for="shift_start">Shift Start :</label>
	<input type="text" name="shift_start" value="{{ $position->shift_start }}" readonly><br>
	<label for="shift_end">Shift End :</label>
	<input type="text" name="shift_end" value="{{ $position->shift_end }}" readonly><br>
	<a class="edit" href="/admin/positions">Back</a>
</form>
@endsection