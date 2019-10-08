@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Area Entry</h4>
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
                        <form action="{{ route('hr.areas') }}" method="post">
                            @csrf
                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="report_card">
                                <thead>
                                    <tr>
                                        <th>Location Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="description" required>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-primary">Submit</button>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </form>
                        <hr>
                        <br>
                        <h4 class="mt-0 m-b-30 header-title">Area List</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed text-center" id="">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($setups as $row)
                                <tr>
                                    <td>{!! $row->id !!}</td>
                                    <td>{!! $row->description !!}</td>
                                    <td>
                                        @if($row->inactive == 0)<button class="btn btn-sm btn-primary">Active</button> @endif 
                                        @if($row->inactive == 1)<button class="btn btn-sm btn-primary">Inactive</button> @endif 
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{!! $row->id !!}">
                                        EDIT
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{!! $row->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Location info</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('hr.areas') }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Location Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="id" value="{!! $row->id !!}">
                                                                            <input class="form-control" type="text" name="description" value="{!! $row->description !!}" required>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="inactive" id="">
                                                                                <option value="{!! $row->inactive !!}">
                                                                                    @if($row->inactive == 0)<button class="btn btn-sm btn-primary">Active</button> @endif 
                                                                                    @if($row->inactive == 1)<button class="btn btn-sm btn-primary">Inactive</button> @endif 
                                                                                </option>
                                                                                <option value="0">Active</option>
                                                                                <option value="1">Inactive</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')


@endsection