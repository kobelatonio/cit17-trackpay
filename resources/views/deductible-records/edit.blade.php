@extends('layouts.master')

@section('title')
TrackPay - Deductible Records
@endsection

@section('page')
<span class="gray">Edit - </span>{{ $deductible->type }} Deductible <span class="gray">of</span> {{ $employee->first_name }} {{ $employee->last_name }}
@endsection

@section('filters')
<form class="filters-box" method="POST" action="/admin/deductible-records/{{ $deductibleRecord->date }}/{{ $deductibleRecord->employee_id }}/{{ $deductibleRecord->deductible_id }}">
	@method('PUT')
	@csrf
	<label for="date">Date : </label>
	<input type="month" id="date" name="date" value="{{ substr($deductibleRecord->date, 0, 7) }}" readonly>
	<label for="is_deducted">Is Deducted : </label>
	<input type="checkbox" id="is_deducted" name="is_deducted" {{ $deductibleRecord->is_deducted ? "checked" : "" }}>
	<input type="submit" value="Submit">
</form>
@endsection