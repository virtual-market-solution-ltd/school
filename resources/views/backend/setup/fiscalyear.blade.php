@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Fiscal Years</h4>
                        @if(session()->has('success-update'))
                            <div class="alert alert-success">
                                {{ session()->get('success-update') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered table-condensed text-center dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Begin</th>
                                    <th>End</th>
                                    <th>Closed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($fiscalyears as $row)
                                    <tr>
                                        <td>#</td>
                                        <td>{!! date('Y-m-d', strtotime($row->begin )) !!}</td>
                                        <td>{!!  date('Y-m-d', strtotime($row->end )) !!}</td>
                                        <td>
                                            @if($row->closed == 0)
                                                NO
                                            @elseif($row->closed == 1)
                                                YES
                                            @else    
                                            @endif
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
                                                    <h5 class="modal-title" id="exampleModalLabel">EDIT FISCAL YEAR</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('setup.fiscalyear_update')}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{!! $row->id !!}">
                                                        <div class="form-group">
                                                            <label for="begin">Begin Date</label>
                                                            <input type="date" class="form-control" name="begin" id="begin" value="{!! date('Y-m-d', strtotime($row->begin )) !!}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end">End Date</label>
                                                            <input type="date" class="form-control" name="end" id="end" value="{!! date('Y-m-d', strtotime($row->end )) !!}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Is Closed</label>
                                                            <select class="form-control" name="closed" id="closed" >
                                                                @if($row->closed == 0)
                                                                <option value="0">NO</option>
                                                                @elseif($row->closed == 1)
                                                                <option value="1">YES</option>
                                                                @else    
                                                                @endif
                                                                <option value="0">NO</option>
                                                                <option value="1">YES</option>
                                                            </select>
                                                        </div>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button  class="btn btn-primary" type="submit">Save changes</button>
                                                    </form>
                                                </div>
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
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add Fiscal Year</h4>
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
                        <form class="form-horizontal" action="{{route('setup.fiscalyear_store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="begin">Begin Date</label>
                                <input type="date" class="form-control" name="begin" id="begin">
                            </div>
                            <div class="form-group">
                                <label for="end">End Date</label>
                                <input type="date" class="form-control" name="end" id="end">
                            </div>
                            <div class="form-group">
                                <label for="">Is Closed</label>
                                <select class="form-control" name="closed" id="closed" >
                                    <option value="0">NO</option>
                                    <option value="1">YES</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">Submit</button>
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


    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );

</script>

@endsection
