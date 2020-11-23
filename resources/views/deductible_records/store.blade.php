@extends('layouts.master')

@section('title')
TrackPay - Deductible Records
@endsection

@section('page')
<span class="gray">Deductible</span> Records
@endsection

@section('search-filters')
SEARCH FILTERS
@endsection

@section('filters')
<form class="filters-box" method="POST" action="/admin/deductible_records/store">
	@csrf
	<label for="deductible">Deductible</label>
	<select name="type" id="type">
		@foreach($deductibles as $deductible)
			@if($deductible_records->first()->deductible_id == $deductible->id)
			<option value="{{ $deductible->type }}" selected>{{ $deductible->type }}</option>
			@else
			<option value="{{ $deductible->type }}">{{ $deductible->type }}</option>
			@endif
		@endforeach
	</select>
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" value="{{ substr($deductible_records->first()->date, 0, 7) }}" max="{{ date('Y-m') }}">
	<input type="submit" value="Submit">
</form>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Is Deducted</th>
				<th>Deductible Amount</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($deductible_records as $deductible_record)
				<tr>
					<td>
						@foreach($employees as $employee)
						@if($employee->id == $deductible_record->employee_id)
						{{ $employee->first_name }} {{ $employee->last_name }}
						@endif
						@endforeach
					</td>
					<td>
					@if($deductible_record->is_deducted) 
					Deducted
					@else
					Not Deducted
					@endif
					</td>
					<td>Php {{ $deductible_record->deduction_amount }}</td>
					<td><a class="edit" href="/admin/deductible_records/{{ $deductible_record->id }}/edit">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection