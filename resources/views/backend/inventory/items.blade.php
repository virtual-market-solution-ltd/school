@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            
            @csrf
                <div class="col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-30 header-title">Add Item</h4>
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
                            <form class="" action="{{ route('inventory.add_items_store') }}" method="post">
                            @csrf
                            <div class="form-horizontal">
                                <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">
                                
                                <div class="form-group">
                                    <label for="item_code">Item Code</label>
                                    <input class="form-control" type="text" name="item_code" id="item_code"  required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input class="form-control" type="text" name="description" id="description"  required>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $row)
                                            <option value="{!! $row->category_id !!}">{!!  $row->description !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tax_type_id">Item Tax Type</label>
                                    <select class="form-control" name="tax_type_id" id="tax_type_id">
                                        @foreach($tax_types as $row)
                                            <option value="{!! $row->id !!}">{!!  $row->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="units">Units of Measure</label>
                                    <select class="form-control" name="units" id="units">
                                        @foreach($units as $row)
                                            <option value="{!! $row->abbr !!}">{!!  $row->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="dimension_id">Dimension</label>
                                    <select class="form-control" name="dimension_id" id="dimension_id">
                                        @foreach($dimensions as $row)
                                            <option value="{!! $row->id !!}">{!!  $row->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sales_account">Sales Account</label>
                                    <select class="form-control" name="sales_account" id="sales_account">
                                        @foreach($sales_account as $row)
                                            <option value="{!! $row->account_code !!}">{!! $row->account_code."  ".$row->account_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inventory_account">Inventory Account</label>
                                    <select class="form-control" name="inventory_account" id="inventory_account">
                                        @foreach($inventory_account as $row)
                                            <option value="{!! $row->account_code !!}">{!!  $row->account_code."  ".$row->account_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cogs_account">Cogs Account</label>
                                    <select class="form-control" name="cogs_account" id="cogs_account">
                                        @foreach($cogs_account as $row)
                                            <option value="{!! $row->account_code !!}">{!!  $row->account_code."  ".$row->account_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adjustment_account">Inventory Adjustment</label>
                                    <select class="form-control" name="adjustment_account" id="adjustment_account">
                                        @foreach($inventory_adjustment as $row)
                                            <option value="{!! $row->account_code !!}">{!!  $row->account_code."  ".$row->account_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inactive">Item Status</label>
                                    <select class="form-control" name="inactive" id="inactive">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            </form>      
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