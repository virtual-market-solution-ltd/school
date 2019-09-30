@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Leave Application</h4>
                        <hr>
                        <form action="{{ route('leave-application.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input class="form-control" type="date" name="end_date">
                                </div>
                            <div class="form-group">
                                <label for="">To</label>
                                <select class="form-control" name="teachers_id" id="">
                                    @foreach($teacher_list as $row)
                                    <option value="{!! $row->id !!}">{!! $row->fullname !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Reason</label>
                                <input class="form-control" type="text" name="reason">
                            </div>
                            <div class="form-group">
                                <label for="">Subject</label>
                                <input class="form-control" type="text" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="1"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')


@endsection