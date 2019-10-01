@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        @if(Auth::user()->roles_id == 2)
                        <h4 class="mt-0 m-b-30 header-title">Insert Academic Syllabus</h4>
                        @if(session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        
                        <form action="" method="post">
                            @csrf
                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Exam</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php 
                                            $schools_id = \Auth::user()->schools_id;
                                            $classes = \App\SchoolClass::where('schools_id',$schools_id)->get();
                                            $exams = \App\Exams::where('schools_id',$schools_id)->get();
                                            $subjects = \App\SchoolSubject::where('schools_id',$schools_id)->with('school_classes')->get();
                                            
                                        @endphp
                                        <tr>
                                            <td>
                                                <select class="form-control" name="classes_id" id="classes_id">
                                                    @foreach($classes as $row)
                                                        <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="exams_id" id="exams_id">
                                                    @foreach($exams as $row)
                                                        <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="subjects_id" id="subjects_id">
                                                    @foreach($subjects as $row)
                                                        <option value="{!! $row->id !!}">{!! $row->school_classes->name." - ".$row->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="1" required></textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary">Submit</button>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </form>
                        <hr>
                        <br>
                        @endif
                        <h4 class="mt-0 m-b-30 header-title">Academic Syllabus</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed" id="report_card">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Exam</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($syllabus as $row)
                                    <tr>
                                        <td>
                                            @php
                                                $class = \App\SchoolClass::where('id',$row->classes_id)->first();
                                                echo $class->name;
                                            @endphp
                                        </td>
                                        <td>{!! $row->exams->name !!}</td>
                                        <td>
                                            @php
                                                $subject = \App\SchoolSubject::where('id',$row->subjects_id)->first();
                                                echo $subject->name;
                                            @endphp
                                        </td>
                                        <td>{!! $row->description !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')


@endsection