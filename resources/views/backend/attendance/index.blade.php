@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            
                <div class="col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Take Attendance</h4>
                            @if(isset($message))
                                <p class="text-danger">{!! $message !!}</p>
                            @endif
                            <hr>
                            <form class="form-horizontal" action="{{ route('attendance.index') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label for="">School ID</label>
                                    <input class="form-control" type="text" name="schools_id" value="{{ Auth::user()->schools->school_id }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Select Class</label>
                                    <select class="form-control" name="school_classes_id" id="">
                                        @foreach($class_list as $list)
                                            <option value="{!! $list->id !!}">{!! $list->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Section</label>
                                    <select class="form-control" name="school_sections_id" id="">
                                        @foreach($section_list as $list)
                                            <option value="{!! $list->id !!}">{!! $list->school_classes->name." - ".$list->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Student List</h4>
                            <hr>
                            <form action="{{ route('attendance.store') }}" method="post" >
                            @csrf
                            @if(empty($students_list))
                                <p>Students list not available</p>
                            @else
                                <p>Students List</p>
                                <hr>
                                <input type="hidden" name="schools_id" value="{!! $schools_id !!}">
                                <input type="hidden" name="school_classes_id" value="{!! $school_classes_id !!}">
                                <input type="hidden" name="school_sections_id" value="{!! $school_sections_id !!}">
                                <div class="form-group">
                                    @foreach($students_list as $list)
                                    <p>
                                        <input type="hidden" name="students_list_id_all[]" value="{!! $list->id !!}">
                                        <input type="checkbox" checked name="students_list_id[]" id="students_id" value="{!! $list->id !!}">&nbsp;
                                        {!! $list->users->fullname !!}
                                    </p>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            @endif

                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection