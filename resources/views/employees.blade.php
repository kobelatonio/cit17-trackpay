@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
Employees
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<form class="filters-box">
	<label for="name">Name</label>
	<input type="text" id="name" name="name" placeholder="Enter name">
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<button class="add">Add an employee</button>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Employee Name</th>
			<th>Position</th>
			<th>Contact Number</th>
			<th>Email Address</th>
			<th>Birthdate</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td>Manager</td>
			<td>0954-234-2356</td>
			<td>joely@gmail.com</td>
			<td>05-30-1993</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td>Auditor</td>
			<td>0932-543-5473</td>
			<td>ziva@gmail.com</td>
			<td>07-23-1995</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
	</table>
</div>
@endsection