@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
Leave Applications
@endsection

@section('addbtn')
<div>
	<a class="add" href="/leave_applications/create">Add a leave application</a>
	@include('layouts.errors')
</div>

@endsection

@section('table')
@if(!$leave_applications->isEmpty())
<div class="table">
	<table>
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
					{{ $leave_application->employee->full_name }}
				</td>
				<td>
					{{ $leave_application->leave_category->name }} Leave
				</td>
				<td>{{ date('M j, Y', strtotime($leave_application->start_date)) }}</td>
				<td>{{ date('M j, Y', strtotime($leave_application->end_date))}}</td>
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