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
<form class="filters-box" method="POST" action="/admin/deductible-records/store">
	@method('PUT')
	@csrf
	<label for="deductible">Deductible</label>
	<select name="type" id="type">
		<option value="" disabled selected hidden>Enter type</option>
		@foreach($deductibles as $deductible)
			<option value="{{ $deductible->type }}">{{ $deductible->type }}</option>
		@endforeach
	</select>
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date">
	<input type="submit" value="Submit">
</form>
@endsection