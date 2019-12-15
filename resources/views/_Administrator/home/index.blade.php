@extends('_Administrator.layouts.main')
@section('content')
<!-- Start content -->
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                    <ul class="dropdown-menu drop-menu-right" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>

                <h4 class="page-title">Dashboard</h4>
                <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-attach-money text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">31,570</b></h3>
                        <p class="text-muted">Total Revenue</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-custom pull-left">
                        <i class="md md-add-shopping-cart text-custom"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">280</b></h3>
                        <p class="text-muted">Today's Sales</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-equalizer text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
                        <p class="text-muted">Conversion</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-custom pull-left">
                        <i class="md md-remove-red-eye text-custom"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">64,570</b></h3>
                        <p class="text-muted">Today's Visits</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0 m-b-30">Total Revenue</h4>

                    <div class="widget-chart text-center">
                        <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#34d3eb" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                        <h5 class="text-muted m-t-20">Total sales made today</h5>
                        <h2 class="font-600">$75</h2>
                        <ul class="list-inline m-t-15">
                            <li>
                                <h5 class="text-muted m-t-20">Target</h5>
                                <h4 class="m-b-0">$1000</h4>
                            </li>
                            <li>
                                <h5 class="text-muted m-t-20">Last week</h5>
                                <h4 class="m-b-0">$523</h4>
                            </li>
                            <li>
                                <h5 class="text-muted m-t-20">Last Month</h5>
                                <h4 class="m-b-0">$965</h4>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card-box">

                    <h4 class="text-dark header-title m-t-0">Total Sales</h4>

                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #7e57c2;"></i>Desktops</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #34d3eb;"></i>Tablets</h5>
                            </li>
                        </ul>
                    </div>

                    <div id="morris-line-example" style="height: 300px;"></div>

                </div>
            </div>



        </div>
        <!-- end row -->


        <div class="row">

            <div class="col-lg-6">

                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #7e57c2;"></i>Desktops</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #b39ddb;"></i>Tablets</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #ede7f6;"></i>Mobiles</h5>
                            </li>
                        </ul>
                    </div>
                    <div id="morris-bar-stacked" style="height: 303px;"></div>
                </div>

            </div>

            <!-- col -->

            <div class="col-lg-6">
                <div class="card-box">
                    <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a>
                    <h4 class="text-dark header-title m-t-0">Recent Orders</h4>
                    <p class="text-muted m-b-30 font-13">
                        Your awesome text goes here.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-actions-bar">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Order Date</th>
                                    <th>Order Number</th>
                                    <th>Amount</th>
                                    <th style="min-width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="assets/images/products/iphone.jpg" class="thumb-sm" alt=""> </td>
                                    <td>08/10/2015</td>
                                    <td><a href="#">UB#160924</a></td>
                                    <td>$1,256</td>
                                    <td>
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="assets/images/products/samsung.jpg" class="thumb-sm" alt=""> </td>
                                    <td>08/10/2015</td>
                                    <td><a href="#">UB#160923</a></td>
                                    <td>$2,562</td>
                                    <td>
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="assets/images/products/lumia.jpg" class="thumb-sm" alt=""> </td>
                                    <td>08/10/2015</td>
                                    <td><a href="#">UB#160922</a></td>
                                    <td>$6,458</td>
                                    <td>
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="assets/images/products/imac.jpg" class="thumb-sm" alt=""> </td>
                                    <td>07/10/2015</td>
                                    <td><a href="#">UB#160921</a></td>
                                    <td>$1,256</td>
                                    <td>
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="assets/images/products/macbook.jpg" class="thumb-sm" alt=""> </td>
                                    <td>07/10/2015</td>
                                    <td><a href="#">UB#160920</a></td>
                                    <td>$7,521</td>
                                    <td>
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->
@endsection