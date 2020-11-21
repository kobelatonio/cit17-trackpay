@extends('layouts.login')

@section('title')
TrackPay - Employee Register
@endsection

@section('form')
<div class="forms">
	<form class="login-form register" method="POST" action="/register">
		@csrf
		<h1>Employee Register</h1>
		<input type="text" name="first_name" placeholder="Enter first name" autofocus>
		<input type="text" name="last_name" placeholder="Enter last name">
		<input type="text" name="contact_number" placeholder="Enter contact number">
		<input type="text" onfocus="(this.type='date')" name="birthdate" placeholder="Enter birthdate" max="{{ date('Y-m-d') }}">
		<select name="gender">
			<option value="" disabled selected hidden>Choose gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		<select name="position_id">
			<option value="" disabled selected hidden>Choose job position</option>
		@foreach($positions as $position)
			<option value="{{ $position->id }}">{{ $position->title }}</option>
		@endforeach
		</select>
		<input type="email" name="email_address" placeholder="Enter email address">
		<input type="password" name="password" placeholder="Enter password">
		<div class="buttons">
			<input type="submit" value="Submit">
		</div>
	</form>
</div>
@include('layouts.errors')
<div class="back">
  <a href="/">HOME</a>
</div>
@endsection