@extends('layout.master')
@section('table')
<div class="table">
	<table style="width: 60%">
		<div>Title: {{ $positions->title}}</div>
		<div>Monthly Salary: {{ $positions->monthly salary}}</div>
		<div>Shift Start: {{ $positions->shift start}}</div>
		<div>End start: {{ $positions->end start}}</div>
</div>
@endsection