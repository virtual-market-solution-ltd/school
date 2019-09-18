@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-4">
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
                        <form class="form-horizontal" action="{{ route('accounts.bank_accounts_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <div class="form-group">
                                <label for="bank_account_name">Bank Account Name</label>
                                <input class="form-control" type="text" name="bank_account_name" id="bank_account_name" required>
                            </div>

                            <div class="form-group">
                                <label for="account_type">Account Type</label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    <option value="0">Savings Account</option>
                                    <option value="1">Chequing Account</option>
                                    <option value="2">Credit Account</option>
                                    <option value="3">Cash Account</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bank_curr_code">Bank Account Currency</label>
                                <input class="form-control" type="text" name="bank_curr_code" id="bank_curr_code" value="TK" readonly required>
                            </div>

                            <div class="form-group">
                                <label for="dflt_curr_act">Default Currency</label>
                                <select class="form-control" name="dflt_curr_act" id="dflt_curr_act" required>
                                    <option value="0">YES</option>
                                    <option value="1">NO</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account_code">Bank Account GL Code</label>
                                <select class="form-control" name="account_code" id="account_code" required>
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
                                <label for="bank_name">Bank Name</label>
                                <input class="form-control" type="text" name="bank_name" id="bank_name" required>
                            </div>


                            <div class="form-group">
                                <label for="bank_account_number">Bank Account Number</label>
                                <input class="form-control" type="text" name="bank_account_number" id="bank_account_number" required>
                            </div>


                            <div class="form-group">
                                <label for="bank_address">Bank Address</label>
                                <input class="form-control" type="text" name="bank_address" id="bank_address" required>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Bank Accounts</h4>
                        <hr>
                        <div class="table-resposive-sm">
                            <table class="table table-bordered table-sm table-condensed" id="bank_accounts">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Account Name</th>
                                        <th>Type</th>
                                        <th>Currency</th>
                                        <th>GL Account</th>
                                        <th>Bank Name</th>
                                        <th>Bank Account</th>
                                        <th>Bank Address</th>
                                        <th>DFLT</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bank_accounts as $row)
                                    <tr>
                                        <td>{!! $row->id !!}</td>
                                        <td>{!! $row->bank_account_name !!}</td>
                                        <td>
                                            @if($row->account_type == 0)
                                                Savings Account
                                            @endif
                                            @if($row->account_type == 1)
                                                Chequing Account
                                            @endif    
                                            @if($row->account_type == 2)
                                                Credit Account
                                            @endif    
                                            @if($row->account_type == 3)
                                                Cash Account
                                            @endif
                                        </td>
                                        <td>{!! $row->bank_curr_code !!}</td>
                                        
                                        <td>
                                            {!! $row->account_code !!}
                                            @php
                                                $account_code_name = \App\ChartMaster::where('account_code',$row->account_code)->first();
                                                echo $account_code_name->account_name;
                                            @endphp
                                        </td>
                                        <td>{!! $row->bank_name !!}</td>
                                        <td>{!! $row->bank_account_number !!}</td>
                                        <td>{!! $row->bank_address !!}</td>
                                        
                                        <td>
                                            @if($row->dflt_curr_act == 1)
                                                YES
                                            @endif
                                            @if($row->dflt_curr_act  == 0)
                                                NO
                                            @endif    
                                        </td>

                                        
                                        <td>
                                            @if($row->inactive == 0)
                                                <button class="btn btn-sm btn-success">Active</button>
                                            @endif
                                            @if($row->inactive == 1)
                                                <button class="btn btn-sm btn-warning">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/bank_accounts_edit/{!! $row->cid !!}/edit"><button class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i>&nbsp;EDIT</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
$(document).ready(function() {
    $('#bank_accounts').DataTable();
} );
</script>
@endsection