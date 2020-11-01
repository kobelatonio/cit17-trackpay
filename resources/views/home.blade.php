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
			<h2>5</h2>
		</div>
		<div class="box">
			<h1>Punctuality for<br>current month</h1>
			<h2>85%</h2>
		</div>
		<div class="box">
			<h1>Days before<br>payday</h1>
			<h2>2</h2>
		</div>
	</div>
	<div class="birthdays">
		<table class="birthday">
		<tr>
			<th colspan="2">Employees with birthday in current month</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td>November 11, 2020</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td>November 26, 2020</td>
		</tr>
	</table>
	</div>
</div>
@endsection
