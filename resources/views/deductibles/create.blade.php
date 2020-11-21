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
	<input type="text" name="type" placeholder="Enter type" autofocus><br>
	<label for="percentage">Percentage :</label>
	<input type="number" name="percentage" step="0.01" placeholder="Enter percentage"><br>
	<input type="submit" value="Submit">
</form>
@endsection