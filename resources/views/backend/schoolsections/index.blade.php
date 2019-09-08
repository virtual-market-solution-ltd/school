@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Section List  <a href="{{ route('section.create') }}"><button class="btn btn-primary">Add New</button></a></h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $section->id !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $section->name !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $section->school_classes->name !!}
                                        </td>
                                        <td>
                                            <a href="/section/{!! $section->id !!}/edit">
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