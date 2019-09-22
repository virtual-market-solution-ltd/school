@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Make New Deposit</h4>
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
                        <form class="form-horizontal" action="{{ route('accounts.accounts_deposit_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            
                            <div class="form-group">
                                <label for="">Date</label>
                                <input class="form-control" type="date" name="trans_date" id="trans_date" value="@php echo date('Y-m-d') @endphp" required>
                            </div>
                            


                            <div class="form-group">
                                <label for="">From</label>
                                <select class="form-control" name="person_type_id" id="person_type_id" required>
                                    <option value="0">Miscellaneous</option>
                                    <option value="1">Customer</option>
                                    <option value="2">Supplier</option>
                                    <option value="3">Quick Entry</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">To the order of</label>
                                <input class="form-control" type="text" name="person_id" id="person_id" value="" required>
                            </div>

                            <div class="form-group">
                                <label for="">Into</label>
                                <select class="form-control" name="bank_act" id="" required>
                                    <option value="">Choose your option</option>
                                    @foreach($bank_account_list as $list)
                                        @php
                                            $balance = \App\GLTranscation::where('schools_id',Auth::user()->schools_id)->where('account',$list->account_code)->sum('amount');
                                        @endphp
                                        <option value="{!! $list->id!!}">{!! $list->bank_account_name." - ".$balance." TK " !!}</option>
                                    @endforeach
                                </select>
                            </div>

                        
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Accounts</label>
                            <select class="form-control" name="account" id="account" required>
                                <option value="">Choose Your Option</option>
                                @foreach($accounts_list as $list)
                                    <option value="{!! $list->account_code !!}">{!! $list->account_code." -- ".$list->account_name !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Dimension</label>
                            <select class="form-control" name="dimension_id" id="dimension_id" required>
                                <option value="">Choose Your Option</option>
                                @foreach($dimensions as $list)
                                    <option value="{!! $list->id !!}">{!! $list->name !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input class="form-control" type="text" name="amount" id="amount" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="">Memo</label>
                            <input class="form-control" type="text" name="memo_" id="memo_" value="" required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
<script>
$(document).ready(function() {
    $('').DataTable();
} );
</script>
@endsection