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
<form class="filters-box" method="POST" action="/admin/deductible-records/store">
	@method('PUT')
	@csrf
	<label for="deductible">Deductible</label>
	<select name="type" id="type">
		@foreach($deductibles as $deductible)
			@if($deductibleRecords->first()->deductible_id == $deductible->id)
			<option value="{{ $deductible->type }}" selected>{{ $deductible->type }}</option>
			@else
			<option value="{{ $deductible->type }}">{{ $deductible->type }}</option>
			@endif
		@endforeach
	</select>
	<label for="date">Month & Year</label>
	<input type="month" id="date" name="date" value="{{ substr($deductibleRecords->first()->date, 0, 7) }}">
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
			@foreach($deductibleRecords as $deductibleRecord)
				<tr>
					<td>{{ $deductibleRecord->first_name }} {{ $deductibleRecord->last_name }}</td>
					<td>
					@if($deductibleRecord->is_deducted) 
					Deducted
					@else
					Not Deducted
					@endif
					</td>
					<td>Php {{ $deductibleRecord->deduction_amount }}</td>
					<!-- (DeductibleRecords table has no primary key but considers these three parameters as its composite primary keys) -->
					<td><a class="edit" href="/admin/deductible-records/{{ $deductibleRecord->date }}/{{ $deductibleRecord->employee_id }}/{{ $deductibleRecord->deductible_id }}/edit">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection