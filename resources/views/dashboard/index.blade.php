@extends('layouts.master')

@section('title')
TrackPay - Admin Home
@endsection

@section('page')
<span class="gray">Welcome,</span> {{ auth()->user()->first_name }}!
@endsection

@section('table')
<div class="dashboard">
	<div class="row">
		<div class="box">
			<h1>Total number<br>of employees</h1>
			<h2>{{ $totalEmployees }}</h2>
		</div>
		<div class="box">
			<h1>Punctuality for<br>current month</h1>
			<h2>{{ $punctuality }}%</h2>
		</div>
		<div class="box">
			<h1>Days before<br>payday</h1>
			<h2>{{ $daysBeforePayday }}</h2>
		</div>
	</div>
	@if($employeesWithBirthday) 
	<div class="birthdays">
		<table class="birthday">
			<tr>
				<th colspan="3">Employees with birthdays in current month</th>
			</tr>
			@foreach($employeesWithBirthday as $employee)
			<tr>
				<td>{{ $employee->full_name }}</td>
				<td>{{ date('F d, Y', strtotime($employee->birthdate)) }}</td>
				<td>{{ $employee->nth_birthday }} Birthday</td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif
</div>
@endsection
