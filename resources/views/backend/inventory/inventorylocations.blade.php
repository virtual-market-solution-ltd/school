@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
            <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Inventory Locations</h4>
                            <hr>       
                            <table class="table table-bordered table-condensed text-center now-wrap table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Delivery Address</th>
                                        <th>Phone</th>
                                        <th>Fax</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($locations as $row)
                                    <tr>
                                        <td>#</td>
                                        <td>{!! $row->location_code !!}</td>
                                        <td>{!! $row->location_name !!}</td>
                                        <td>{!! $row->delivery_address !!}</td>
                                        <td>{!! $row->phone !!}</td>
                                        <td>{!! $row->fax !!}</td>
                                        <td>{!! $row->email !!}</td>
                                        <td>{!! $row->contact !!}</td>
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
                        <form class="form-horizontal" action="{{ route('inventory.inventorylocation_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                            
                            <div class="form-group">
                                <label for="location_code">Location Code</label>
                                <input class="form-control" type="text" name="location_code" id="location_code"  required>
                            </div>
                            <div class="form-group">
                                <label for="location_name">Location Name</label>
                                <input class="form-control" type="text" name="location_name" id="location_name" >
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact For deliveries</label>
                                <input class="form-control" type="text" name="contact" id="contact" >
                            </div>
                            <div class="form-group">
                                <label for="delivery_address">Address</label>
                                <input class="form-control" type="text" name="delivery_address" id="delivery_address" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone" >
                            </div>
                            <div class="form-group">
                                <label for="phone2">Secondary Phone</label>
                                <input class="form-control" type="text" name="phone2" id="phone2" >
                            </div>
                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input class="form-control" type="text" name="fax" id="fax" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" >
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