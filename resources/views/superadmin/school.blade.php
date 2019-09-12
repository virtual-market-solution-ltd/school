@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">List of Schools <a href="/schools/create"><button class="btn btn-primary">Add New</button></a></h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($schools as $school)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $school->id !!}
                                        </td>
                                        <td style="width:10%">
                                            {!! $school->school_id !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $school['school_name'] !!}
                                        </td>
                                        <td style="overflow-wrap: break-word;">
                                            {{ $school['school_description'] }}
                                        </td>
                                        <td>
                                            <a href="/schools/{!! $school->id !!}/edit">
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