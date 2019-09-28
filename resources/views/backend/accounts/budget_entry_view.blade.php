@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add New Bank Accounts</h4>
                        <hr>
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
                        <form class="form-horizontal" action="" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">


                            <div class="form-group">
                                <label for="account_code">Fiscal Year</label>
                                <select class="form-control" name="fiscal_year" id="fiscal_year" required>
                                    <option value="">Choose Your Option</option>
                                    @foreach($fiscal_years as $row)
                                        <option value="{!! $row->id !!}">{!! $row->begin."  ".$row->end!!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account_code">Account</label>
                                <select class="form-control" name="account" id="account" required>
                                    <option value="">Choose Your Option</option>
                                    @foreach($chart_types as $row)
                                        <optgroup label="{!! $row->name!!}">
                                            @php  
                                                $account_codes = \App\ChartMaster::where('account_type',$row->id)->get();
                                            @endphp
                                            @foreach($account_codes as $data)
                                            <option value="{!! $data->account_code !!}">{!! $data->account_code."  ".$data->account_name!!}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account_code">Dimensions</label>
                                <select class="form-control" name="dimension_id" id="dimension_id">
                                    <option value="">Choose Your Option</option>
                                    @foreach($dimensions as $row)
                                        <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!---->
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add New Bank Accounts</h4>
                        <hr>
                        <table class="table table-condensed text-center">
                            <thead>
                                <tr>
                                    <td>Period</td>
                                    <td>Amount</td>
                                    <td>Dimension</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('accounts.budget_entry_update') }}" method="post">
                                @csrf
                                @method('put')
                                @if(!empty($trans_date))
                                    @foreach($trans_date as $row)
                                    <tr>
                                        <td> <input type="hidden" name="tran_date[]" value="{!! $row !!}">    {!! $row !!}</td>
                                        <td>
                                            @php
                                                
                                                $amount = \App\BudgetTransaction::where('schools_id',Auth::user()
                                                                                ->schools_id)->where('tran_date',$row)->where('account',$account)->first();
                                            @endphp
                                            <input type="text" name="amount[]" value=" @if(empty($amount)) 0 @else {!! $amount->amount !!}  @endif" required>
                                        </td>
                                        <td>
                                            {!! $dimension_id !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                            <div class="center">
                                <button class="btn btn-sm btn-primary" type="submit" >Save</button>
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