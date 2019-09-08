@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Subject List  <a href="{{ route('subject.create') }}"><button class="btn btn-primary">Add New</button></a></h4>
                        <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject Name</th>
                                    <th>Section Name</th>
                                    <th>Class Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $subject->id !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $subject->name !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $subject->school_sections->name !!}
                                        </td>
                                        <td style="width:25%">
                                            {!! $subject->school_classes->name !!}
                                        </td>

                                        <td>
                                            <a href="/subject/{!! $subject->id !!}/edit">
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

@section('footer')
<script>
/*
$(document).ready(function(){
    $("#datatable").DataTable(),
    $("#datatable-buttons").DataTable({
        lengthChange:!1,
        buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")});
*/
</script>
@endsection