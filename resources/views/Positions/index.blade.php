@extends('layout.master')
@section('table')
<div class="table">
	<table style="width: 60%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Position title</th>
				<th>Monthly Salary</th>
				<th>Shift Start</th>
				<th>Shift End</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($positions as $positions)
			<tr>
				<td>{{ $positions->id}}</td>
				<td>{{ $positions->Title}}</td>
				<td>{{ $positions->Monthly Salary}}</td>
				<td>{{ $positions->Shift Start}}</td>
				<td>{{ $positions->Shift End}}</td>
			</tr>
		</tbody>
	
</div>