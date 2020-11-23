@extends('layouts.master')

@section('title')
TrackPay - Deductible Records
@endsection

@section('page')
<span class="gray">Edit - </span>Deductible Record
@endsection

@section('filters')
<form class="filters-box" method="POST" action="/admin/deductible_records/{{ $deductible_record->id }}">
	@method('PUT')
	@csrf
	<label for="date">Date : </label>
	<input type="month" id="date" name="date" value="{{ substr($deductible_record->date, 0, 7) }}" readonly>
	<label for="is_deducted">Is Deducted : </label>
	<input type="checkbox" id="is_deducted" name="is_deducted" autofocus {{ $deductible_record->is_deducted ? "checked" : "" }}>
	<input type="submit" value="Submit">
</form>
@endsection