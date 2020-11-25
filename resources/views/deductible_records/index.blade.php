@extends('layouts.master')

@section('title')
TrackPay - Deductible Records
@endsection

@section('page')
<span class="gray">Deductible</span> Records
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<div class="filters">
	<form class="filters-box" method="POST" action="/deductible_records/store">
		@csrf
		<label for="deductible">Deductible</label>
		<select name="deductible_id" id="type" autofocus required>
			<option value="" disabled selected hidden>Enter type</option>
			@foreach($deductibles as $deductible)
			<option value="{{ $deductible->id }}">{{ $deductible->type }}</option>
			@endforeach
		</select>
		<label for="date">Month & Year</label>
		<input type="month" id="date" name="date" max="{{ date('Y-m') }}" value="{{ date('Y-m') }}" required>
		<input type="submit" value="Submit">
	</form>
	@include('layouts.errors')
</div>
@endsection