@extends('layouts.master')

@section('title')
TrackPay - Leave Applications
@endsection

@section('page')
<span class="gray">Show - </span>Leave Application
@endsection

@section('content')
<form class="edit-form">
	<label for="title">Employee :</label>
	@foreach($employees as $employee)
		@if($leave_application->employee_id == $employee->id)
		<input type="text" name="title" value="{{ $employee->first_name }} {{ $employee->last_name }}" readonly><br>
		@endif
	@endforeach
	<label for="title">Leave Category :</label>
	@foreach($leave_categories as $leave_category)
		@if($leave_application->leave_category_id == $leave_category->id)
		<input type="text" name="title" value="{{ $leave_category->name }} Leave" readonly><br>
		@endif
	@endforeach
	<label for="start_date">Start Date :</label>
	<input type="text" name="start_date" value="{{ date('F j, Y', strtotime($leave_application->start_date)) }}" readonly><br>
	<label for="end_date">End Date :</label>
	<input type="text" name="end_date" value="{{ date('F j, Y', strtotime($leave_application->end_date)) }}" readonly><br>
	<label for="status">Status :</label>
	<input type="text" name="status" value="{{ $leave_application->status }}" readonly><br>
	@if($leave_application->reason_for_rejection)
	<label for="reason_for_rejection">Reason for Rejection :</label>
	<input type="text" name="reason_for_rejection" value="{{ $leave_application->reason_for_rejection }}" readonly><br>
	@endif
	<a class="edit" href="/leave_applications">Back</a>
</form>
@endsection