@extends('layouts.login')

@section('title')
TrackPay - Admin Login
@endsection

@section('form')
<form class="login-form">
	<h1>Admin Login</h1>
	<input type="text" id="username" name="username" placeholder="Input username">
	<input type="password" id="password" name="password" placeholder="Input password">
	<input type="submit" value="Login" style="width: 100%;">
</form>
@endsection