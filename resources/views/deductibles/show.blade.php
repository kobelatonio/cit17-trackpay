@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
<div class='container'>
	<h5>Type: {{$deductible->type}}</h5>
	<h5>Type: {{$deductible->percentage}}</h5>
</div>
@endsection

