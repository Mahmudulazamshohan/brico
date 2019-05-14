<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->

    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>{{ $site_title }} | @yield('title')</title>
    <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{{ asset('css/et-line-fonts.css') }}" type="text/css">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.style.css') }}">
    <!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic,900italic,900,300,300italic%7CMerriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Magnific PopUP CSS =-=-=-=-=-=-= -->
    <link href="{{ asset('js/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <!-- Theme Color -->
    <link rel="stylesheet" id="color" href="{{ asset('css/colors/defualt.css') }}">

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <!-- Menu Hover -->
    <link href="{{ asset('css/bootstrap-dropdownhover.min.css') }}" rel="stylesheet">
    <!-- JavaScripts -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
<div class="preloader"><span class="preloader-gif"></span></div>
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
<div class="transparent-header">
    <header class="header-area">
        <div class="navigation">
            <!-- navigation-start -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button aria-expanded="false" data-target="#main-navigation" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}"><img alt="" src="{{ asset('images/logo.png')   }} " class="img-responsive"> </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main-navigation">
                        <ul class="nav navbar-nav navbar-right custom-nav">
                            <li class="hidden-sm"><a href="{{ url('/') }}">Home</a></li>

                            <li class="hidden-sm"><a href="{{ url('about-us') }}">About Us</a></li>

                            @foreach($menu as $m)
                                <li class="hidden-sm">
                                    <a href="{{url('menu/')}}/{{$m->id}}/{{urlencode(strtolower($m->name))}}">
                                        <span>{{ $m->name }}</span>
                                    </a>
                                </li>
                            @endforeach

                            <li class="hidden-sm"><a href="{{ route('contact') }}">Contact Us</a></li>

                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-end -->
            </nav>
        </div>
    </header>
    <!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
</div>
@yield('content')
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<footer class="footer-area">
    <!--Footer Upper-->
    <div class="footer-content">
        <div class="container">
            <div class="row clearfix">
                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <div class="col-lg-7 col-sm-6 col-xs-12 column">
                            <div class="footer-widget about-widget">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="img-responsive" alt=""></a>
                                </div>
                                <ul class="contact-info">
                                    <li><span class="icon fa fa-map-marker"></span> {{ $general->address }}</li>
                                    <li><span class="icon fa fa-phone"></span> {{ $general->number }}</li>
                                    <li><span class="icon fa fa-envelope-o"></span> {{ $general->email }}</li>
                                </ul>
                                <div class="social-links-two clearfix"> <a href="{!! $general->facebook !!}" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a> <a href="{!! $general->twitter !!}" class="twitter img-circle"><span class="fa fa-twitter"></span></a> <a href="{!! $general->google_plus !!}" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a><a href="{!! $general->linkedin !!}" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a><a href="{!! $general->youtube !!}" class="linkedin img-circle"><span class="fa fa-youtube"></span></a> </div>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <h2 class="text-center">Our Mission</h2>
                            <div class="footer-widget links-widget">
                                <p class="text-center">
                                    {!! $general->mission !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Two 4th column End-->
                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <h2 class="text-center">Our Mission</h2>
                            <div class="footer-widget links-widget">
                                <p class="text-center">
                                    {!! $general->vision !!}
                                </p>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <div class="footer-widget links-widget">
                                <h2 class="text-center">Site Links</h2>
                                <ul class="text-center">
                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    @foreach($menu as $m)
                                        <li>
                                            <a href="{{url('menu/')}}/{{$m->id}}/{{urlencode(strtolower($m->name))}}">
                                                <span>{{ $m->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Two 4th column End-->
            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-copyright">
        <div class="auto-container clearfix">
            <!--Copyright-->
            <div class="copyright text-center">{!! $general->footer_text !!}</div>
        </div>
    </div>
</footer>

<!-- =-=-=-=-=-=-= Quote Modal End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap Core Css  -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Dropdown Hover  -->
<script src="{{ asset('js/bootstrap-dropdownhover.min.js') }}"></script>
<!-- Dropdown Hover  -->
<!-- Jquery Easing -->
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<!-- Jquery Counter -->
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<!-- Jquery Waypoints -->
<script src="{{ asset('js/jquery.waypoints.js') }}"></script>
<!-- Jquery Appear Plugin -->
<script src="{{ asset('js/jquery.appear.min.js') }}"></script>
<!-- Jquery Shuffle Portfolio -->
<script src="{{ asset('js/jquery.shuffle.min.js') }}"></script>
<!-- Carousel Slider  -->
<script src="{{ asset('js/carousel.min.js') }}"></script>
<!-- Jquery Migrate -->
<script src="{{ asset('js/jquery-migrate.min.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('js/color-switcher.js') }}"></script>
<!-- Gallery Magnify  -->
<script src="{{ asset('js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Sticky Bar  -->
<script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
<!-- Jquery Select Options  -->
<script src="{{ asset('js/select2.min.js') }}"></script>
<!-- Template Core JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    /* ======= Sticky Transparent Header ======= */

    $(window).on('scroll', function() {
        var header = $('.transparent-header ');
        var navbar = $('.navbar-default');
        var img = $('a.navbar-brand img');
        if ($(this).scrollTop() > 50) {
            header.find(navbar).addClass('opaque');
            header.find(img).addClass('opaque').attr('src', "{{asset('images/logo.png')}}");
        } else {
            header.find(navbar).removeClass('opaque');
            header.find(img).addClass('opaque').attr('src', "{{asset('images/logo.png')}}");
        }
    });
</script>
</body>
</html>

