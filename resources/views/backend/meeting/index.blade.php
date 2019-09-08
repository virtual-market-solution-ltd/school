@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col col-md-2 col-lg-2 col-xl-2">

            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->roles_id == 3)
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{!! $row->student->fullname  !!}</td>
                                        <td>{!! $row->date  !!}</td>
                                        <td>{!! $row->start_time  !!}</td>
                                        <td>{!! $row->end_time  !!}</td>
                                        <td>
                                            @if($row->status  == 0)
                                                <a href=""><button class="btn btn-warning">Pending</button></a>
                                            @endif    
                                            @if($row->status  == 1) 
                                                <a href=""><button class="btn btn-warning">Approved</button></a>
                                            @endif    
                                        </td>
                                        <td>
                                            <a href=""><button class="btn btn-primary">Edit</button></a>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>

                        @endif

                        @if(Auth::user()->roles_id == 4)
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>To</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{!! $row->teacher->fullname  !!}</td>
                                        <td>{!! $row->date  !!}</td>
                                        <td>{!! $row->start_time  !!}</td>
                                        <td>{!! $row->end_time  !!}</td>
                                        <td>
                                            @if($row->status  == 0)
                                                <a href=""><button class="btn btn-warning">Pending</button></a>
                                            @endif    
                                            @if($row->status  == 1) 
                                                <a href=""><button class="btn btn-warning">Approved</button></a>
                                            @endif    
                                        </td>
                                        <td>
                                            <a href=""><button class="btn btn-primary">Edit</button></a>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>

                        @endif





                    </div>
                </div>
            </div>
        </div>



        <!-- end row -->


        
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection