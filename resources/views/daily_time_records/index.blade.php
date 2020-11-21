@extends('layouts.master')

@section('title')
TrackPay - Daily Time Record
@endsection

@section('page')
<span class="gray">Daily Time </span> Record
@endsection

@section('filters')
<div class="filters">
	<h1 class="filters-title">SEARCH FILTER</h1>
	<form class="filters-box" action="/daily_time_records/store" method="POST">
		@csrf
		<label for="date">Date</label>
		<input type="date" id="date" name="date" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
		<input type="submit" value="Submit">
	</form>
</div>
@endsection