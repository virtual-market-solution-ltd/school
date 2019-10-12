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
                        <h4 class="mt-0 m-b-30 header-title">Extra Salary</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="datatable-buttons">
                            <tbody>
                            <form action="{{ route('hr.extra_salary_deduct') }}" method="post">
                                @csrf
                                <input type="hidden" name="entry_user" value="{!! Auth::user()->fullname !!}">
                                <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                                <tr>
                                    <td>Entry Date</td>
                                    <td><input class="form-control" type="text" name="entry_date" value="{!! date('Y-m-d') !!}" readonly></td>
                                    <td>Employee</td>
                                    <td>
                                        <select class="form-control" name="emp_code" id="">
                                            <option value="123">Shovon Rahman Shuvo</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>
                                        <input class="form-control" type="text" name="year" value="@php echo date('Y') @endphp" readonly>
                                    </td>
                                    <td>Month</td>
                                    <td>
                                        <select class="form-control" name="month" id="" required>
                                            <option value="">Choose Your Option</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </td>
  
                                </tr>
                                <tr>
                                    <td>Salary Head</td>
                                    <td>
                                        <select class="form-control" name="head_code" id="" required>
                                            <option value="">Choose Your Option</option>
                                            <option value="1">Head</option>
                                        </select>
                                    </td>
                                    <td>Amount</td>
                                    <td>
                                        <input class="form-control" type="text" name="amount">
                                    </td>
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