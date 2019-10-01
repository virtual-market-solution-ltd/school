@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Transport Schedule</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Pick Up</th>
                                        <th>Drop</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transports as $row)
                                    <tr>
                                        <td>{!! $row->pickup !!}</td>
                                        <td>{!! $row->drop !!}</td>
                                        <td>{!! $row->saturday !!}</td>
                                        <td>{!! $row->sunday !!}</td>
                                        <td>{!! $row->monday !!}</td>
                                        <td>{!! $row->tuesday !!}</td>
                                        <td>{!! $row->wednesday !!}</td>
                                        <td>{!! $row->thursday !!}</td>
                                        <td>{!! $row->friday !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection