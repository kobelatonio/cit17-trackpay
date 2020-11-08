@extends('layouts.login')

@section('title')
TrackPay - Employee Time In/Out
@endsection

@section('form')
<div class="forms">
	<form class="login-form" method="POST" action="/time-entry/storeOrUpdate">
		@method('PUT')
		@csrf
		<h1>Time In</h1>
		<input type="text" id="username" name="username" placeholder="Input username">
		<input type="password" id="password" name="password" placeholder="Input password">
		<div class="buttons">
			<input type="submit" value="Time In">
		</div>
	</form>

	<form class="login-form" method="POST" action="/time-entry/update">
		@method('PUT')
		@csrf
		<h1>Time Out</h1>
		<input type="text" id="username" name="username" placeholder="Input username">
		<input type="password" id="password" name="password" placeholder="Input password">
		<div class="buttons">
			<input type="submit" value="Time Out">
		</div>
	</form>
</div>

@endsection