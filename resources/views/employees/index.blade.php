@extends('layouts.master')

@section('title')
TrackPay - Employees
@endsection

@section('page')
Employees
@endsection

@section('addbtn')
<div>
	<a class="add" href="/employees/create">Add an Employee</a>
	@include('layouts.errors')
</div>
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
					<td>{{ $employee->full_name }}</td>
					<td>
						{{ $employee->position->title }}
					</td>
					<td>{{ $employee->formatted_contact_number }}</td>
					<td>{{ $employee->email }}</td>
					<td>{{ date('F j, Y', strtotime($employee->birthdate)) }}</td>
					<td>{{ $employee->gender }}</td>
					<td class="settings">
						<select onchange="location = this.value;" class="settings">
							<option value="" disabled selected hidden>Settings</option>
							<option value="/employees/{{ $employee->id }}/edit">
								Edit
							</option>
							<option value="/employees/{{ $employee->id }}">
								Show
							</option>
							<option value="/employees/{{ $employee->id }}/delete">
								Delete
							</option>
						</select>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination">
	<div class="previous">{{ $employees->links() }}</div>
</div>
@endif
@endsection