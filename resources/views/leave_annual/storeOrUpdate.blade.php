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
			@if($annualLeavesOfEmployees->first()->leave_category_id == $leaveCategory->id)
			<option value="{{ $leaveCategory->name }}" selected>{{ $leaveCategory->name }} leave</option>
			@else
			<option value="{{ $leaveCategory->name }}">{{ $leaveCategory->name }} leave</option>
			@endif
		@endforeach
	</select>
	<input type="submit" value="Submit">
</form>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Leave Days Spent </th>
				<th>Leave Days Left</th>
			</tr>
		</thead>
		<tbody>
			@foreach($annualLeavesOfEmployees as $annualLeavesOfEmployee)
				<tr>
					<td>{{ $annualLeavesOfEmployee->first_name }} {{ $annualLeavesOfEmployee->last_name }}</td>
					<td>{{ $annualLeavesOfEmployee->leave_days_spent }}</td>
					<td>{{ $annualLeavesOfEmployee->leave_days_left }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection