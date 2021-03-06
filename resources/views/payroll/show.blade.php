@extends('layouts.master')

@section('title')
TrackPay - Payroll
@endsection

@section('page')
<div id="header">
	<span class="gray">Payslip of </span> {{ $monthly_salary->employee->full_name }} <span class="gray">for</span> {{ date('F Y', strtotime($monthly_salary->date)) }}
</div>
@endsection

@section('table')
<div class="table">
	<table id="payroll" style="margin-top: 0; margin-bottom: 20px;">
		<thead>
			<tr>
				<th>EMPLOYEE NAME</th>
				<th>{{ $monthly_salary->employee->full_name }}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>DATE </td>
				<td>{{ date('F Y', strtotime($monthly_salary->date)) }}</td>
			</tr>
			<tr>
				<td>POSITION </td>
				<td>{{ $monthly_salary->employee->position->title }}</td>
			</tr>
			<tr>
				<td>GROSS PAY </td>
				<td>Php {{ number_format($monthly_salary->gross_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>DEDUCTIONS </td>
				<td></td>
			</tr>
			@foreach($deductible_records as $deductible_record)
			<tr>
				<td>{{ $deductible_record->deductible->type }} </td>
				<td>Php {{ number_format($deductible_record->deduction_amount, 2, '.', ',') }}</td>
			</tr>
			@endforeach
			<tr>
				<td>TOTAL DEDUCTIONS </td>
				<td>Php {{ number_format($monthly_salary->total_deductibles, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>FIRST CUT-OFF PAY </td>
				<td>Php {{ number_format($monthly_salary->first_cutoff_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>SECOND CUT-OFF PAY </td>
				<td>Php {{ number_format($monthly_salary->second_cutoff_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td> NET PAY </td>
				<td>Php {{ number_format($monthly_salary->net_pay, 2, '.', ',') }}</td>
			</tr>
		</tbody>
	</table>
</div>
<a class="add" onclick="printPayslip()" style="margin-top: 20px;">Print Payslip</a>
@endsection