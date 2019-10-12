@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
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
                        <h4 class="mt-0 m-b-30 header-title">Grade List</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap table-responsive-sm table-condensed text-center" id="datatable-buttons">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                    <th>Grade</th>
                                    <td>{!! $row->grade !!}</td>
                                    <th>PL</th>
                                    <td>{!! $row->pl !!}</td>
                                    <th>SL</th>
                                    <td>{!! $row->sl !!}</td>
                                    <th>CL</th>
                                    <td>{!! $row->cl !!}</td>
                                    <th>EL</th>
                                    <td>{!! $row->el !!}</td>
                                    <th>ML</th>
                                    <td>{!! $row->ml !!}</td>
                                    <th>MT</th>
                                    <td>{!! $row->mt !!}</td>
                                    <th>FL</th>
                                    <td>{!! $row->fl !!}</td>
                                    <th>Total</th>
                                    <td>{!! $row->total !!}</td>
                                    <th>Over Time</th>
                                    <td>{!! $row->ot !!}</td>
                                    <th>Over Time Count Start</th>
                                    <td>{!! $row->ot_count_after !!}</td>
                                    <th>EPDP</th>
                                    <td>{!! $row->epdp !!}</td>
                                    <th>ATT Bonus</th>
                                    <td>{!! $row->att_bonus !!}</td>
                                    <th>NT Bonus</th>
                                    <td>{!! $row->nt_bonus !!}</td>
                                    <th>NT Amount</th>
                                    <td>{!! $row->nt_amount !!}</td>
                                    <th>Weekend Start After</th>
                                    <td>{!! $row->weekend_starts_after !!}</td>
                                    <th>H to A</th>
                                    <td>{!! $row->h_to_a !!}</td>
                                    <th>Leave Updated by</th>
                                    <td>{!! $row->leave_updated_by !!}</td>
                                    <th>Basic</th>
                                    <td>{!! $row->basic !!}</td>
                                    <th>HR</th>
                                    <td>{!! $row->hr !!}</td>
                                    <th>HR Type</th>
                                    <td>{!! $row->hr_type !!}</td>
                                    <th>HMCFAA</th>
                                    <td>{!! $row->hmcfaa !!}</td>
                                    <th>MED</th>
                                    <td>{!! $row->med !!}</td>
                                    <th>CONV</th>
                                    <td>{!! $row->conv !!}</td>
                                    <th>FOOD</th>
                                    <td>{!! $row->food !!}</td>
                                    <th>Breakup Setup By</th>
                                    <td>{!! $row->breakup_setup_by !!}</td>
                                    <th>Add1</th>
                                    <td>{!! $row->add1 !!}</td>
                                    <th>Add2</th>
                                    <td>{!! $row->add2 !!}</td>
                                    <th>Status</th>
                                    <td>
                                        @if($row->inactive == 0)<button class="btn btn-sm btn-primary">Active</button> @endif 
                                        @if($row->inactive == 1)<button class="btn btn-sm btn-primary">Inactive</button> @endif 
                                    </td>
                                </tr>


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