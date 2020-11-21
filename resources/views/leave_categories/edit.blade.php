@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection

@section('page')
<span class="gray">Edit - </span>{{ ucwords($leave_category->name) }} Leave
@endsection

@section('content')
<form method="POST" action="/leave_categories/{{ $leave_category->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="name">Category Name :</label>
	<input type="text" name="name" value="{{ $leave_category->name }}" autofocus><br>
	<label for="annual_leave_days">Annual Leave Days :</label>
	<input type="number" name="annual_leave_days" value="{{ $leave_category->annual_leave_days }}"><br>
	<input type="submit" value="Submit">
</form>
@endsection