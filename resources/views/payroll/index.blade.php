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
<div class="filters">
	<form class="filters-box" method="GET" action="/payroll/filter">
		@csrf
		<label for="date">Month & Year</label>
		<input type="month" id="date" name="date" max="{{ date('Y-m') }}" value="{{ date('Y-m') }}" autofocus>
		<input type="submit" value="Submit">
	</form>
	@include('layouts.errors')
</div>
@endsection