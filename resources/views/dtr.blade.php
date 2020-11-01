@extends('layouts.master')

@section('title')
TrackPay - Daily Time Record
@endsection

@section('page')
<span class="gray">Daily Time </span> Record
@endsection

@section('filters')
<div class="filters">
	<h1 class="filters-title">SEARCH FILTERS</h1>
	<form class="filters-box" onload="getCurrentDate()">
		<label for="date">Date</label>
		<input type="date" id="date" name="date">
		<label for="name">Name</label>
		<input type="text" id="name" name="name" placeholder="Enter name">
		<input type="submit" value="Submit">
	</form>
</div>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Employee Name</th>
			<th>Shift Start</th>
			<th>Shift End</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Minutes Late</th>
			<th>Remarks</th>
			<th>Hours Worked</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td>7:00 AM</td>
			<td>4:00 PM</td>
			<td>6:50 AM</td>
			<td>4:00 PM</td>
			<td>0 minute/s</td>
			<td>Early</td>
			<td>8 hour/s</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td>7:30 AM</td>
			<td>4:30 PM</td>
			<td>7:28 AM</td>
			<td>4:30 PM</td>
			<td>0 minute/s</td>
			<td>Early</td>
			<td>8 hour/s</td>
		</tr>
	</table>
</div>
@endsection