<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8"/>

    <title>{{ $site_title }} - @yield('title')</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1" name="viewport"/>

    <meta content="" name="description"/>

    <meta content="" name="author"/>



    <!-- ASSETS -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"

          type="text/css"/>

    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"

          type="text/css"/>

    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"

          type="text/css"/>

     <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"

          type="text/css"/>

    <link href="{{asset('assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components"

          type="text/css"/>

    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"

          id="style_color"/>

    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}"

          rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" /> -->

    <!-- END ASSETS -->



    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>





    <style>

        @media (min-width: 768px) {

            .abir {

                margin-left: 66px !important;

                margin-top: -44px !important;

            }



            .abir2 {

                margin-left: 166px !important;

                margin-top: -44px !important;

            }



            .abir3 {

                margin-top: -20px !important;

            }

        }
        body{
            background: #364150;
        }

    </style>

    @yield('style')



</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo">



<!-- BEGIN HEADER -->

<div class="page-header navbar navbar-fixed-top">

    <div class="page-header-inner ">





        <!-- BEGIN LOGO -->

        <div class="page-logo">

            <a href="{{--{{  }}--}}">

                <img src="{!! asset('images/logo.png') !!}" class="logo-default" alt="-"

                     style="filter: brightness(0) invert(1); width: 150px;" />



            </a>



            <div class="menu-toggler sidebar-toggler"></div>

        </div>

        <!-- END LOGO -->





        <!-- BEGIN RESPONSIVE MENU TOGGLER -->

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"

           data-target=".navbar-collapse"> </a>



        <div class="top-menu">

            <ul class="nav navbar-nav pull-right">

                <li class="dropdown dropdown-user">

                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"

                       data-close-others="true">





                        <span class="username"> Welcome, {!! Auth::guard('user')->user()->name !!} </span>

                        <i class="fa fa-angle-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-default">



                        <li><a href="{!! route('change-pass') !!}"><i class="fa fa-cogs"></i> Change Password </a>

                        </li>

                        <li><a href="{!! route('user-logout') !!}"><i class="fa fa-sign-out"></i> Log Out </a></li>



                    </ul>

                </li>

            </ul>

        </div>

    </div>

</div>

<!-- END HEADER -->





<!-- BEGIN HEADER & CONTENT DIVIDER -->

<div class="clearfix"></div>

