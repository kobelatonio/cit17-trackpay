@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
<span class="gray">Edit - </span>Leave Application
@endsection

@section('content')
<form method="POST" action="/leave_applications/{{ $leave_application->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="employee_id">Employee :</label>
	<select name="employee_id" autofocus>
	@foreach($employees as $employee)
		@if($employee->id == $leave_application->employee_id)
		<option value="{{ $employee->id }}" selected>{{ $employee->first_name }} {{ $employee->last_name }}</option>
		@else
		<option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
		@endif
	@endforeach
	</select><br>
	<label for="leave_category_id">Leave Category :</label>
	<select name="leave_category_id">
	@foreach($leave_categories as $leave_category)
		<option value="{{ $leave_category->id }}" {{ $leave_category->id == $leave_application->leave_category_id ? "selected" : "" }}>{{ $leave_category->name }} Leave</option>
	@endforeach
	</select><br>
	<label for="start_date">Start Date :</label>
	<input type="date" name="start_date" value="{{ $leave_application->start_date }}" min="{{ date('Y-m-d') }}" onchange="updateMinDate(this.value)"><br>
	<label for="end_date">End Date :</label>
	<input type="date" name="end_date" value="{{ $leave_application->end_date }}" id="minDate"><br>
	<label for="status">Status :</label>
	<input type="text" name="status" value="{{ $leave_application->status }}"><br>
	<label for="status">If rejected, enter reason :</label>
	<input type="text" name="reason_for_rejection" value="{{ $leave_application->reason_for_rejection }}"><br>
	<input type="submit" value="Submit">
	@include('layouts.errors')
</form>
@endsection