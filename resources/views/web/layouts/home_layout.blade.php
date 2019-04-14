<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>  @lang('home.title') </title>
    <meta name="description" content="Rata Tourism System, ERP system, FinTech ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script> <![endif]-->
    <!-- Place favicon.ico in the root directory -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href='<?= Url('assets/assets/fonts/sahel.ttf'); ?>' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= Url('assets/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/responsive.css'); ?>">
    @if(App::getLocale() == 'en')
        <link rel="stylesheet" href="<?= Url('assets/css/style-en.css'); ?>">
    @elseif(App::getLocale() == 'fa')
        <link rel="stylesheet" href="<?= Url('assets/css/style.css'); ?>">
    @endif

</head>
<body>
<!-- start preloader
<div id="loader-wrapper">
    <div class="logo"></div>
    <div id="loader">
    </div>
</div>
<!-- end preloader -->
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Start Header Section -->





<!-- Navigation
   ==========================================-->
<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" style="
        @if(App::getLocale() == 'fa')
                float: right
        @endif
">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="<?=URL::to(App::getLocale()) . '/'; ?>"><img  src="<?= Url('/img/samane-logo-09.png'); ?>" style="height: 60px"> </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->


        <nav id="nav_menu">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="
            @if(App::getLocale() == 'fa')
                    float: left; direction: rtl;
            @elseif(App::getLocale() == 'en')
                    font-size: 11px;
            @endif
">
                <ul class="nav navbar-nav navbar-right" style="direction: rtl" >
                    <li>

                        @if (App::getLocale() == 'fa')
                            <a href="<?= Url('/en/' . Request::segment(2) . '/' . Request::segment(3) . '/' . Request::segment(4)) ?>"><img
                                        src="<?= Url('img/uk_flag.png'); ?>"
                                        alt="" style="width: 22px;height: 16px;margin-left: 8px"/>English</a>
                        @elseif(App::getLocale() == 'en')

                            <a href="<?= Url('/fa/' . Request::segment(2) . '/' . Request::segment(3) . '/' . Request::segment(4)); ?>"
                               style="font-family: Tahoma, Geneva, sans-serif"><img
                                        src="<?= Url('img/ir_flag.jpg'); ?>"
                                        alt="" style="width: 22px;height: 16px;margin-left: 8px"/>فارسی</a>
                        @endif

                    </li>
                    <li><a href="<?= URL::to(App::getLocale()) . '/content/category'; ?>" class="page-scroll">@lang('home.Blog')</a></li>
                    <li><a href="#tf-services" class="page-scroll">@lang('home.Services')</a></li>
                    <li><a href="#tf-about" class="page-scroll"> @lang('home.Consulting')</a></li>
                    <li><a href="#tf-testimonials" class="page-scroll">@lang('home.About') </a></li>
                    <li><a href="#tf-works" class="page-scroll">@lang('home.Products')</a></li>
                    <li><a href="#tf-team" class="page-scroll">@lang('home.customers')</a></li>
                    <li><a href="#tf-contact" class="page-scroll">@lang('home.Contact') </a></li>
                    @if ( Auth::check() )
                        <li><a href="#">{{Auth::user()->name}}<i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a class="page-scroll" id="bs-example-navbar-collapse-1" href="<?=URL::to(App::getLocale()) . '/ticket/create'; ?>"> @lang('home.TicketSend')  </a></li>
                                <li><a class="page-scroll" href="<?= URL::to(App::getLocale()) . '/logout'; ?>">  @lang('home.logout')</a></li>
                                <li><a class="page-scroll" target="_blank" href="http://89.221.83.51:1093/SecuritySSO/Login.jsp?siteUrl=http%3a%2f%2f89.221.83.51%3a80%2fHRM%2fSignIn.aspx">  @lang('home.Persons') </a></li>

                            </ul>
                        </li>

                    @else
                        <li><a href="#">@lang('home.users')  <i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a class="page-scroll" id="bs-example-navbar-collapse-1" href="<?= URL::to(App::getLocale()) . '/ticket/create'; ?>"> @lang('home.TicketSend') </a></li>
                                <li><a class="page-scroll" href="<?=URL::to(App::getLocale()) . '/login'; ?>">@lang('home.login') </a></li>
                                <li><a class="page-scroll" href="<?= URL::to(App::getLocale()) . '/register'; ?>"> @lang('home.Register')</a></li>
                                <li><a class="page-scroll" target="_blank" href="http://89.221.83.51:1093/SecuritySSO/Login.jsp?siteUrl=http%3a%2f%2f89.221.83.51%3a80%2fHRM%2fSignIn.aspx">  @lang('home.Persons') </a></li>
                                <li><a class="page-scroll" target="_blank" href="http://89.221.83.51/PortalSKC/(S(j2f4k130bnvood2sx1orrlj5))/Default.aspx?mode=2"> @lang('home.Portal')  </a></li>

                            </ul>
                        </li>

                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->

        </nav>
    </div><!-- /.container-fluid -->
</nav>





@yield('content')



<nav id="footer">
    <div class="container">
        <div class="pull-left fnav">
            <p>
          COPYRIGHT © 2017.       <a href="http://"></a>

                <a href="http://cyancoder.co"></a></p>
        </div>
        <div class="pull-right fnav">
            <ul class="footer-social">
                <li><a href="{{$text20->link}}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{$text20->description}}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{$text20->link_fa}}"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="{{$text20->description_fa}}"><i class="fa fa-telegram"></i></a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?= Url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?= Url('assets/js/SmoothScroll.js'); ?>"></script>
<script type="text/javascript" src="<?= Url('assets/js/jquery.isotope.js'); ?>"></script>
<script src="<?= Url('assets/js/owl.carousel.js'); ?>"></script>

<!-- Javascripts
================================================== -->
<script type="text/javascript" src="<?= Url('assets/js/main.js'); ?>"></script>




</body>
</html>
