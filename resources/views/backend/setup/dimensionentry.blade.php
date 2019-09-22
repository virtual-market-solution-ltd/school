@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-7">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Dimension Entry</h4>
                        <hr>
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Refercene</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Closed</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dimensions as $row)
                                    <tr>
                                        <td>#</td>
                                        <td>{!! $row->reference !!}</td>
                                        <td>{!! $row->name !!}</td>
                                        <td>{!! $row->type_ !!}</td>
                                        <td>{!! $row->date_ !!}</td>
                                        <td>{!! $row->due_date !!}</td>
                                        <td>
                                             @if($row->closed == 0)
                                                NO
                                            @elseif($row->closed == 1)
                                                YES
                                            @else    
                                            @endif
                                        </td>
                                        <td>
                                            @php 
                                               echo  $balance = \App\GLTranscation::where('dimension_id',$row->closed)->sum('amount');
                                            @endphp
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">EDIT</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>   
            <div class="col-xl-5">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Dimension Entry</h4>

                        <hr>
                        <form class="form-horizontal" action="{{ route('postdimensionentry') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Dimension Reference</label>
                                <input class="form-control" type="text" value="{!! $last_dimension->reference+1 !!}" name="references" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="1">1</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input class="form-control" type="date" name="date" id="date" required>
                            </div>

                            <div class="form-group">
                                <label for="">Date Required By</label>
                                <input class="form-control" type="date" name="due_date" name="due_date" required>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="">Tags</label>
                                <input class="form-control" type="">
                            </div>
                            -->

                            <div class="form-group">
                                <label for="">Memo</label>
                                <input class="form-control" type="">
                            </div>



                            <div class="text-center">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
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
        $('.table').DataTable({});
    });

</script>

@endsection