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
<button class="add" style="margin-top: 20px;"></button>
<a href="">
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
@endsection