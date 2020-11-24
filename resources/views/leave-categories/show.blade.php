@extends('layouts.master')

@section('title')
TrackPay - Leave Categories
@endsection
@csrf
@section('page')
<span class="gray">Leave</span> Categories
@endsection

@section('addbtn')
<button class="add">
	<a href="/admin/leaves-categories/create">
Add a leave category
</a>
</button>
@endsection

@section('table')
<table>
	<thead>
		<tr>
			<td>Description of the Leave</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $id-> name}}</td>
			<td>{{ $id -> annual_leave_days}} days</td>
		</tr>
	</tbody>
</table>
@endsection