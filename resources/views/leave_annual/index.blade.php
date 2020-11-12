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
<form class="filters-box" method="POST" action="/admin/leave_annual/storeOrUpdate">
	@method('PUT')
	@csrf
	<label for="leave">Leave Category</label>
	<select name="name" id="name">
		<option value="" disabled selected hidden>Enter category</option>
		@foreach($leaveCategories as $leaveCategory)
			<option value="{{ $leaveCategory->name }}">{{ $leaveCategory->name }} leave</option>
		@endforeach
	</select>
	<input type="submit" value="Submit">
</form>
@endsection