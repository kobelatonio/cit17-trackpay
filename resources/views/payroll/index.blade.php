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
	<input type="month" id="date" name="date">
	<input type="submit" value="Submit">
</form>
@endsection