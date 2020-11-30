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
				<td>{{ date('h:i A', strtotime($position->shift_start)) }}</td>
				<td>{{ date('h:i A', strtotime($position->shift_end)) }}</td>
				<td class="settings"> 
					<select onchange="location = this.value;" class="settings">
						<option value="" disabled selected hidden>Settings</option>
						<option value="/positions/{{ $position->id }}/edit">
							Edit
						</option>
						<option value="/positions/{{ $position->id }}">
							Show
						</option>
						<option value="/positions/{{ $position->id }}/delete">
							Delete
						</option>
					</select>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection