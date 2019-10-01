@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Edit Student Informtion</a></h4>
                        <div class="table-responsive">
                            <form action="/students" method="post">
                                @csrf
                                
                                <table class="table table-bordered table-condensed" id="">
                                    <tbody>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="users_id" value="{!! $student->users_id !!}">
                                            <td><input class="form-control" type="text" value="{!! $student->users->username !!}" readonly></td>  
                                            <td><input class="form-control" type="text" name="fullname" value="{!! $student->users->fullname !!}"></td>
                                            <td><input class="form-control" type="text" name="phone" value="{!! $student->users->phone !!}"></td>
                                            <td><input class="form-control" type="text" name="email" value="{!! $student->users->email !!}"></td>
                                        </tr>
                                        <tr>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Roll</th>
                                            <th>Phone Number</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="school_classes_id" id="school_classes_id">
                                                    <option value=" @if(isset($student->school_classes->id)){!! $student->school_classes->id !!} @endif">
                                                        @if(isset($student->school_classes->name)) {!! $student->school_classes->name !!} @endif
                                                    </option>
                                                    @foreach($classes as $row)
                                                        <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="school_sections_id" id="school_sections_id">
                                                    <option value="@if(isset( $student->school_sections->id)){!! $student->school_sections->id !!} @endif">
                                                        @if(isset($student->school_sections->name))
                                                        {!! $student->school_sections->name !!}
                                                        @endif
                                                    </option>
                                                    @foreach($sections as $row)
                                                        <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input class="form-control" type="text" name="roll_number" value="@if(isset($student->roll_number ))  {!! $student->roll_number !!}  @endif"></td>
                                            <td><input class="form-control" type="text" name="phone_number" value="@if(isset($student->phone_number)) {!! $student->phone_number !!} @endif"></td>
                                        </tr>
                                        <tr>
                                            <th>Blood Group</th>
                                            <th>Applicant ID</th>
                                            <th>Present Address</th>
                                            <th>Permanent Address</th>
                                        </tr>
                                        <tr>
                                            <td><input class="form-control" type="text" name="blood_group" value="@if(isset($student->blood_group)) {!! $student->blood_group !!} @endif"></td>  
                                            <td><input class="form-control" type="text" name="applicant_id" value="@if(isset($student->applicant_id)) {!! $student->applicant_id !!} @endif"></td>
                                            <td><input class="form-control" type="text" name="present_address" value="@if(isset($student->present_address)) {!! $student->present_address !!} @endif"></td>
                                            <td><input class="form-control" type="text" name="permanent_address" value="@if(isset($student->permanent_address)) {!! $student->permanent_address !!} @endif"></td>
                                        </tr>    
                                        <tr>
                                            <th>Father Name</th>
                                            <th>Mother Name</th>
                                        </tr>             
                                        <tr>
                                            <td><input class="form-control" type="text" name="father_name" value="@if(isset($student->father_name)) {!! $student->father_name !!} @endif"></td>  
                                            <td><input class="form-control" type="text" name="mother_name" value="@if(isset($student->mother_name)) {!! $student->mother_name !!} @endif"></td>
                                        </tr>                     
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </form>
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

</script>

@endsection
