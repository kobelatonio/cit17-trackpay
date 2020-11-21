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
<form class="filters-box" method="POST" action="/deductible_records/store">
	@csrf
	<label for="deductible">Deductible</label>
	<select name="type" id="type" autofocus>
		<option value="" disabled selected hidden>Enter type</option>
		@foreach($deductibles as $deductible)
			<option value="{{ $deductible->type }}">{{ $deductible->type }}</option>
		@endforeach
	</select>
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" max="{{ date('Y-m') }}" value="{{ date('Y-m') }}">
	<input type="submit" value="Submit">
</form>
@endsection