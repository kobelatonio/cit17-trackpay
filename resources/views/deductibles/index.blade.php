@extends('layouts.master')

@section('title')
TrackPay - Deductibles
@endsection

@section('page')
Deductibles
@endsection

@section('addbtn')
<button class="add">Add a deductible</button>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<thead>
		<tr>
			<th>ID</th>
			<th>Type</th>
			<th>Percentage</th>
			<th>Settings</th>
		</tr>
		</thead>
		<tbody>
			@foreach($deductibles as $deductible)
			<tr>
				<td>{{$deductibles->id}}</td>
				<td>{{$deductibles->type}}</td>
				<td>{{$deductibles->percentage}}</td>
				<td>
					<a href="/admin/deductibles/{{$deductible->id}}">
						<button class="edit">Show</button>
					</a>
					<a href="/admin/deductibles/{{$deductible->id}}/edit"><button class="edit">Edit</button></a>
					<form method="POST" action="/admin/deductibles/{{$deductible->id}}">
						@method('DELETE')
						@csrf
						<button class="delete">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>		
		
	</table>
</div>
@endsection