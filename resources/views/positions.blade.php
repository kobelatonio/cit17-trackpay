@extends('layouts.master')

@section('title')
TrackPay - Job Positions
@endsection

@section('page')
<span class="gray">Job</span> Positions
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<form class="filters-box">
	<label for="title">Position Title</label>
	<input type="text" id="title" name="title" placeholder="Enter position title">
	<label for="salary-start">Salary Range</label>
	<input type="number" id="salary-start" name="salary-start" placeholder="0" style="width: 90px; margin-right: 0px;" >
	<h1>-</h1>
	<input type="number" id="salary-end" name="salary-end" placeholder="0" style="width: 90px;" >
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<button class="add">Add a job position</button>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Position Title</th>
			<th>Monthly Salary</th>
			<th>Shift Start</th>
			<th>Shift End</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>Manager</td>
			<td>Php 25,000</td>
			<td>7:00 AM</td>
			<td>4:00 PM</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
		<tr>
			<td>Auditor</td>
			<td>Php 20,000</td>
			<td>7:30 AM</td>
			<td>4:30 PM</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
	</table>
</div>
@endsection