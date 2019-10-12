@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Grade Entry</h4>
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
                        <form action="{{ route('hr.grade') }}" method="post">
                            @csrf
                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="report_card">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Grade Name</th>
                                        <th>Over Time</th>
                                        <th>Over Time Count Start After</th>
                                        <th>Extra Present Day Payment</th>
                                        <th>Attendance Bonus</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" name="grade" required>
                                        </td>
                                        <td>
                                            <select class="form-control" name="ot" id="">
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="ot_count_after">
                                        </td>
                                        <td>
                                            <select class="form-control" name="epdp" id="">
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="att_bonus" id="">
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Night/Tiffin Bonus:</th>
                                        <th>Amount</th>
                                        <th>Weekend Starts After</th>
                                        <th>Turn Holiday to Absent</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="nt_bonus" id="">
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="nt_amount" >
                                        </td>
                                        <td>
                                            <input class="form-control" type="text"  name="weekend_starts_after">
                                        </td>
                                        <td>
                                            <select class="form-control" name="h_to_a" id="">
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-info" type="submit">Save</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <hr>
                        <br>
                        <h4 class="mt-0 m-b-30 header-title">Grade List</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed text-center" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Grade</th>
                                    <th>PL</th>
                                    <th>SL</th>
                                    <th>CL</th>
                                    <th>EL</th>
                                    <th>ML</th>
                                    <th>MT</th>
                                    <th>FL</th>
                                    <th>Total</th>
                                    <th>Over Time</th>
                                    <th>Over Time Count Start</th>
                                    <th>EPDP</th>
                                    <th>ATT Bonus</th>
                                    <th>NT Bonus</th>
                                    <th>NT Amount</th>
                                    <th>Weekend Start After</th>
                                    <th>H to A</th>
                                    <th>Leave Updated by</th>
                                    <th>Basic</th>
                                    <th>HR</th>
                                    <th>HR Type</th>
                                    <th>HMCFAA</th>
                                    <th>MED</th>
                                    <th>CONV</th>
                                    <th>FOOD</th>
                                    <th>Breakup Setup By</th>
                                    <th>Add1</th>
                                    <th>Add2</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($setups as $row)
                                <tr>
                                    <td>{!! $row->id !!}</td>
                                    <td>{!! $row->grade !!}</td>
                                    <td>{!! $row->pl !!}</td>
                                    <td>{!! $row->sl !!}</td>
                                    <td>{!! $row->cl !!}</td>
                                    <td>{!! $row->el !!}</td>
                                    <td>{!! $row->ml !!}</td>
                                    <td>{!! $row->mt !!}</td>
                                    <td>{!! $row->fl !!}</td>
                                    <td>{!! $row->total !!}</td>
                                    <td>{!! $row->ot !!}</td>
                                    <td>{!! $row->ot_count_after !!}</td>
                                    <td>{!! $row->epdp !!}</td>
                                    <td>{!! $row->att_bonus !!}</td>
                                    <td>{!! $row->nt_bonus !!}</td>
                                    <td>{!! $row->nt_amount !!}</td>
                                    <td>{!! $row->weekend_starts_after !!}</td>
                                    <td>{!! $row->h_to_a !!}</td>
                                    <td>{!! $row->leave_updated_by !!}</td>
                                    <td>{!! $row->basic !!}</td>
                                    <td>{!! $row->hr !!}</td>
                                    <td>{!! $row->hr_type !!}</td>
                                    <td>{!! $row->hmcfaa !!}</td>
                                    <td>{!! $row->med !!}</td>
                                    <td>{!! $row->conv !!}</td>
                                    <td>{!! $row->food !!}</td>
                                    <td>{!! $row->breakup_setup_by !!}</td>
                                    <td>{!! $row->add1 !!}</td>
                                    <td>{!! $row->add2 !!}</td>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Religion info</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('hr.site') }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <table class="table table-striped table-bordered nowrap table-responsive-sm table-condensed" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Site Name</th>
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
<script>

$(document).ready(function() {


//Buttons examples
var table = $('#datatable-buttons').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis'],
    scrollX:true,
    pageLength: 50
});

table.buttons().container()
    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});

</script>

@endsection