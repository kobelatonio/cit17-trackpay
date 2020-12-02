@extends('layouts.master')

@section('title')
TrackPay - Annual Leaves
@endsection

@section('page')
<span class="gray">Annual</span> Leaves
@endsection

@section('search-filters')
SEARCH FILTER
@endsection

@section('filters')
<div class="filters">
	<form class="filters-box" method="GET" action="/leave_annual/filter">
		@csrf
		<label for="leave">Leave Category</label>
		<select name="leave_category_id" id="name" required>
			<option value="" disabled selected hidden>Enter category</option>
			@foreach($leaveCategories as $leaveCategory)
				<option value="{{ $leaveCategory->id }}">{{ $leaveCategory->name }} Leave</option>
			@endforeach
		</select>
		<input type="submit" value="Submit">
	</form>
	@include('layouts.errors')
</div>
@endsection