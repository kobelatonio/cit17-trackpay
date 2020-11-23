@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection
@csrf
@section('page')
<span class="gray">Leave</span> Categories Update Form
@endsection
@section('filters')
 <div class="container">
 	<form method="POST", action="/admin/leaves-categories/{{$id->id}}">
        @method('PUT')
 		@csrf
  	<div class="form-group">

    	<label for="exampleInputEmail1">Name of Leave ->></label>

    	<input type="text" class="form-control" name="leave_name" id-"exampleInputPassword1"
    	required value="{{ $id->name}}" placeholder="Name of the leave">
        @include('layouts.errors')
    </div>

    <div class="form-group">
    	<label for="exampleInputEmail1">Annual Leaves Day ->></label>
    	<input type="text" class="form-control" name="annual_leavedays" id-"exampleInputPassword1"
    	value="{{$id->annual_leavedays}}"
        required placeholder="Number of days proposed">
        @include('layouts.errors')
    </div>
    <button type="submit" class="btn btnprimary">Submit</button>
 </div>
@endsection

