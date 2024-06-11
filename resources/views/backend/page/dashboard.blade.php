@extends('backend.layout.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ul>
                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div>
            </div>

            <!----------- DASHBOARD CHART CSS ----------->
            <style>
                .canvasjs-chart-credit {
                    display: none;
                }

                .custom-btn {
                    background: rgb(96, 9, 240);
                    background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%) !important;

                    /* background: #1462ff !important;
                                                                                                                                                                border-color: rgb(0,172,238) !important; */
                    margin-left: 3px;
                    padding: 7px 8px !important;
                    color: white;
                    border-radius: 4px;
                }

                .card-section .card-item .item-body .load-data {
                    font-family: 'Fira Sans', sans-serif;
                }

                .font-fira-sans {
                    font-family: 'Fira Sans', sans-serif;
                    font-size: 26px;
                }

                .card-section .card-item .item-body .load-data,
                .card-section .card-item .dashboard-info strong,
                .card-section .card-item .dashboard-info h2,
                .card-section .card-item .dashboard-info i,
                .font-fira-sans {
                    color: white !important;
                }

                .card-section .card-item .dashboard-info>h2>i {
                    font-size: 38px;
                }

                .custom-btn:hover {
                    text-decoration: none;
                    color: white;

                    background: #1462ff !important;
                    border-color: rgb(0, 172, 238) !important;

                    /* background: rgb(6,14,131);
                                                                                                                                                                background: linear-gradient(0deg, rgba(6,14,131,1) 0%, rgba(12,25,180,1) 100%) !important; */

                    /* background: rgb(0,3,255);
                                                                                                                                                                background: linear-gradient(0deg, rgba(0,3,255,1) 0%, rgba(2,126,251,1) 100%) !important; */

                    /* background: rgb(96,9,240);
                                                                                                                                                                background: linear-gradient(0deg, rgba(96,9,240,1) 0%, rgba(129,5,240,1) 100%) !important; */

                    /* background: blue;
                                                                                                                                                                background: linear-gradient(0deg, blue 0%, blue 100%) !important; */

                    /* background: rgb(0,172,238);
                                                                                                                                                                background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%) !important; */
                }

                .custom-btn:focus {
                    outline: 0 !important;
                    outline-offset: 0 !important;

                    color: white;
                    background: rgb(96, 9, 240);
                    background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%) !important;
                }

                .chart-filter-btn {
                    width: 68px;
                    position: absolute;
                    right: 0;
                    top: 0;
                    background: #1462ff !important;
                    color: white;
                    border-color: #1462ff !important;
                    border-radius: 3px;
                    padding: 2px 0;
                }

                .datewise-filter-button:hover,
                .monthly-filter-button:hover {
                    color: white;
                    border-color: rgb(96, 9, 240) !important;
                    background: rgb(96, 9, 240);
                    background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%) !important;
                }

                .datewise-hide-button.chart-filter-btn {
                    top: 0px;
                    border-color: rgb(255, 27, 0) !important;
                    background: rgb(255, 27, 0);
                    background: linear-gradient(0deg, rgba(255, 27, 0, 1) 0%, rgba(251, 75, 2, 1) 100%) !important;
                }

                .monthly-chart-filter-btn {
                    position: absolute;
                    right: 0;
                    top: 0px;
                    width: 76px;
                    background: #1462ff !important;
                    color: white;
                    border-color: #1462ff !important;
                    border-radius: 3px;
                    padding: 2px 0;
                }

                .monthly-hide-button.monthly-chart-filter-btn {
                    top: 0px;
                    width: 60px;
                    border-color: rgb(255, 27, 0) !important;
                    background: rgb(255, 27, 0);
                    background: linear-gradient(0deg, rgba(255, 27, 0, 1) 0%, rgba(251, 75, 2, 1) 100%) !important;
                }

                .canvasjs-chart-toolbar {
                    right: -16px !important;
                    top: 8px !important;
                }

                .canvasjs-chart-toolbar>button {
                    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.25);
                    border-radius: 3px;
                    width: 30px !important;
                    padding: 5px 7px !important;
                }

                .search-bar {
                    border: none;
                    padding: 15px 15px;
                    border-radius: 4px;
                    /* background: #4c5a65; */
                    background: #4a80af;
                    box-shadow: 0px 5px 5px 0px rgb(0 0 0 / 20%);
                }

                .search-bar .search-bar-btn {
                    /* background: #4a80af !important;
                                                                                                                                                                border-color: #4a80af !important;
                                                                                                                                                                color: white !important; */
                    background: #333 !important;
                    border-color: #333 !important;
                    color: white !important;
                    border-radius: 3px;
                    transition: 0.4s;
                    padding: 5px 10px !important;
                    box-shadow: 0px 0px 5px 0px rgb(255 255 255 / 50%) !important;
                }

                .search-bar .search-bar-btn:hover {
                    background: #E0E0E0 !important;
                    border-color: #E0E0E0 !important;
                    color: #4c5a65 !important;
                }

                .border-radius-3px {
                    border-radius: 3px !important;
                }

                .datewise-filter .select2-container--default .select2-selection--single {
                    border-radius: 3px !important;
                }

                .monthly-filter .select2-container--default .select2-selection--single {
                    border-radius: 3px !important;
                }
            </style>
            <!----------- /DASHBOARD CHART CSS ----------->


            <!----------- DASHBOARD CARD CSS ----------->
            <style>
                .card-section .card-item {
                    margin-bottom: 4px !important;
                    transition: 0.3s;
                }

                .card-section .card-item .item-body {
                    border-radius: 2px;
                    background-color: aliceblue !important;
                    border: 0 !important;
                    padding: 0px !important;
                    /* box-shadow: 0px 1px 6px 1px rgb(0 0 0 / 60%); */
                    box-shadow: 0px 0px 3px 0px rgb(0 0 0 / 10%);
                    background: no-repeat 50% 50%;
                    background-size: cover;
                    height: 122px;
                    transition: 0.3s;
                }

                .card-section .card-item .item-body:hover {
                    -webkit-transform: translateY(calc(-2rem / 5));
                    transform: translateY(calc(-2rem / 5));
                    /* box-shadow: 0px 1px 6px 1px rgb(0 0 0 / 40%); */
                    box-shadow: 0px 5px 10px 0px rgba(96, 9, 240, 0.3);
                }

                .card-section .card-item .item-body .load-data {
                    margin-bottom: 0 !important;
                    font-size: 26px;
                }

                .card-section .card-item .dashboard-info strong.text-center {
                    font-size: 14px;
                    text-transform: uppercase;
                    font-weight: 500;
                }

                .effect8 {
                    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                }

                .effect7 {
                    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                }

                .card-section .card-item .overlay {
                    position: absolute;
                    z-index: 99;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    padding: 25px 15px !important;
                }
            </style>
            <!----------- /DASHBOARD CARD CSS ----------->


            <div class="page-content">

                <div class="page-header row" style="padding-left: 5px; padding-top: 20px !important; padding-bottom: 15px;">
                    <div class="col">
                        {{-- <h4 class="page-title"><i class="fa fa-list"></i> @yield('title')</h4> --}}
                    </div>

                    <div class="col text-right">
                        <div class="btn-group d-flex justify-content-between">

                            <!-- UPLOAD -->
                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('today')">
                                Today
                            </a>

                            <!-- UPLOAD -->
                            {{-- @if (hasPermission('products.upload', $slugs)) --}}
                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('yesterday')">
                                Yesterday
                            </a>
                            {{-- @endif --}}

                            <!-- CREATE -->
                            {{-- @if (hasPermission('products.create', $slugs)) --}}
                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('this week')">
                                This Week
                            </a>
                            {{-- @endif --}}

                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('this month')">
                                This Month
                            </a>

                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('this year')">
                                This Year
                            </a>

                            <a class="btn-sm custom-btn" href="javascript:void(0)" onclick="getTotalData('all')">
                                All Time
                            </a>

                        </div>
                    </div>
                </div>




                <div class="row pt-1 card-section" style="padding-left: 5px !important;">

                    <div class="col-xs-12">
                        {{-- @include('partials._alert_message') --}}
                        <!-- PAGE CONTENT ENDS -->
                    </div>


                    <!-------- Total Sell Amount ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/green.png') }}" alt="" width="100%" height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-line"></i></h2>
                                    <strong class="text-center"><b>Total Sell Amount </b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="total-sell-amount load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-------- Total Sell Count ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/purple.png') }}" alt="" width="100%" height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-analytics"></i></h2>
                                    <strong class="text-center"><b>Total Sell Count</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="total-sell-count load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------- Online Sell Amount ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/red.png') }}" alt="" width="100%" height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-pie"></i></h2>
                                    <strong class="text-center"> <b>Online Sell Amount</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="online-sell-amount load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------- Online Sell Count ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/yellow.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-bar"></i></h2>
                                    <strong class="text-center"> <b>Online Sell Count</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="online-sell-count load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------- Store Sell Amount ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/red.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-area"></i></h2>
                                    <strong class="text-center"> <b>Store Sell Amount</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="store-sell-amount load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--------- Store Sell Count ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/yellow.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><img src="{{ asset('img/candle-white.png') }}" alt="" width="16%"
                                            height="100%"></h2>
                                    <strong class="text-center-count"
                                        style="text-transform: uppercase; font-size: 14px"><b>Store Sell Count</b></strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="store-sell-count load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------- Website Sell Amount ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/green.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-pie"></i></h2>
                                    <strong class="text-center"> <b>Website Sell Amount</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="website-sell-amount load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------- Website Sell Count ------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/purple.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-chart-bar"></i></h2>
                                    <strong class="text-center"><b>Website Sell Count</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    <h3 class="website-sell-count load-data"></h3>
                                    <img class="loader-image" height="40px" width="40px"
                                        src="{{ asset('img/loader.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!------------ CUSTOMER ------------>
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/green.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-user-chart"></i></h2>
                                    <strong class="text-center"> <b>Customer</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    {{-- <h2 class="font-fira-sans">{{ $customerCount }}</h2> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <!------------- STAFF ------------->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/purple.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-clipboard-user"></i></h2>
                                    <strong class="text-center"> <b>Staff</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    {{-- <h2 class="font-fira-sans">{{ $staffs->count() }}</h2> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <!------------ PRODUCT ------------>
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/red.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-box-open"></i></h2>
                                    <strong class="text-center"> <b>Product</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    {{-- <h2 class="font-fira-sans">{{ $productCount }}</h2> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <!------- STOCKOUT PRODUCT -------->
                    {{-- <div class="col-md-3 card-item">
                    <div class="well item-body effect8" style="position: relative;">
                        <img src="{{ asset('img/widget-bg/yellow.png') }}" alt="" width="100%" height="100%">
                        <div class="overlay">
                            <div class="dashboard-info">
                                <h2><i class="fab fa-stack-exchange"></i></h2>
                                <strong class="text-center">Stockout Product</strong>
                            </div>
                            <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                <h2 class="font-fira-sans">{{ $stockOutProductCount }}</h2>
                            </div>
                        </div>
                    </div>
                </div> --}}


                    <!----- PRODUCT EXPIRING SOON ----->
                    <div class="col-md-3 card-item">
                        <div class="well item-body effect8" style="position: relative;">
                            <img src="{{ asset('img/widget-bg/red.png') }}" alt="" width="100%"
                                height="100%">
                            <div class="overlay">
                                <div class="dashboard-info">
                                    <h2><i class="fa fa-hourglass-start"></i></h2>
                                    <strong class="text-center"> <b>Product Expiring Soon</b> </strong>
                                </div>
                                <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;">
                                    {{-- <h2 class="font-fira-sans">{{ $expireSoonProductCount }}</h2> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div><!-- /.main-content -->
@endsection
