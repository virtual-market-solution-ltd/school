@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col col-md-2 col-lg-2 col-xl-2"></div>

            
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>School ID</th>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($holidays as $row)
                                    <tr>
                                        <td>{!! $row->id !!}</td>
                                        <td>{!! Auth::user()->schools->school_id !!}</td>
                                        <td>{!! $row->holiday_date  !!}</td>
                                        <td>{!! $row->title  !!}</td>
                                        <td>
                                            <a href=""><button class="btn btn-primary">Edit</button></a>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <br>
            </div>
            
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Add New Holiday</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('holiday.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Holiday Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="holiday_date" id="holiday_date">
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- end row -->


        
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection