@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
<span class="gray">Create - </span>Deductible
@endsection

@section('content')
<form method="POST" action="/deductibles/" class="edit-form"> 
	@csrf 
	<label for="type">Deductible Type :</label>
	<input type="text" name="type" placeholder="Enter type" autofocus required><br>
	<label for="percentage">Percentage :</label>
	<input type="number" name="percentage" step="0.01" placeholder="Enter percentage" required><br>
	<input type="submit" value="Submit">
@include('layouts.errors')
</form>
@endsection