@extends('layouts.login')

@section('title')
TrackPay - Employee Time In/Out
@endsection

@section('form')
<div class="forms">
	<form class="login-form" method="POST" action="/time-entry/storeOrUpdate">
		@method('PUT')
		@csrf
		<h1>Time In/Out</h1>
		<select name="entry" style="width: 100%;">
			<option value="in" selected>Time In</option>
			<option value="out">Time Out</option>
		</select>
		<input type="email" id="email_address" name="email" placeholder="Input email address">
		<input type="password" id="password" name="password" placeholder="Input password">
		<div class="buttons">
			<input type="submit" value="Submit">
		</div>
	</form>
</div>
@endsection