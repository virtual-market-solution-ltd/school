@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Account Classes</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('accounts.gl_account_classes_update') }}" method="post">
                            
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <input type="hidden" name="cid" value="{!! $data->cid!!}">
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input class="form-control" type="text" name="class_name" id="class_name" value="{!! $data->class_name !!}" required>
                            </div>
                            <div class="form-group">
                                <label for="ctype">Class Type</label>
                                <select class="form-control" name="class_type" id="class_type" required>
                                    <option value="{!! $data->class_type !!}">
                                            @if($data->class_type == 1)
                                                <p>Assets</p>
                                            @endif
                                            @if($data->class_type == 2)
                                                <p>Liabilities</p>
                                            @endif
                                            @if($data->class_type == 3)
                                                <p>Equity</p>
                                            @endif
                                            @if($data->class_type == 4)
                                                <p>Income</p>
                                            @endif
                                            @if($data->class_type == 5)
                                                <p>Cost of Goods Sold</p>
                                            @endif
                                            @if($data->class_type == 6)
                                                <p>Expense</p>
                                            @endif
                                    </option>
                                    <option value="1">Assets</option>
                                    <option value="2">Liabilities</option>
                                    <option value="3">Equity</option>
                                    <option value="4">Income</option>
                                    <option value="5">Cost of Goods Sold</option>
                                    <option value="6">Expense</option>
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