@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Inventory Location Transfers</h4>

                        <hr>
                        <form class="form-horizontal" action="{{ route('attendance.index') }}" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="">From Location</label>
                                <select class="form-control" name="" id="">
                                    @foreach($locations as $location)
                                        <option value="">{!! $location->location_name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">To Location</label>
                                <select class="form-control" name="" id="">
                                    @foreach($locations as $location)
                                        <option value="">{!! $location->location_name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Reference</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="form-group">
                                <label for="">Transfer Type</label>
                                <select class="form-control" name="" id="">
                                    <option value="">Default</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Item</label>
                                <select class="form-control" name="" id="">
                                    @foreach($items as $item)
                                        <option value="">{!! $item->item_code." - ".$item->description !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input class="form-control" type="number" minimum="0">
                            </div>
                            <div class="form-group">
                                <label for="">Memo</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
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