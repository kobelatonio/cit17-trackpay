@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
<span class="gray">Edit - </span>{{ $deductible->type }} Deductible
@endsection

@section('content')
<form method="POST" action="/deductibles/{{ $deductible->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="type">Deductible Type :</label>
	<input type="text" name="type" value="{{ $deductible->type }}" autofocus required><br>
	<label for="percentage">Percentage :</label>
	<input type="number" name="percentage" step="0.01" value="{{ $deductible->percentage }}"required>%<br>
	<input type="submit" value="Submit">
	@include('layouts.errors')
</form>
@endsection