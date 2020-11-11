@extend('layouts.master')
@section('title')
TrackPay - Job Positions
@endsection
@csrf
@section('page')
<span class='gray'>Job</span>Positions
@endsection
@section('filters')
<div class="container">
	<h5>Add a Job Position</h5>
	<form method="POST" action="/admin/positions/{{$positions->id}}">
		@csrf
		<div class="form-group">
			<label for="ExampleInputEmail">Position Title</label>
			<select class="custome-select" name="Position Title">
				@foreach($Position Title as $Position Title)
				@if($PositionTitle == $positions->PositionTitle)
				<option value="{{$Position Title}}"selected >{{Position Title}}</option>
				@else
				<option value="{{$Position Title}}">{{Position Title}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="ExampleInputEmail">Monthly Salary</label>
			<input type="text" class="form-control" id="ExampleInputEmail" name="Monthly Salary" value="{{ $positions->number }}">
		</div>

		<div class="form-group">
			<label for="ExampleInputEmail">Shift Start</label>
			<input type="time" class="form-control" id="ExampleInputEmail" name="Shift Start">

		<div class="form-group">
			<label for="ExampleInputEmail">Shift End</label>
			<input type="time" class="form-control" id="ExampleInputEmail" name="Shift End">

		</div>
		<button class="add">Add a Job Position</button>
	</form>
</div>
@endsection