@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection

@section('page')
Leave Categories
@endsection

@section('addbtn')
<a class="add" href="/leave_categories/create">Add a leave category</a>
@endsection

@section('table')
@if(!$leave_categories->isEmpty())
<div class="table">
	<table style="width: 100%">
		<thead>
			<tr>
				<th>Category</th>
				<th>Annual Leave Days</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($leave_categories as $leave_category)
			<tr>
				<td>{{ $leave_category->name }} Leave</td>
				<td>{{ $leave_category->annual_leave_days }} day/s</td>
				<td class="settings"> 
					<select onchange="location = this.value;" class="settings">
						<option value="" disabled selected hidden>Settings</option>
						<option value="/leave_categories/{{ $leave_category->id }}/edit">
							Edit
						</option>
						<option value="/leave_categories/{{ $leave_category->id }}">
							Show
						</option>
						<option value="/leave_categories/{{ $leave_category->id }}/delete">
							Delete
						</option>
					</select>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection