@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">GL Account Groups List</h4>
                        <hr>
                        <div class="table-resposive-sm">
                            <table class="table table-sm table-condensed table-bordered ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Class Name</th>
                                        <th>Parent</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gl_groups as $row)
                                    <tr>
                                        <td>{!! $row->id !!}</td>
                                        <td>{!! $row->name !!}</td>
                                        <td>
                                            @php
                                                $class_name = \App\ChartClass::where('cid',$row->class_id)->first();
                                            @endphp
                                            {!! $class_name->class_name  !!}
                                        </td>
                                        <td>
                                            @php
                                                if($row->parent){
                                                    $parent = \App\ChartType::where('id',$row->parent)->first();
                                                    echo  $parent->name ;
                                                }
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
                                            <a href="/gl_account_groups_edit/{!! $row->id !!}/edit"><button class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i>&nbsp;EDIT</button></a>
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
                        <h4 class="mt-0 m-b-30 header-title">Add GL Account Groups</h4>
                        <hr>
                        <form class="form-horizontal" action="{{ route('accounts.gl_account_groups_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="ctype">Sub Group of</label>
                                <select class="form-control" name="parent" id="parent">
                                    <option value="">Choose Your Option</option>
                                    @foreach($gl_groups as $row)
                                    <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ctype">Class</label>
                                <select class="form-control" name="class_id" id="class_id" required>
                                    <option value="">Choose Your Option</option>
                                    @foreach($classes as $row)
                                        <option value="{!! $row->cid !!}">
                                        {!! $row->class_name !!}
                                        </option>
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

        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection