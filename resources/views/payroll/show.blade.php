@extends('layouts.master')

@section('title')
TrackPay - Payroll
@endsection

@section('page')
<div id="header">
	<span class="gray">Payslip of </span> {{ $monthlySalary->first_name }} {{ $monthlySalary->last_name }} <span class="gray">for</span> {{ date('F Y', strtotime($monthlySalary->date)) }}
</div>
@endsection

@section('table')
<div class="table">
	<table id="payroll" style="margin-top: 0;">
		<thead>
			<tr>
				<th>EMPLOYEE NAME</th>
				<th>{{ $monthlySalary->first_name }} {{ $monthlySalary->last_name }}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>DATE </td>
				<td>{{ date('F Y', strtotime($monthlySalary->date)) }}</td>
			</tr>
			<tr>
				<td>POSITION </td>
				<td>{{ $monthlySalary->title }}</td>
			</tr>
			<tr>
				<td>GROSS PAY </td>
				<td>Php {{ number_format($monthlySalary->gross_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>DEDUCTIONS </td>
				<td></td>
			</tr>
			@foreach($deductibleRecords as $deductibleRecord)
				<tr>
					<td>{{ $deductibleRecord->type }} </td>
					<td>Php {{ number_format($deductibleRecord->deduction_amount, 2, '.', ',') }}</td>
				</tr>
			@endforeach
			<tr>
				<td>TOTAL DEDUCTIONS </td>
				<td>Php {{ number_format($monthlySalary->total_deductibles, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>FIRST CUT-OFF PAY </td>
				<td>Php {{ number_format($monthlySalary->first_cutoff_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td>SECOND CUT-OFF PAY </td>
				<td>Php {{ number_format($monthlySalary->second_cutoff_pay, 2, '.', ',') }}</td>
			</tr>
			<tr>
				<td> NET PAY </td>
				<td>Php {{ number_format($monthlySalary->net_pay, 2, '.', ',') }}</td>
			</tr>
		</tbody>
	</table>
</div>
<button class="add" onclick="printPayslip()" style="margin-top: 20px;">Print Payslip</button>
@endsection