<div class="page-container">

    <div class="page-sidebar-wrapper">

        <div class="page-sidebar navbar-collapse collapse">





            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"

                data-slide-speed="200" style="padding-top: 20px">

                <li class="sidebar-toggler-wrapper hide">

                    <div class="sidebar-toggler"></div>

                </li>



                <li class="nav-item start">

                    <a href="{!! route('dashboard') !!}" class="nav-link ">

                        <i class="icon-home"></i><span class="title">Dashboard</span>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-user"></i>

                        <span class="title">Customer</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('customer-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> Add New Customer</a></li>
                        <li class="nav-item"><a href="{!! route('customer-account')  !!} " class="nav-link"><i class="fa fa-usd"></i> Customer Account</a></li>

                        <li class="nav-item"><a href="{!! route('customer-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Invoice</a></li>

                    </ul>

                </li>


                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-user"></i>

                        <span class="title">Raw Brick</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('set-raw-brick')  !!} " class="nav-link"><i class="fa fa-plus"></i> Raw Brick </a></li>
                        

                    </ul>

                </li>



                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-database" aria-hidden="true"></i>

                        <span class="title"> Stock Info</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('stock-brick')  !!} " class="nav-link"><i class="fa fa-plus"></i> Stock Brick</a></li>

                        <li class="nav-item"><a href="{!! route('stock-invoice') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Stock Invoice</a></li>

                        <li class="nav-item"><a href="{!! route('show-stock')  !!} " class="nav-link"><i class="fa fa-desktop"></i> View Total Stock</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="{!! route('income-report') !!}" class="nav-link ">

                        <i class="icon-calendar"></i><span class="title">Income Report</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-credit-card"></i>

                        <span class="title"> Laborer Bill</span><span class="arrow"></span></a>

                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('laborer-bill')  !!} " class="nav-link"><i class="fa fa-plus"></i> Today Bill</a></li>

                        <li class="nav-item"><a href="{!! route('laborer-bill-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Bill</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-credit-card"></i>

                        <span class="title"> Loan Management</span><span class="arrow"></span></a>

                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('loan-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> Create Loan</a></li>

                        <li class="nav-item"><a href="{!! route('loan-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View All Loan</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-users"></i>

                        <span class="title"> Laborer Info</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('laborer-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Laborer</a></li>

                        <li class="nav-item"><a href="{!! route('laborer-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Laborer</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>

                        <span class="title"> Brick Category</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('brick-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Brick</a></li>

                        <li class="nav-item"><a href="{!! route('brick-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Brick</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-server"></i>

                        <span class="title"> Expense Info</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('expense-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Expense</a></li>

                        <li class="nav-item"><a href="{!! route('expense-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Expense</a></li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-credit-card"></i>

                        <span class="title"> Currency Setting</span><span class="arrow"></span></a>



                    <ul class="sub-menu">

                        <li class="nav-item"><a href="{!! route('currency_create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Currency</a></li>

                        <li class="nav-item"><a href="{!! route('currency_show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Currency</a></li>

                    </ul>

                </li>



                <li class="nav-item">

                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>

                        <span class="title">Website Setting</span><span class="arrow"></span></a>

                    <ul class="sub-menu">



                        <li class="nav-item">

                            <a href="{!! route('general_setting') !!}" class="nav-link"><i class="fa fa-cogs"></i>

                                General Setting </a>

                        </li>

                        <li class="nav-item">

                            <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>

                                <span class="title"> Partner Setting</span><span class="arrow"></span></a>



                            <ul class="sub-menu">

                                <li class="nav-item"><a href="{!! route('partner-create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Partner</a></li>

                                <li class="nav-item"><a href="{!! route('partner-show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View Partner</a></li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="{!! route('home_page_setting') !!}" class="nav-link"><i class="fa fa-cogs"></i>

                                Home Page Setting </a>

                        </li>

                        <li class="nav-item">

                            <a href="{!! route('about_page_setting') !!}" class="nav-link"><i class="fa fa-cogs"></i>

                                About Page Setting </a>

                        </li>

                        <li class="nav-item">

                            <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>

                                <span class="title"> Menu Setting</span><span class="arrow"></span></a>



                            <ul class="sub-menu">

                                <li class="nav-item"><a href="{!! route('menu_create')  !!} " class="nav-link"><i class="fa fa-plus"></i> ADD Menu</a></li>

                                <li class="nav-item"><a href="{!! route('menu_show') !!}" class="nav-link"><i class="fa fa-desktop"></i> View View</a></li>

                            </ul>

                        </li>



                    </ul>

                </li>





            </ul>

            <!-- END SIDEBAR MENU -->

        </div>

    </div>

    <!-- END SIDEBAR -->





    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper">

        <div class="page-content">

            <h3 class="page-title">{!! $page_title  !!} </h3>

            <hr>



            <!--  ==================================SESSION MESSAGES==================================  -->

            @if (session()->has('message'))

                <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session()->get('message')  !!}

                </div>

            @endif

            <!--  ==================================SESSION MESSAGES==================================  -->





            <!--  ==================================VALIDATION ERRORS==================================  -->

                @if($errors->any())

                    @foreach ($errors->all() as $error)



                        <div class="alert alert-danger alert-dismissable">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!!  $error !!}

                        </div>



                    @endforeach

                @endif

            <!--  ==================================SESSION MESSAGES==================================  -->



            @yield('content')





        </div>

    </div>

    <!-- END CONTENT -->

</div>

<!-- END CONTAINER -->





<!-- BEGIN FOOTER -->

<div class="page-footer">

    <div class="page-footer-inner"> <?php echo date("Y")?> &copy; TheSoftKing.</div>

    <div class="scroll-to-top">

        <i class="icon-arrow-up"></i>

    </div>

</div>

<!-- END FOOTER -->





<!-- BEGIN SCRIPTS -->

<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"

        type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"

        type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"

        type="text/javascript"></script>

<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"

        type="text/javascript"></script>

<script src="{{asset('assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>





@yield('scripts')





</body>

</html>