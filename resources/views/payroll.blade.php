@extends('layouts.master')

@section('title')
TrackPay - Payroll
@endsection

@section('page')
Payroll
@endsection

@section('filters')
<form class="filters-box" onload="getCurrentMonth()">
	<label for="month">Month & Year</label>
	<input type="month" id="month" name="month">
	<label for="name">Name</label>
	<input type="text" id="name" name="name" placeholder="Enter name">
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<button class="add" onclick="myApp.printTable()">Print Payroll</button>
@endsection

@section('table')
<div class="table">
	<table id="payroll">
		<tr>
			<th>Employee Name</th>
			<th>Gross Pay</th>
			<th>Total Deductions</th>
			<th>First Cut-Off</th>
			<th>Second Cut-Off</th>
			<th>Net Pay</th>
			<th>Payslip</th>
		</tr>
		<tr>
			<td>Joely Russo</td>
			<td>Php 25,000</td>
			<td>Php 3,125</td>
			<td>Php 11,662.5</td>
			<td>Php 11,662.5</td>
			<td>Php 23,325</td>
			<td>
				<button class="edit">Print</button>
			</td>
		</tr>
		<tr>
			<td>Ziva Caldwell</td>
			<td>Php 20,000</td>
			<td>Php 2,500</td>
			<td>Php 9,250</td>
			<td>Php 9,250</td>
			<td>Php 18,500</td>
			<td>
				<button class="edit">Print</button>
			</td>
		</tr>
		<tr>
			<td colspan="5" class="total">Total</td>
			<td id="total"></td>
		</tr>
	</table>
</div>
@endsection