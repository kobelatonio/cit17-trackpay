
@section('content')
<button class="add">Add leave application</button>
<div class="container">
	<table class="table">

@section('table')
<div class="table">
	<table style="width:100%">
		<thread>
		<tr>
			<th>Employee Name</th>
			<th>Leave Category</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th>Reason for Rejection</th>
			<th>Settings</th>
		</tr>
</thread>
<tbody>
	@foreach($leaves-applications as $leave)
	<tr>
		<td>{{ $leave->employeeName}}</td>
		<td>{{ $leave->leave category}}</td>
		<td>{{ $leave->startDate}}</td>
		<td>{{ $leave->endDate}}</td>
		<td>{{ $leave->status}}</td>
		<td>{{ $leave->reason}}</td>

				<a href ="/admin/leaves_applications/{{$leave->id}}"><button class="edit">Edit</button>
				<a href ="/admin/leaves_applications/{{$leave->id}}""><button class="edit">Show</button>

				<form method="POST" action="/admin/leaves_applications/{{$leaves->id}}"> @method('DELETE')
					@csrf
					<button class="delete">Delete</button>
				
				</form>

	</tr>
</tbody>
@endsection
