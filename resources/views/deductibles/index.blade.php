@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
@endsection

@section('addbtn')
<a class="add" href="/admin/deductibles/create">Add a deductible</a>
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
					<a class="edit" href="/admin/deductibles/{{ $deductible->id }}/edit">Edit</a>
					<a class="show" href="/admin/deductibles/{{ $deductible->id }}">Show</a>
					<form method='POST' action='/admin/deductibles/{{ $deductible->id }}'>
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