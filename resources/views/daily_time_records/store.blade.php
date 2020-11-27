@extends('layouts.master')

@section('title')
TrackPay - Daily Time Record
@endsection

@section('page')
<span class="gray">Daily Time Record - </span> {{ date('M j, Y', strtotime($dtrFiltered->first()->date)) }}
@endsection

@section('filters')
<div class="filters">
	<h1 class="filters-title">SEARCH FILTER</h1>
	<form class="filters-box" action="/daily_time_records/store" method="POST">
		@method('PUT')
		@csrf
		<label for="date">Date</label>
		<input type="date" id="date" name="date" value="{{ $dtrFiltered->first()->date }}" max="{{ date('Y-m-d') }}">
		<input type="submit" value="Submit">
	</form>
</div>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Shift Start</th>
				<th>Shift End</th>
				<th>Time In</th>
				<th>Time Out</th>
				<th>Minutes Late</th>
				<th>Remarks</th>
				<th>Hours Worked</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dtrFiltered as $dtr)
				<tr>
					<td>{{ $dtr->employee->full_name }}</td>
					<td>{{ date('h:i A', strtotime($dtr->shift_start)) }}</td>
					<td>{{ date('h:i A', strtotime($dtr->shift_end)) }}</td>
					<td>
						@if(is_null($dtr->time_in))
						-
						@else
						{{ $dtr->formatted_time_in }}
						@endif
					</td>
					<td>
						@if(is_null($dtr->time_out))
						-
						@else
						{{ $dtr->formatted_time_out }}
						@endif
					</td>
					<td>
						@if(is_null($dtr->minutes_late))
						-
						@else
						{{ $dtr->minutes_late }} minute/s 
						@endif
					</td>
					<td>
						@if(is_null($dtr->remarks))
						-
						@else
						{{ $dtr->remarks }}
						@endif
					</td>
					<td>
						@if(is_null($dtr->hours_worked))
						-
						@else
						{{ $dtr->hours_worked }} hour/s
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection