@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
Employees
@endsection

@section('addbtn')
<a class="add" href="/register">Go to Employee Register</a>
@endsection

@section('table')
@if(!$employees->isEmpty())
<div class="table">
	<table style="width:100%">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Position</th>
				<th>Contact No.</th>
				<th>Email Address</th>
				<th>Birthdate</th>
				<th>Gender</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $employee)
				<tr>
					<td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
					<td>
						@foreach($positions as $position) 
							{{ $employee->position_id == $position->id ? $position->title : '' }}
						@endforeach
					</td>
					<td>{{ $employee->contact_number }}</td>
					<td>{{ $employee->email_address }}</td>
					<td>{{ $employee->birthdate }}</td>
					<td>{{ $employee->gender }}</td>
					<td class="settings">
						<a class="edit" href="/employees/{{ $employee->id }}/edit">Edit</a>
						<a class="show" href="/employees/{{ $employee->id }}">Show</a>
						<form method='POST' action='/employees/{{ $employee->id }}'>
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