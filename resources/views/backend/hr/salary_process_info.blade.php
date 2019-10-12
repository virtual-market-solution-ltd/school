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
                                    <th>Processed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salary_processed as $row)
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
                                    <td>{!! $row->processed_date !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                        <hr>
                        <br>
                        <h4 class="mt-0 m-b-30 header-title">Salary Process Month</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="datatable-buttons">
                            <tbody>
                            <form action="{{ route('hr.salary_process_info') }}" method="post">
                                @csrf
                                <input type="hidden" name="processed_by" value="{!! Auth::user()->fullname !!}">
                                <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                                <tr>
                                    <td>Processed date</td>
                                    <td><input class="form-control" type="text" name="processed_date" value="{!! date('Y-m-d') !!}" readonly></td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>
                                        <input class="form-control" type="text" name="year" value="@php echo date('Y') @endphp" readonly>
                                    </td>
                                    <td>Month</td>
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