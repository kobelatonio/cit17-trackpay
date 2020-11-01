@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection

@section('page')
<span class="gray">Leave</span> Categories
@endsection

@section('addbtn')
<button class="add">Add a leave category</button>
@endsection

@section('table')
<div class="table">
	<table style="width:100%">
		<tr>
			<th>Leave Category</th>
			<th>Annual Leave Days</th>
			<th>Settings</th>
		</tr>
		<tr>
			<td>Sick</td>
			<td>15 day/s</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
		<tr>
			<td>Vacation</td>
			<td>15 day/s</td>
			<td>
				<button class="edit">Edit</button>
				<button class="delete">Delete</button>
			</td>
		</tr>
	</table>
</div>
@endsection