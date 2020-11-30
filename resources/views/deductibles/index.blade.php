@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
@endsection

@section('addbtn')
<a class="add" href="/deductibles/create">Add a deductible</a>
@endsection

@section('table')
@if(!$deductibles->isEmpty())
<div class="table">
	<table style="width: 100%">
		<thead>
			<tr>
				<th>Deductible Type</th>
				<th>Percentage</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($deductibles as $deductible)
			<tr>
				<td>{{ $deductible->type }}</td>
				<td>{{ $deductible->percentage }}%</td>
				<td class="settings"> 
					<select onchange="location = this.value;" class="settings">
						<option value="" disabled selected hidden>Settings</option>
						<option value="/deductibles/{{ $deductible->id }}/edit">
							Edit
						</option>
						<option value="/deductibles/{{ $deductible->id }}">
							Show
						</option>
						<option value="/deductibles/{{ $deductible->id }}/delete">
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