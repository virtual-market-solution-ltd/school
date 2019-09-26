@extends('layout.app')
@section('header')
<style>
    @media only screen and (max-width: 500px) and (min-width: 450px) {
        .menu-box{
            width:123px;
            height:123px;
            background-color:blue;
            padding:15px;
            color:white;
            font-size:14px;
         }
    }
    @media only screen and (max-width: 400px) and (min-width: 100px) {
        .menu-box{
            width:103px;
            height:103px;
            background-color:blue;
            padding:7px !important;
            color:white;
            font-size:14px;
         }
    }
</style>
@endsection


@section('contents')

<div class="page-content-wrapper">
<?php
/*
<script>
function getResolution() {
alert("Your screen resolution is: " + screen.width + "x" + screen.height);
}
</script>
     
<button type="button" onclick="getResolution();">Get Resolution</button>
*/
?>


    <div class="container-fluid">
        <div class="row">

                <div class="card" style="background-color:transparent !important; border:none;">
                    <div class="card-body text-center">
                        <table class="text-center" style="width:100%;background-color:transparent !important; border:none;">

                            <tr>
                                <td>
                                    <div class="menu-box">
                                        <p style="margin-top:10px;">
                                            <i class="fa fa-calendar fa-3x"></i>
                                        </p>
                                        <p>EVENTS</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="menu-box">
                                        <p><i class="fa fa-users fa-3x"></i></p>
                                        <p>ATTENDANCE</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="menu-box">
                                        <p><i class="fa fa-map-marker fa-3x"></i></p>
                                        <p>HOMEWORK</p>
                                    </div>
                                </td>


                            </tr>
                            <tr>
                                <td>
                                    <div class="menu-box">
                                        <p><i class="fa fa-map-marker fa-3x"></i></p>
                                        <p>CLASSWORK</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="menu-box">
                                        <p><i class="fa fa-map-marker fa-3x"></i></p>
                                        <p>TRANSPORT</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="menu-box">
                                        <p><i class="fa fa-map-marker fa-3x"></i></p>
                                        <p style="font-size:14px">EXAM ROUTINE</p>
                                    </div>
                                </td>


                            </tr>


                        </table>
                    </div>
                </div>

        </div>
        <?php 
        /*
            <div class="row">
                <div class="col-xl-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <!-- Start Profile Widget -->
                            <div class="profile-widget text-center">
                                <img src="/assets/images/icon_amar_school.png" class="thumb-lg rounded-circle img-thumbnail" alt="img">
                                <h5>{!! Auth::user()->fullname !!}</h5>
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
        */
        ?>


    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection