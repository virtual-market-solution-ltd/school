@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Exam Routine  
                            @if(Auth::user()->roles_id == 2)
                            <a href="{{ route('examroutine.create') }}"><button class="btn btn-primary">Add New</button></a>
                            @endif
                        </h4>
                        <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>School Name</th>
                                    <th>Exam Name</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Subject Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td style="width:5%">
                                            {!! $exam->id !!}
                                        </td>
                                        <td style="">
                                        {!! $exam->schools->school_id !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->exam_name !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->school_classes->name !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->school_sections->name !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->school_subjects->name !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->date !!}
                                        </td>
                                        <td style="">
                                            {!! $exam->time !!}
                                        </td>

                                        <td>
                                            <a href="/examroutine/{!! $exam->id !!}/edit">
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