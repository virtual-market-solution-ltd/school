@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Transfer Between Bank Accounts</h4>
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
                        <form class="form-horizontal" action="{{ route('accounts.bank_account_transfer_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            
                            <div class="form-group">
                                <label for="">Date</label>
                                <input class="form-control" type="date" name="trans_date" id="trans_date" value="@php echo date('Y-m-d') @endphp" required>
                            </div>

                            <div class="form-group">
                                <label for="">From</label>
                                <select class="form-control" name="bank_act_from" id="bank_act_from" required>
                                    <option value="">Choose your option</option>
                                    @foreach($bank_account_list as $list)
                                        @php
                                            $balance = \App\GLTranscation::where('schools_id',Auth::user()->schools_id)->where('account',$list->account_code)->sum('amount');
                                        @endphp
                                        <option value="{!! $list->id!!}">{!! $list->bank_account_name." - ".$balance." TK " !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">To</label>
                                <select class="form-control" name="bank_act_to" id="bank_act_to" required>
                                    <option value="">Choose your option</option>
                                    @foreach($bank_account_list as $list)
                                        @php
                                            $balance = \App\GLTranscation::where('schools_id',Auth::user()->schools_id)->where('account',$list->account_code)->sum('amount');
                                        @endphp
                                        <option value="{!! $list->id!!}">{!! $list->bank_account_name." - ".$balance." TK " !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Amount</label>
                                <input class="form-control" type="text" name="amount" id="amount">
                            </div>

                            <div class="form-group">
                                <label for="">Bank Charge</label>
                                <input class="form-control" type="text" name="bank_charge" id="bank_charge">
                            </div>

                            <div class="form-group">
                                <label for="">Memo</label>
                                <input class="form-control" type="text" name="memo" id="memo">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
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
    $('').DataTable();
} );
</script>
@endsection