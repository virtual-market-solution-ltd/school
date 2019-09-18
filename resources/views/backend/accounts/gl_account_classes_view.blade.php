@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Account Classes List</h4>
                        <hr>
                        <div class="table-resposive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Class Name</th>
                                        <th>Class Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gl_classes as $row)
                                    <tr>
                                        <td>{!! $row->cid !!}</td>
                                        <td>{!! $row->class_name !!}</td>
                                        <td>
                                            @if($row->class_type == 1)
                                                <p>Assets</p>
                                            @endif
                                            @if($row->class_type == 2)
                                                <p>Liabilities</p>
                                            @endif
                                            @if($row->class_type == 3)
                                                <p>Equity</p>
                                            @endif
                                            @if($row->class_type == 4)
                                                <p>Income</p>
                                            @endif
                                            @if($row->class_type == 5)
                                                <p>Cost of Goods Sold</p>
                                            @endif
                                            @if($row->class_type == 6)
                                                <p>Expense</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->inactive == 0)
                                                <button class="btn btn-success">Active</button>
                                            @endif
                                            @if($row->inactive == 1)
                                                <button class="btn btn-warning">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/gl_account_classes_edit/{!! $row->cid !!}/edit"><button class="btn btn-primary"> <i class="fa fa-pencil"></i>&nbsp;EDIT</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Account Classes</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('accounts.gl_account_classes_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input class="form-control" type="text" name="class_name" id="class_name" required>
                            </div>
                            <div class="form-group">
                                <label for="ctype">Class Type</label>
                                <select class="form-control" name="class_type" id="class_type" required>
                                    <option value="1">Assets</option>
                                    <option value="2">Liabilities</option>
                                    <option value="3">Equity</option>
                                    <option value="4">Income</option>
                                    <option value="5">Cost of Goods Sold</option>
                                    <option value="6">Expense</option>
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