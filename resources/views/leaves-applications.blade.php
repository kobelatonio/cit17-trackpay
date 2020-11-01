@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
<span class="gray">Leave</span> Applications
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<form class="filters-box">
	<label for="leave">Leave Category</label>
	<select name="leave" id="leave">
		<option value="sick">Sick Leave</option>
		<option value="vacation">Vacation Leave</option>
		<option value="birthday">Birthday Leave</option>
		<option value="maternity">Maternity Leave</option>
	</select>
	<label for="name">Name</label>
	<input type="text" id="name" name="name" placeholder="Enter name">
	<label for="month">Month & Year</label>
	<input type="month" id="month" name="month">
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<button class="add" style="margin-top: 20px;">Add a leave application</button>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Employee Name</th>
			<th>Leave Category</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th>Reason for Rejection</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td>Sick Leave</td>
			<td>04-15-2020</td>
			<td>04-17-2020</td>
			<td>Rejected</td>
			<td>Low manpower</td>
			<td>
				<button class="edit">Edit</button>
			</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td>Sick Leave</td>
			<td>08-04-2020</td>
			<td>08-07-2020</td>
			<td>Approved</td>
			<td>-</td>
			<td>
				<button class="edit">Edit</button>
			</td>
		</tr>
	</table>
</div>
@endsection