@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection
@csrf
@section('page')
<span class="gray">Leave</span> Categories Form
@endsection
@section('filters')
 <div class="container">
 	<form method="POST", action="/admin/leaves-categories/store">
 		@csrf
  	<div class="form-group">
    	<label for="leaveName">Name of Leave ->></label>
    	<input type="text" name="leave_name" id="name-leave"
    	required placeholder="Type the name of the leave">
        @include('layouts.errors')
    </div>
    <div class="form-group">
    	<label for="daysOfLeave">Annual Leaves Day ->></label>
    	<input type="days" name="annual_leavedays" id="days-leave"
    	required placeholder="Input days of proposed leave">
        @include('layouts.errors')
    </div>
    <button type="submit" class="btn btnprimary">Submit</button>
 </div>
@endsection

