@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Attendance</h4>
                        <hr>
                        <table class="table table-responsive-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Taken by</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($reports as $row)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $row->attendance_date !!}</td>
                                        <td>
                                            @php
                                               $fullname = \App\User::where('id',$row->taken_by)->first();     

                                            @endphp
                                            {!! $fullname->fullname !!}
                                        </td>
                                        <td>
                                            @if($row->attendance_status == 1)
                                                <button class="btn btn-success">P</button>
                                            @endif
                                            @if($row->attendance_status == 0)
                                                <button class="btn btn-danger">A</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection