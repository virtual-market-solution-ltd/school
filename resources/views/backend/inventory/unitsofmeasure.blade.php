@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
            <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Inventory Movements</h4>
                            <hr>       
                            <table class="table table-bordered table-condensed text-center now-wrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Abbreviation</th>
                                        <th>Name</th>
                                        <th>Decimal</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($units as $row)
                                    <tr>
                                        <td>#</td>
                                        <td>{!! $row->abbr !!}</td>
                                        <td>{!! $row->name !!}</td>
                                        <td>{!! $row->decimals !!}</td>
                                        <td>{!! $row->inactive !!}</td>

                                        <td>EDIT</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>               
                        </div>
                    </div>
            </div>
            <div class="col-xl-4">
            <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Inventory Locations</h4>
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
                        <form class="form-horizontal" action="{{ route('inventory.unitofmeasure_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">

                            <div class="form-group">
                                <label for="abbr">Abbreviation</label>
                                <input class="form-control" type="text" name="abbr" id="abbr"  required>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"  required>
                            </div>
                            <div class="form-group">
                                <label for="decimals">Decimals</label>
                                <select class="form-control" name="decimals" id="">
                                    <option value="0">YES</option>
                                    <option value="1">NO</option>
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
    $('').DataTable();
} );
</script>
@endsection