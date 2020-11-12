@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
<span class="gray">Edit - </span>{{ $deductible->type }} Deductible
@endsection

@section('content')
<form method="POST" action="/admin/deductibles/{{ $deductible->id }}" class="edit-form"> 
	@method('PUT')
	@csrf 
	<label for="type">Deductible Type :</label>
	<input type="text" name="type" value="{{ $deductible->type }}" autofocus><br>
	<label for="percentage">Percentage :</label>
	<input type="number" name="percentage" step="0.01" value="{{ $deductible->percentage }}"><br>
	<input type="submit" value="Submit">
</form>
@endsection