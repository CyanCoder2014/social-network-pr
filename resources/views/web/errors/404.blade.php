<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>404</title>

    <!-- ====Favicons==== -->
    <link rel="shortcut icon" href="}" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">


    <!-- ====Google Font Stylesheet==== -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- ====Font Awesome Stylesheet==== -->
    <link href="{{ asset('pars-rood/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- ====Bootstrap Stylesheet==== -->
    <link href="{{ asset('pars-rood/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ====Main Stylesheet==== -->
    <link href="{{ asset('pars-rood/style.css') }}" rel="stylesheet">

    <!-- ====Responsive Stylesheet==== -->
    <link href="{{ asset('pars-rood/css/responsive-style.css') }}" rel="stylesheet">

    <!-- ====Main Color Scheme CSS==== -->
    <link href="{{ asset('pars-rood/css/main-color-1.css') }}" rel="stylesheet" type='text/css' id="mainColorScheme">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader--bounce">
            <div class="preloader-bouncer--1"></div>
            <div class="preloader-bouncer--2"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- 404 Area Start -->
        <div id="f0f" data-bg-img="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="vc-parent">
                            <div class="vc-child">
                                <div class="section-title">
                                    <h2>404</h2>
                                </div>
                                <div class="description">
                                    <p>It Looks Like Nothing Was Found At This Location. Maybe Try One Of The Links Below Or A Search?</p>
                                    <a href="{{ url('/') }}" class="btn btn-lg btn-custom"><i class="fa fa-home"></i>Go Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 Area End -->
    </div>
    <!-- Wrapper End -->

    <!-- ====jQuery Core Script==== -->
    <script src="{{ asset('pars-rood/js/jquery-2.2.2.min.js')}}"></script>

    <!-- ====RetinaJS JavaScript==== -->
    <script src="{{ asset('pars-rood/js/retina.min.js')}}"></script>

    <!-- ====Main Script==== -->
    <script src="{{ asset('pars-rood/js/main.js')}}"></script>
</body>
</html>
