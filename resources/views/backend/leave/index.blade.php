@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Leave Application <a href="/leave-application/create"><button class="btn btn-sm btn-primary">New</button></a></h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed text-center" id="">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Event</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    @if(Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3 )
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leave as $row)
                                    <tr>
                                        <td>#</td>
                                        <td>{!! $row->start_date !!}</td>
                                        <td>{!! $row->end_date!!}</td>
                                        <td>{!! $row->reason !!}</td>
                                        <td>{!! $row->description !!}</td>
                                        <td>
                                            @if($row->status == 0) <button class="btn btn-sm btn-danger">Pending</button>  @endif
                                            @if($row->status == 1) <button class="btn btn-sm btn-primary">Approved</button>  @endif
                                        </td>
                                        @if(Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3 )
                                        <td>
                                            <a href="/leave-application/{!! $row->id !!}"><button class="btn btn-sm btn-warning">Approve</button></a>
                                        </td>
                                        @endif
                                    </tr>
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


@section('footer')


@endsection