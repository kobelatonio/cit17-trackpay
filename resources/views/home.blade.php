@extends('layouts.master')

@section('title')
TrackPay - Admin Home
@endsection

@section('page')
<span class="gray">Welcome back,</span> admin!
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
	<div class="birthdays">
		<table class="birthday">
		<tr>
			<th colspan="2">Employees with birthday in current month</th>
		</tr>
		@foreach($employeesWithBirthday as $employee)
		<tr>
			<td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
			<td>{{ date('F d, Y', strtotime($employee->birthdate)) }}</td>
		</tr>
		@endforeach
	</table>
	</div>
</div>
@endsection
