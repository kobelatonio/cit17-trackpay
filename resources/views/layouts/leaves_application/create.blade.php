@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="col-md-2 col-md-offset-10">
                                <a href="{{route('add_leave')}}" class="btn btn-success">Add Leave</a>
                            </div>
                        </div>
                            <hr>
                        <div class="col-md-12">
                            <table id="example" class="table table-hover table-responsive" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Leave Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leave_list as $leave)

                                    <tr>
                                        <th>{{ $leave->name }}</th>
                                        <th>{{ $leave->startDate}}</th>
                                        <th>{{ $leave->endDate}}</th>
                                        
                                      
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
@section('js_link')
{{--    <script src="{{ asset('public/js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>--}}
@endsection