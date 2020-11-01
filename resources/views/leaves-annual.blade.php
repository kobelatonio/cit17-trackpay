@extends('layouts.master')

@section('title')
TrackPay - Annual Leaves
@endsection

@section('page')
<span class="gray">Annual</span> Leaves
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
	<input type="submit" value="Submit">
</form>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Employee Name</th>
			<th>Leave Days Spent </th>
			<th>Leave Days Left</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>Danika Perkins</td>
			<td>2.010</td>
			<td>12.099</td>
			<td>
				<button class="edit">Edit</button>
			</td>
		</tr>
		<tr>
			<td>Arron Cowan</td>
			<td>1.021</td>
			<td>13.790</td>
			<td>
				<button class="edit">Edit</button>
			</td>
		</tr>
	</table>
</div>
@endsection