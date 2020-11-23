@extends('layouts.master')

@section('title')
TrackPay - Payroll
@endsection

@section('page')
Payroll
@endsection

@section('search-filters')
SEARCH FILTER
@endsection

@section('filters')
<form class="filters-box" method="POST" action="/admin/payroll/storeOrUpdate">
	@method('PUT')
	@csrf
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" value="{{ substr($monthly_salaries->first()->date, 0, 7) }}" max="{{ date('Y-m') }}">
	<input type="submit" value="Submit">
</form>
@endsection

@section('addbtn')
<a class="add" onclick="printTable()">Print Payroll</a>
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
			@foreach($monthly_salaries as $monthly_salary)
			<tr>
				@foreach($employees as $employee) 
					@if($employee->id == $monthly_salary->employee_id)
						<td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
					@endif
				@endforeach
				<td>Php {{ number_format($monthly_salary->gross_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthly_salary->total_deductibles, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthly_salary->first_cutoff_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthly_salary->second_cutoff_pay, 2, '.', ',') }}</td>
				<td>Php {{ number_format($monthly_salary->net_pay, 2, '.', ',') }}</td>
				<td>
					<a class="edit" href="/admin/payroll/{{ $monthly_salary->id }}">Show</a>
				</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5" class="total">Total</td>
				<td id="total">Php {{ number_format($monthly_salaries->sum('net_pay'), 2, '.', ',') }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection