@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
Leave Applications
@endsection

@section('addbtn')
<a class="add" href="/leave_applications/create">Add a leave application</a>
@endsection

@section('table')
@if(!$leave_applications->isEmpty())
<div class="table">
	<table style="width: 100%">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Leave Category</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Reason for Rejection</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($leave_applications as $leave_application)
			<tr>
				<td>
					@foreach($employees as $employee)
					{{ $leave_application->employee_id == $employee->id ? $employee->first_name." ".$employee->last_name : ""}}
					@endforeach
				</td>
				<td>
					@foreach($leave_categories as $leave_category)
					{{ $leave_application->leave_category_id == $leave_category->id ? $leave_category->name : ""}}
					@endforeach
				</td>
				<td>{{ $leave_application->start_date}}</td>
				<td>{{ $leave_application->end_date}}</td>
				<td>{{ $leave_application->status}}</td>
				<td>{{ $leave_application->reason_for_rejection}}</td>
				<td class="settings"> 
					<a class="edit" href="/leave_applications/{{ $leave_application->id }}/edit">Edit</a>
					<a class="show" href="/leave_applications/{{ $leave_application->id }}">Show</a>
					<form method='POST' action='/leave_applications/{{ $leave_application->id }}'>
						@method('DELETE')
						@csrf
						<input type="submit" class="delete" value="Delete">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection