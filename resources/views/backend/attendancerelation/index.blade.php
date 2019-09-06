@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Class List  <a href="class/create"><button class="btn btn-primary">Add New</button></a></h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Teacher</th>
                                    <th>Student</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td></td>
                                        <td style="width:5%">
                                            {!! $row->school_classes->name !!}
                                        </td>
                                        <td style="width:25%">
                                        {!! $row->school_sections->name !!}
                                        </td>
                                        <td style="width:25%">
                                        {!! $row->teacher->fullname !!}
                                        </td>
                                        <td style="width:25%">
                                        {!! $row->student->fullname !!}
                                        </td>
                                        <td>
                                            <a href="/section/{!! $row->id !!}/edit">
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
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection