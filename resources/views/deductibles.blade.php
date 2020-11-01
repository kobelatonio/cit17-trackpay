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
		<tr>
			<th>Type</th>
			<th>Percentage</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>GSIS</td>
			<td>9%</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
		<tr>
			<td>PhilHealth</td>
			<td>1.5%</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
		<tr>
			<td>Pag-IBIG</td>
			<td>2%</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
	</table>
</div>
@endsection