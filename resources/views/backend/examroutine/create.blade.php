@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add New Exam Routine</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('examroutine.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                
                                <input type="text" class="form-control" id="school_name" name="school_name" value="{!! $school->school_name !!}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="school_ID">School ID</label>
                                
                                <input type="text" class="form-control" id="school_id" name="school_id" value="{!! $school->school_id !!}" readonly required>

                                <input type="hidden" class="form-control" id="schools_id" name="schools_id" value="{!! $school->id !!}"  readonly required>
                            </div>

                            <div class="form-group">
                                <label for="exam_name">Exam Name</label>
                                <input type="text" class="form-control" name="exam_name" id="exam_name">
                            </div>  

                            <div class="form-group">
                                <label for="name">Class Name</label>
                                <select class="form-control" name="school_classes_id" id="school_classes_id">
                                    @foreach($classes as $class)
                                        <option value="{!! $class->id !!}">{!! $class->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Sections Name</label>
                                <select class="form-control" name="school_sections_id" id="school_sections_id">
                                    @foreach($sections as $section)
                                        <option value="{!! $section->id !!}">{!! $section->school_classes->name." - ".$section->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject Name</label>
                                <select class="form-control" name="school_subjects_id" id="school_subjects_id">
                                    @foreach($subjects as $subject)
                                        <option value="{!! $subject->id !!}">{!! $subject->school_sections->name." - ".$subject->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>  

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" name="time" id="time" placeholder="Example: 1.00 pm - 4.00 pm">
                            </div>  
                            
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit" >Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection