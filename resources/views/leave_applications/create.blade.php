@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
<span class="gray">Create - </span>Leave Application
@endsection

@section('content')
<form method="POST" action="/admin/leave_applications/" class="edit-form"> 
	@csrf 
	<label for="employee_id">Employee :</label>
	<select name="employee_id" autofocus>
		<option value="" disabled selected hidden>Choose employee</option>
	@foreach($employees as $employee)
		<option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
	@endforeach
	</select><br>
	<label for="leave_category_id">Leave Category :</label>
	<select name="leave_category_id">
		<option value="" disabled selected hidden>Choose leave category</option>
	@foreach($leave_categories as $leave_category)
		<option value="{{ $leave_category->id }}">{{ $leave_category->name }}</option>
	@endforeach
	</select><br>
	<label for="start_date">Start Date :</label>
	<input type="date" name="start_date" placeholder="Enter start date"><br>
	<label for="end_date">End Date :</label>
	<input type="date" name="end_date" placeholder="Enter end date"><br>
	<label for="gender">Status :</label>
	<select name="status">
		<option value="" disabled selected hidden>Choose status</option>
		<option value="Pending">Pending</option>
		<option value="Rejected">Rejected</option>
		<option value="Approved">Approved</option>
	</select><br>
	<label for="reason_for_rejection">If rejected, enter reason :</label>
	<input type="text" name="reason_for_rejection" placeholder="Reason for rejection"><br>
	<input type="submit" value="Submit">
</form>
@endsection