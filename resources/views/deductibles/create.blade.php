@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
@endsection

@section('addbtn')
<div class="container">
	<h5>Add a Deductible</h5>
	<form method="POST" action="/admin/deductibles">
		@csrf
		<div class="form-group">
			<label for="exampleInputEmail">Type</label>
			<select class="custome-select" name="type">
				@foreach($types as $type)
				<option value="{{$type}}">{{$type}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Percentage</label>
			<input type="text" class="form-control" id="exampleInputEmail" name="percentage">
		</div>
		<button class="add">Add a deductible</button>
	</form>
</div>

@endsection

