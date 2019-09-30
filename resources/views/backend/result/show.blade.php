@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Report Card </h4>
                        <hr>
                        @php
                        $users_id = \Auth::user()->id;
                        $class_id = \App\Student::where('users_id',$users_id)->first();
                        $subjects = \App\SchoolSubject::where('school_classes_id',$class_id->school_classes_id)->get();
                        $exams = \App\Exams::where('school_classes_id',$class_id->school_classes_id)->get();

                        @endphp
                        <table class="table table-striped table-bordered" id="report_card">
                            <thead>
                                <tr>
                                    <th>Exam Name</th>
                                    @foreach($subjects as $row)    
                                    <th>{!! $row->name !!}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($exams as $exam_row)
                                @php $sum_of_exam_total = 0;@endphp
                                    <tr>
                                        <td>{!! $exam_row->name !!}</td>
                                        @foreach($subjects as $row)    
                                            <td>
                                                @php 
                                                    $obtained_mark = \App\ExamResult::where('exams_id',$exam_row->id)->where('subjects_id',$row->id)->first(); 
                                                    echo $obtained_mark['obtained_mark'];
                                                    $sum_of_exam_total = $sum_of_exam_total+$obtained_mark['obtained_mark'];
                                                @endphp
                                            </td>
                                        @endforeach
                                        <td> @php echo $sum_of_exam_total; @endphp</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    @foreach($subjects as $row)    
                                        <td>{!! $row->name !!}</td>
                                    @endforeach
                                </tr>
                            </tfoot>
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