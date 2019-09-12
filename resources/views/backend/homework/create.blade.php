@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add Homework</h4>
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
                       
                        <form class="form-horizontal" action="{{ route('homework.store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="school_id">School ID</label>
                                        <input type="text" class="form-control"  value="{!! Auth::user()->schools->school_id !!}" readonly>
                                        <input type="hidden" class="form-control" id="schools_id" name="schools_id" value="{!! Auth::user()->schools->id !!}">
                                    </div>
                                    <div class="form-group">
                                        <label for="teachers_id">Teacher Name</label>
                                        <input type="text" class="form-control"  value="{!! Auth::user()->fullname!!}" readonly>
                                        <input type="hidden" class="form-control" id="teachers_id" name="teachers_id" value="{!! Auth::user()->id !!}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="school_classes_id">Class Name</label>
                                        <input type="text" class="form-control"  value="{{ $class_info->name }}" readonly>
                                        <input type="hidden" class="form-control" id="school_classes_id" name="school_classes_id" value="{!! $class_info->id !!}">
                                    </div>

                                    <div class="form-group">
                                        <label for="school_sections_id">Section</label>
                                        <input type="text" class="form-control"  value="{{ $section_info->name }}" readonly>
                                        <input type="hidden" class="form-control" id="school_sections_id" name="school_sections_id" value="{!! $section_info->id !!}">
                                    </div>

                                    <div class="form-group">
                                        <label for="school_sections_id">Subject</label>
                                        <Select class="form-control" name="school_subjects_id" id="school_subjects_id" required>
                                            @foreach($subjects as $subject)
                                                <option value="{!! $subject->school_subjects_id !!}">{!! $subject->school_subjects->name !!}</option>
                                            @endforeach
                                        </Select>
                                    </div>


 
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="teachers_id">Deadline</label>
                                        <input type="date" class="form-control" name="deadline" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="teachers_id">Title</label>
                                        <input type="text" class="form-control" name="name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="teachers_id">Description</label>
                                        <textarea class="form-control" name="description" id="" cols="30" rows="10" required></textarea>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="teachers_id">Choose FIle</label>
                                        <input type="file" class="form-control"  value="" name="" id="">
                                    </div>
                                    -->

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit" >Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        



                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection