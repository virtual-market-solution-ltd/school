@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Accounts List</h4>
                        <hr>
                        <div class="table-resposive-sm">
                            <table class="table table-sm table-condensed table-bordered text-center" id="accounts_list">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Account Code</th>
                                        <th>Account Code 2</th>
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1;  @endphp
                                    @foreach($gl_accounts as $row)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $row->account_code !!}</td>
                                        <td>{!! $row->account_code2 !!}</td>
                                        <td>{!! $row->account_name !!}</td>
                                        <td>
                                            @php
                                                $account_type = \App\ChartType::where('id',$row->account_type)->first();
                                                echo $account_type->name;
                                            @endphp
                                            
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
                                            <a href="/gl_accounts_edit/{!! $row->id !!}/edit"><button class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i>&nbsp;EDIT</button></a>
                                        </td>
                                    </tr>
                                    @php $i++;  @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add GL Accounts</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('accounts.gl_accounts_store') }}" method="post">
                            @csrf
                            
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <div class="form-group">
                                <label for="account_code">Account Code</label>
                                <input class="form-control" type="text" name="account_code" id="account_code" required>
                            </div>
                            <div class="form-group">
                                <label for="account_code2">Account Code 2</label>
                                <input class="form-control" type="text" name="account_code2" id="account_code2" required>
                            </div>

                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input class="form-control" type="text" name="account_name" id="account_name" required>
                            </div>

                            <div class="form-group">
                                <label for="account_type">Account Type</label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    <option value="">Choose Your Option</option>
                                    @foreach($account_types as $row)
                                    <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inactive">Account Status</label>
                                <select class="form-control" name="inactive" id="inactive" required>
                                    <option value="">Choose Your Option</option>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
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
    $('#accounts_list').DataTable();
} );
</script>
@endsection