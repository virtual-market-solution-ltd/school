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
                        <form class="form-horizontal" action="{{ route('accounts.gl_account_groups_update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <input type="hidden" name="id" value="{!! $data->id!!}">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="{!! $data->name !!}" required>
                            </div>

                            <div class="form-group">
                                <label for="ctype">Sub Group of</label>
                                <select class="form-control" name="parent" id="parent">
                                    <option value="{!! $data->parent !!}">
                                            @php
                                                if($data->parent){
                                                    $parent = \App\ChartType::where('id',$data->parent)->first();
                                                    echo  $parent->name ;
                                                }
                                            @endphp
                                    </option>
                                    @foreach($gl_groups as $row)
                                    <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ctype">Class</label>
                                <select class="form-control" name="class_id" id="class_id" required>
                                    <option value="{!! $data->class_id !!}">
                                            @php
                                                $class_name = \App\ChartClass::where('cid',$row->class_id)->first();
                                            @endphp
                                            {!! $class_name->class_name  !!}
                                    </option>
                                    @foreach($classes as $row)
                                        <option value="{!! $row->cid !!}">
                                        {!! $row->class_name !!}
                                        </option>
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