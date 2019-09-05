@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Upcoming Events</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $event->id !!}
                                        </td>
                                        <td style="width:10%">
                                            {!! $event->title !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->description !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->start_time !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->end_time !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->start_date !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->end_date !!}
                                        </td>
                                        <td>
                                            <a href="/events/{!! $event->id !!}/edit">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Previous Events</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $event->id !!}
                                        </td>
                                        <td style="width:10%">
                                            {!! $event->title !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->description !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->start_time !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->end_time !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->start_date !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $event->end_date !!}
                                        </td>
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