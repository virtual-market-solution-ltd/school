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
                        <h4 class="mt-0 m-b-30 header-title">Procesed Salary Months </h4>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('hr.hr_account_salary_sheet') }}" method="get">
                                <tr>
                                    <td>
                                        <select class="form-control" name="year" id="">
                                        <option value="">Choose Your Option</option>
                                        @php $year = date('Y');@endphp
                                            @for($i=0;$i<50;$i++)
                                            <option value="{!! $year+$i !!} ">  {!! $year+$i !!} </option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="month_id" id="" required>
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
                                    <td>
                                        <button class="btn btn-info btn-sm">Search</button>
                                    </td>
                                </tr>
                                </form>
                            </tbody>
                        
                        </table>
                        <hr>
                        <br>
                        @if(isset($salary_sheet))
                        <h4 class="mt-0 m-b-30 header-title">Salary Process Month - HR</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>EMP NAME</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Processed date</th>
                                    <th>Processed By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salary_sheet as $row)
                                <tr>
                                    <td>{!! $row->year !!}</td>
                                    <td>
                                        @if($row->month_id == '01') January   @endif
                                        @if($row->month_id == '02') February  @endif
                                        @if($row->month_id == '03') March     @endif
                                        @if($row->month_id == '04') April     @endif
                                        @if($row->month_id == '05') May       @endif
                                        @if($row->month_id == '06') June      @endif
                                        @if($row->month_id == '07') July      @endif
                                        @if($row->month_id == '08') August    @endif
                                        @if($row->month_id == '09') September @endif
                                        @if($row->month_id == '10') October   @endif
                                        @if($row->month_id == '11') November  @endif
                                        @if($row->month_id == '12') December  @endif
                                    </td>
                                    <td>{!! $row->emp_code !!}</td>
                                    <td>{!! $row->account !!}</td>
                                    <td>{!! $row->amount !!}</td>
                                    <td>
                                        @if($row->status == 0) 
                                        <button class="btn btn-sm btn-warning">Not Processed By Accounts</button> 
                                        @endif 
                                        @if($row->status == 1) 
                                        <button class="btn btn-sm btn-primary">Processed By Accounts</button> 
                                        @endif 
                                    </td>
                                    <td>{!! $row->processed_date !!}</td>
                                    <td>{!! $row->processed_by !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')


@endsection