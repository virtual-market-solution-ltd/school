@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Attendance</h4>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($class_info != null)
                        <form class="form-horizontal" action="{{ route('attendancerelation.store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="school_id">School ID</label>
                                        <input type="text" class="form-control"  value="{!! Auth::user()->schools->school_id !!}" readonly>
                                        <input type="hidden" class="form-control" id="schools_id" name="schools_id" value="{!! Auth::user()->schools->id !!}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="school_classes_id">Class Name</label>
                                        <input type="text" class="form-control"  value="{!! $class_info->name!!}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="school_sections_id">Section</label>
                                        <input type="text" class="form-control"  value="{!! $section_info->name!!}" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label for="teachers_id">Teacher Name</label>
                                        <input type="text" class="form-control"  value="{!! Auth::user()->fullname!!}" readonly>
                                    </div>
                                
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="students_id">Students List </label>
                                        <hr>
                                        @for($i=0;$i < count($students_list);$i++)
                                        <p>
                                            <input type="checkbox" checked name="students_id[]" id="students_id" value="{!! $students_list[$i] !!}"> 
                                            &nbsp;&nbsp;&nbsp;
                                            @php
                                               $fullname  = \App\User::where('id',$students_list[$i])->first();     
                                            @endphp
                                            {!! $fullname->fullname !!}
                                        </p>
                                        @endfor
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit" >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif

                        @if($message)
                            <h3>{!! $message !!}</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection