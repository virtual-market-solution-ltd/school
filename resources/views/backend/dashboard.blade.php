@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <!-- Start Profile Widget -->
                        <div class="profile-widget text-center">
                            <img src="/assets/images/icon_amar_school.png" class="thumb-lg rounded-circle img-thumbnail" alt="img">
                            <h5>Jonathan Doe</h5>
                            <p><i class="fa fa-map-marker"></i> London</p>

                            <p class="text-muted">Lorem ipsum dolor sit ametetur adipisicing elit,
                                sed do eiusmod tempor incididunt adipisicing elit.</p>
                            <a href="#" class="btn btn-sm btn-purple m-t-20">Follow</a>
                            <ul class="list-inline row m-t-20 clearfix">
                                <li class="col-md-4">
                                    <p class="m-b-5 font-18 font-600">23514</p>
                                    <p class="mb-0">Followers</p>
                                </li>
                                <li class="col-md-4">
                                    <p class="m-b-5 font-18 font-600">2510</p>
                                    <p class="mb-0">Photos</p>
                                </li>
                                <li class="col-md-4">
                                    <p class="m-b-5 font-18 font-600">68541</p>
                                    <p class="mb-0">Like</p>
                                </li>
                            </ul>
                        </div>
                        <!-- End Profile Widget -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-purple">25140</span>
                        Total Sales
                    </div>
                    <div class="clearfix"></div>
                    <p class=" mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-blue-grey">65241</span>
                        New Orders
                    </div>
                    <div class="clearfix"></div>
                    <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-buffer"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-brown">85412</span>
                        New Users
                    </div>
                    <div class="clearfix"></div>
                    <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-coffee"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-teal">20544</span>
                        Unique Visitors
                    </div>
                    <div class="clearfix"></div>
                    <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                </div>
            </div>
        </div>


    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection