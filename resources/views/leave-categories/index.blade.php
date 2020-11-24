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
<div class="table">
	<table style="width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Leave Category</th>
				<th>Annual Leave Days</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			@foreach($leaveCategories as $leaveCategory)
			<tr>
				<td>{{ $leaveCategory->id}}</td>
				<td>{{ $leaveCategory->name}}</td>
				<td>{{ $leaveCategory->annual_leave_days}}</td>
				<td>
					<a href="/admin/leaves-categories/{{ $leaveCategory->id }}">
						Show
					</a>	
					 | 
					<a href="/admin/leaves-categories/{{ $leaveCategory->id}}/edit">Edit</a>
					 | 
					<form action="/admin/leaves-categories/{{$leaveCategory->id}}" method='POST'>
						@method('DELETE')
						@csrf
						<button type="submit">Delete</button>
					</form>
					


				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection