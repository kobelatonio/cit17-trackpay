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
<form class="filters-box" method="POST" action="/payroll/storeOrUpdate">
	@method('PUT')
	@csrf
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" max="{{ date('Y-m') }}" value="{{ date('Y-m') }}" autofocus>
	<input type="submit" value="Submit">
</form>
@endsection