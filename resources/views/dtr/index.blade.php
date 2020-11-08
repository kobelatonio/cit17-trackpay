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
	<form class="filters-box" action="/admin/dtr/store" method="POST">
		@method('PUT')
		@csrf
		<label for="date">Date</label>
		<input type="date" id="date" name="date">
		<input type="submit" value="Submit">
	</form>
</div>
@endsection