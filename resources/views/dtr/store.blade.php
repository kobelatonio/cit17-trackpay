@extends('layouts.master')

@section('title')
TrackPay - Daily Time Record
@endsection

@section('page')
<span class="gray">Daily Time </span> Record
@endsection

@section('filters')
<div class="filters">
	<h1 class="filters-title">SEARCH FILTER</h1>
	<form class="filters-box" action="/admin/dtr/store" method="POST">
		@method('PUT')
		@csrf
		<label for="date">Date</label>
		<input type="date" id="date" name="date" value="{{ $dtrFiltered->first()->date }}">
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
					<td>{{ $dtr->first_name }} {{ $dtr->last_name }}</td>
					<td>{{ $dtr->shift_start }}</td>
					<td>{{ $dtr->shift_end }}</td>
					<td>
						@if(is_null($dtr->time_in))
						-
						@else
						{{ $dtr->time_in }}
						@endif
					</td>
					<td>
						@if(is_null($dtr->time_out))
						-
						@else
						{{ $dtr->time_out }}
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
						{{ $dtr->hours_worked }}
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection