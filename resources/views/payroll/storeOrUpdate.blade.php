@extends('layouts.master')

@section('title')
TrackPay - Payroll
@endsection

@section('page')
Payroll
@endsection

@section('filters')
<form class="filters-box" method="POST" action="/admin/payroll/storeOrUpdate">
	@method('PUT')
	@csrf
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" value="{{ substr($monthlySalaries->first()->date, 0, 7) }}">
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<button class="add" onclick="printTable()">Print Payroll</button>
@endsection

@section('table')
<div class="table">
	<table id="payroll">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Gross Pay</th>
				<th>Total Deductions</th>
				<th>First Cut-Off</th>
				<th>Second Cut-Off</th>
				<th>Net Pay</th>
				<th>Payslip</th>
			</tr>
		</thead>
		<tbody>
			@foreach($monthlySalaries as $monthlySalary)
			<tr>
				<td>{{ $monthlySalary->first_name }} {{ $monthlySalary->last_name }}</td>
				<td>Php {{ number_format($monthlySalary->gross_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthlySalary->total_deductibles, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthlySalary->first_cutoff_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthlySalary->second_cutoff_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthlySalary->net_pay, 2, '.', ',') }}</td>
				<td>
					<a class="edit" href="/admin/payroll/{{ $monthlySalary->date }}/{{ $monthlySalary->employee_id }}">Show</a>
				</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5" class="total">Total</td>
				<td id="total">Php {{ number_format($monthlySalaries->sum('net_pay'), 2, '.', ',') }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection