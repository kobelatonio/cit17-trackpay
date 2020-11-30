@extends('layouts.login')

@section('title')
TrackPay - Change Password
@endsection

@section('form')
<div class="forms">
	<form class="login-form" method="POST" action="/password/update">
		@method('PUT')
		@csrf
		<h1>Change Password</h1>
		<select name="user_type" autofocus required>
			<option value="" disabled selected hidden>Choose user type</option>
			<option value="1">Admin</option>
			<option value="2">Employee</option>
		</select>
		<input type="email" name="email" placeholder="Enter email address" required>
		<input type="password" name="old_password" placeholder="Old password" required>
		<input type="password" id="new_password" name="new_password" placeholder="New password" required onkeyup="check()">
		<span id='check_password_length'></span>
		<input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm new password" required onkeyup="check()">
		<span id='check_password_match'></span>
		<div class="buttons">
			<input type="submit" value="Change Password" id="password_button">
		</div>
	</form>
</div>
<div class="back">
  <a href="/">HOME</a>
</div>
@endsection