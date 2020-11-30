@extends('layouts.login')

@section('title')
TrackPay - Admin Login
@endsection

@section('form')
<form class="login-form" method="POST" action="/login">
	@csrf
	<h1>Admin Login</h1>
	<input type="email" id="email" name="email" placeholder="Input email address" required>
	<input type="password" id="password" name="password" placeholder="Input password" required>
	<input type="submit" value="Login" style="width: 100%;">
</form>
<div class="back">
  <a href="/">HOME</a>
</div>
@endsection
