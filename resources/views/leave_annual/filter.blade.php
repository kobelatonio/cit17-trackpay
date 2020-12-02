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
<form class="filters-box" method="GET" action="/leave_annual/filter">
	@csrf
	<label for="leave">Leave Category</label>
	<select name="leave_category_id" id="name" required>
		@foreach($leave_categories as $leave_category)
			<option value="{{ $leave_category->id }}" {{ $annual_leaves->first()->leave_category_id == $leave_category->id ? "selected" : "" }}>{{ $leave_category->name }} Leave</option>
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
			@foreach($annual_leaves as $annual_leave)
				<tr>
					<td>{{ $annual_leave->employee->first_name }} {{ $annual_leave->employee->last_name }}</td>
					<td>{{ $annual_leave->leave_days_spent }}</td>
					<td>{{ $annual_leave->leave_days_left }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="pagination">
	<div class="previous">{{ $annual_leaves->appends(request()->input())->links() }}</div>
</div>
@endsection