@extends(layouts.master)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Leave List</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('mess'))
                            <div class="alert alert-danger">
                                {{ session('mess') }}
                            </div>
                        @endif

                        <hr>
                        <div class="col-md-12">
                            <table id="example" class="table table-hover table-responsive" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Leave Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Reason for Rejection</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leave_list as $leave)

                                    <tr>
                                        <th>{{ $leave->username }}</th>
                                        <th>{{ $leave->name }}</th>
                                        <th>{{ $leave->leave_from }}</th>
                                        <th>{{ $leave->leave_till }}</th>
                                        <th>
                                            <a href="{{route('leave_approve',['leave_id'=>$leave->leave_id])}}" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                                            <a href="{{route('leave_cancel',['leave_id'=>$leave->leave_id])}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                        </th>
                                    </tr>
                                @endforeach;
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
