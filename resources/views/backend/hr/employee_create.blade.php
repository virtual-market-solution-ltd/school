@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
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
                        <h4 class="mt-0 m-b-30 header-title">Add New Employee</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="datatable-buttons">
                            <tbody>
                            <form action="{{ route('hr.employee') }}" method="post">
                                @csrf
                                <tr>
                                    <td>Employee Name</td>
                                    <td><input class="form-control" type="text" name="name"></td>
                                    <td>Gender</td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Father's Name</td>
                                    <td><input class="form-control" type="text" name="f_name"></td>
                                    <td>Mother's Name</td>
                                    <td><input class="form-control" type="text" name="m_name"></td>
                                </tr>
                                <tr>
                                    <td>Father's Address</td>
                                    <td>
                                        <textarea class="form-control" name="f_add" id="" cols="30" rows="1"></textarea>
                                    </td>
                                    <td>Mother's Address</td>
                                    <td>
                                        <textarea class="form-control" name="m_add" id="" cols="30" rows="1"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Father's Occupation</td>
                                    <td><input class="form-control" type="text" name="f_occupation"></td>
                                    <td>Mother's Occupation</td>
                                    <td><input class="form-control" type="text" name="m_occupation"></td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                    <td>
                                        <textarea class="form-control" name="present_add" id="" cols="30" rows="1"></textarea>
                                    </td>
                                    <td>Permanent Address</td>
                                    <td>
                                        <textarea class="form-control" name="permanent_add" id="" cols="30" rows="1"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td><input class="form-control" type="text"></td>
                                    <td>Date of Birth</td>
                                    <td><input class="form-control" type="date" name="dob"></td>
                                </tr>
                                <tr>
                                    <td>Place Of Birth</td>
                                    <td><input class="form-control" type="text" name="pob"></td>
                                    <td>Birth Certificate No</td>
                                    <td><input class="form-control" type="text" name="bc_no"></td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td>
                                        <select class="form-control" name="nationality" id="">
                                            <option value="1">Bangladesh</option>
                                        </select>
                                    </td>
                                    <td>Religion</td>
                                    <td>
                                        <select class="form-control" name="religion" id="">
                                            <option value="1">Islam</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>National ID</td>
                                    <td><input class="form-control" type="text" name="national_id"></td>
                                    <td>TIN</td>
                                    <td><input class="form-control" type="text" name="tin"></td>
                                </tr>
                                <tr>
                                    <td>Blood Group</td>
                                    <td>
                                        <select class="form-control" name="blood_group" id="">
                                            <option value="1">B+</option>
                                        </select>
                                    </td>
                                    <td>Marital Status</td>
                                    <td>
                                        <select class="form-control" name="marital_status" id="">
                                            <option value="1">Married</option>
                                            <option value="2">Single</option>
                                            <option value="3">Divorced</option>
                                            <option value="4">Widowed</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marriage Date</td>
                                    <td><input class="form-control" type="date" name="marriage_date"></td>
                                    <td>Spouse Name</td>
                                    <td><input class="form-control" type="text" name="spouse_name"></td>
                                </tr>
                                <tr>
                                    <td>Spouse Occupation</td>
                                    <td><input class="form-control" type="text" name="spouse_occupation"></td>
                                    <td>Spouse Address</td>
                                    <td>
                                        <textarea class="form-control" name="spouse_add" id="" cols="30" rows="1"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No of Children</td>
                                    <td><input class="form-control" type="text" name="no_of_children"></td>
                                    <td>Employee Code</td>
                                    <td><input class="form-control" type="text" name="vendor_no"></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="text-center">
                            <button class="btn btn-info btn-sm" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')


@endsection