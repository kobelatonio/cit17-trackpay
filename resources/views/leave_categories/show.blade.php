@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection

@section('page')
<span class="gray">Show - </span>{{ ucwords($leave_category->name) }} Leave
@endsection

@section('content')
<form class="edit-form">
	<label for="name">Category Name :</label>
	<input type="text" name="name" value="{{ $leave_category->name }}" readonly><br>
	<label for="annual_leave_days">Annual Leave Days :</label>
	<input type="text" name="annual_leave_days" value="{{ $leave_category->annual_leave_days }}" readonly><br>
	<a class="edit" href="/admin/leave_categories">Back</a>
</form>
@endsection