@extends('layouts.master')

@section('title')
TrackPay - Job Positions
@endsection

@section('page')
Job Positions
@endsection

@section('addbtn')
<a class="add" href="/positions/create">Add a job position</a>
@endsection

@section('table')
@if(!$positions->isEmpty())
<div class="table">
	<table style="width: 100%">
		<thead>
			<tr>
				<th>Position title</th>
				<th>Monthly Salary</th>
				<th>Shift Start</th>
				<th>Shift End</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($positions as $position)
			<tr>
				<td>{{ $position->title}}</td>
				<td>Php {{ number_format($position->monthly_salary, 2, '.', ',') }}</td>
				<td>{{ $position->shift_start}}</td>
				<td>{{ $position->shift_end}}</td>
				<td class="settings"> 
					<a class="edit" href="/positions/{{ $position->id }}/edit">Edit</a>
					<a class="show" href="/positions/{{ $position->id }}">Show</a>
					<form method='POST' action='/positions/{{ $position->id }}'>
						@method('DELETE')
						@csrf
						<input type="submit" class="delete" value="Delete">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection