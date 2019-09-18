@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Account Groups</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('accounts.gl_accounts_update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <input type="hidden" name="id" value="{!! $data->id!!}">
                            <div class="form-group">
                                <label for="account_code">Account Code</label>
                                <input class="form-control" type="text" name="account_code" id="account_code" value="{!! $data->account_code !!}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="account_code2">Account Code 2</label>
                                <input class="form-control" type="text" name="account_code2" id="account_code2" value="{!! $data->account_code2 !!}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input class="form-control" type="text" name="account_name" id="account_name" value="{!! $data->account_name !!}" required>
                            </div>

                            <div class="form-group">
                                <label for="account_type">Account Type</label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    <option value="{!! $data->account_type !!}">
                                        @php 
                                            $account_type_name = \App\ChartType::where('id',$data->account_type)->first();
                                            echo $account_type_name->name;
                                        @endphp
                                    </option>
                                    @foreach($account_types as $row)
                                    <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inactive">Status</label>
                                <select class="form-control" name="inactive" id="inactive" required>
                                        @if($data->inactive == 0)
                                            <option value="0">Active</option>
                                        @endif
                                        @if($data->inactive == 1)
                                            <option value="1">Inactive</option>
                                        @endif
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