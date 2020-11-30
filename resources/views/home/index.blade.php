@extends('layouts.login')

@section('title')
TrackPay
@endsection

@section('form')
<div class="home">
	<a class="home" href="{{ url('/login') }}">Admin Login</a>
	<a class="home" href="{{ url('/time-entry') }}">Employee Time In/Out</a>
	<a class="home" href="{{ url('/password/edit') }}">Change Password</a>
</div>
@endsection