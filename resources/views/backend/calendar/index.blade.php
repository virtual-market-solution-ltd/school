@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Insert Academic Calendar</h4>
                        @if(session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="report_card">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Event</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="date">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="day">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="event">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary">Submit</button>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </form>
                        <hr>
                        <br>
                        <h4 class="mt-0 m-b-30 header-title">Academic Calendar</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed" id="report_card">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calendars as $row)
                                    <tr>
                                        <td>{!! $row->date !!}</td>
                                        <td>{!! $row->day!!}</td>
                                        <td>{!! $row->event !!}</td>
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