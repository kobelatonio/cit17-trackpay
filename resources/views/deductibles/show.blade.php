@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
<span class="gray">Show - </span>{{ $deductible->type }} Deductible 
@endsection

@section('content')
<form class="edit-form">
	<label for="type">Deductible Type :</label>
	<input type="text" name="type" value="{{ $deductible->type }}" readonly><br>
	<label for="percentage">Percentage :</label>
	<input type="text" name="percentage" value="{{ $deductible->percentage}}%" readonly><br>
	<a class="edit" href="/admin/deductibles">Back</a>
</form>
@endsection