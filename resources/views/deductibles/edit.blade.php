@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
@endsection

@section('addbtn')
<div class="container">
	<h5>Edit a Deductible</h5>
	<form method="POST" action="/admin/deductibles/{{$deductible->id}}">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="exampleInputEmail">Type</label>
			<select class="custome-select" name="type">
				@foreach($types as $type)
				@if($type==$deductible->type)
				<option value="{{$type}}" selected>{{$type}}</option>
				@else
				<option value="{{$type}}">{{$type}}</option>
				@endforeach
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Percentage</label>
			<input type="text" class="form-control" id="exampleInputEmail" name="percentage" value="{{$deductible->percentage}}">
		</div>
		<button class="add">Add a deductible</button>
	</form>
</div>

@endsection

