@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection

@section('page')
<span class="gray">Create - </span>Leave Category
@endsection

@section('content')
<form method="POST" action="/leave_categories/" class="edit-form"> 
	@csrf 
	<label for="name">Category Name :</label>
	<input type="text" name="name" id="leave" placeholder="Enter category name" autofocus required>Leave<br>
	<label for="annual_leave_days">Annual Leave Days</label>
	<input type="number" name="annual_leave_days" placeholder="Enter no. of days" required><br>
	<input type="submit" value="Submit">
	@include('layouts.errors')
</form>
@endsection