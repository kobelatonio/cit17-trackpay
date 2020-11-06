@extends('layouts.master')

@section('title')
TrackPay - Deductible Records
@endsection

@section('page')
<span class="gray">Deductible</span> Records
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<form class="filters-box">
	<label for="deductible">Deductible</label>
	<select name="deductible" id="deductible">
		<option value="gsis">GSIS</option>
		<option value="philhealth">PhilHealth</option>
		<option value="pagibig">Pag-IBIG</option>
	</select>
	<label for="name">Name</label>
	<input type="text" id="name" name="name" placeholder="Enter name">
	<label for="month">Month & Year</label>
	<input type="month" id="month" name="month">
	<input type="submit" value="Submit">
</form>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Employee Name</th>
			<th>Is Deducted</th>
			<th>Amount</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td><input type="checkbox" id="isDeducted" name="isDeducted" value="1" checked></td>
			<td>Php 2,250</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td><input type="checkbox" id="isDeducted" name="isDeducted" value="2"></td>
			<td>Php 0</td>
		</tr>
	</table>
</div>
@endsection