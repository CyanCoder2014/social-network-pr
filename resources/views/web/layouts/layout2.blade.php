<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="user-scalable = yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>  {{ $setting->data['title']}} </title>

    <meta name="discription" content="helpme landing page template" >
    <meta name="keyword" content="helpme is non profit charity landing page">
    <meta name="author" content="DesignsVilla">
    <!--================================BOOTSTRAP STYLE SHEETS================================-->

    <link rel="stylesheet" type="text/css" href="{{asset('index/bootstrap/css/bootstrap.css')}}">

    <!--================================ Main STYLE SHEETs====================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('index/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('index/css/responsive.css')}}">

    <!--================================ colors STYLE SHEETs====================================-->
    <link class="alt" href="{{asset('index/css/colors/green.css')}}" media="screen" rel="stylesheet"  title="color1" type="text/css">

    <!--================================COLORBOX==========================================-->

    {{--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>--}}

    <!--================================FONTAWESOME==========================================-->

    <link rel="stylesheet" type="text/css" href="{{asset('index/css/font-awesome.css')}}">

    <!--================================GOOGLE FONTS=========================================-->

    <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,300italic,400italic,500,500italic,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>

</head>

<body>



<!--===========================================MAIN NAV======================================-->
<div id="page">
    <section id="nav">
        <header id="header" class="navbar-static-top">
            <div class="main-header">
                <div class="mobile-menu-wrap"><a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle"></a></div>
                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="{{ url('/') }}" title="home">
                            <img class="nav-logo-3" style="height: 80px" src="{{asset($setting->data['image'])}}" alt="{{ $setting->data['title']}}" />
                        </a>
                    </h1>

                    <nav id="main-menu" role="navigation">
                        <ul class="menu">

                            <li class="menu-item-has-children active">
                                <a class="scroll" href="{{ url('/#page')}}">خانه</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{route('all_content')}}">بلاگ</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{ url('/#about-us')}}">@lang('home.Services')</a>
                            </li>
                            {{--<li class="menu-item-has-children">--}}
                            {{--<a class="scroll" href="#latest-causes">CAUSES</a>--}}
                            {{--</li>--}}
                            {{--<li class="menu-item-has-children">--}}
                            {{--<a class="scroll" href="#upcoming-events">EVENTS</a>--}}
                            {{--</li>--}}
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{ url('/#gallary')}}">پروژه ها</a>
                                <ul style="left:0;">
                                    @foreach($prcategories as $prcategory)
                                        <li class=""><a href="{{route('category',['url' => $prcategory->id ])}}" >

                                                @if(App::getLocale() == 'en')
                                                    {{$prcategory->title}}
                                                @elseif(App::getLocale() == 'fa')
                                                    {{$prcategory->title_fa}}
                                                @endif

                                            </a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{ url('/#blog-news')}}">خبر ها</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{ url('/#funfact')}}">مهارت ها</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a class="scroll" href="{{ url('/#team')}}">تیم ما</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children active">
                            <a class="scroll" href="#page">خانه</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a class="scroll" href="#about-us">@lang('home.Services')</a>
                        </li>
                        {{--<li class="menu-item-has-children">--}}
                        {{--<a class="scroll" href="#latest-causes">CAUSES</a>--}}
                        {{--</li>--}}
                        {{--<li class="menu-item-has-children">--}}
                        {{--<a class="scroll" href="#upcoming-events">EVENTS</a>--}}
                        {{--</li>--}}
                        <li class="menu-item-has-children">
                            <a class="scroll" href="#gallary">پروژه ها</a>
                            <ul style="left:0;">
                                @foreach($prcategories as $prcategory)
                                    <li class=""><a href="{{route('category',['url' => $prcategory->id ])}}" >

                                            @if(App::getLocale() == 'en')
                                                {{$prcategory->title}}
                                            @elseif(App::getLocale() == 'fa')
                                                {{$prcategory->title_fa}}
                                            @endif

                                        </a></li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a class="scroll" href="#blog-news">خبر ها</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a class="scroll" href="#funfact">مهارت ها</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a class="scroll" href="#team">تیم ما</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </section>
    <!--===========================================Static Header================================-->



@yield('content')


<!--================================FOOTER===========================================-->

    <div class="footer"><!--footer-->
        <div class="container clearfix"><!--footer container-->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3"><!--footer about-->
                    <div class="footer-logo">
                        <a href="{{ url('/') }}" title="home">
                            <img class="nav-logo-3" style="height: 80px" src="{{asset($setting->data['image'])}}" alt="{{ $setting->data['title']}}" />
                        </a>
                    </div>
                    <div class="footer-disc">
                        <p>{{$setting->data['about_us']}}</p>
                    </div>

                </div><!--footer about end-->

                <div class="col-xs-12 col-sm-6 col-md-3"><!--footer blog post-->
                    <div class="footer-title">
                        <h6>خبرها</h6>
                    </div>
                    @foreach($footer_contents as $item)
                        <div class="footer-blog-post clearfix">
                            <div class="footer-post-thumb">
                                <img style="max-height: 75px; max-width: 75px;" src="{{asset($item->images)}}" alt="footer blog post"/>
                            </div>
                            <div class="footer-post-content">
                                <a href="{{route('content',['url'=>$item->id])}}">
                                    @if(App::getLocale() == 'en')
                                        {{$item->title}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$item->title_fa}}
                                    @endif ...</a>
                                <ul>
                                    <li class="post_date">{!! Jdate::to_jalali($item->created) !!}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div><!--footer blog post end-->

                <div class="col-xs-12 col-sm-6 col-md-3"><!--footer photos-->
                    <div class="footer-title">
                        <h6>پروژه ها</h6>
                    </div>
                    <div class="footer-photos">
                        @foreach($footer_project as $item)
                            <div class="thumb first">
                                <a href="{{route('project',['url'=>$item->id])}}"><img style="max-height: 75px" src="{{asset('images/' . $item->images)}}" alt="photos"/></a>
                                <div class="overlay"></div>
                            </div>
                        @endforeach

                    </div>
                </div><!--footer photos end-->

                <div class="col-xs-12 col-sm-6 col-md-3"><!--footer item tags-->
                    <div class="footer-title">
                        <h6>ثبت نام در خبرنامه</h6>
                    </div>
                    <div class="footer-contact-widget">
                        <div id="contact_form" class="footer-contact-form">
                            <form method="post" action="{{route('subscribe')}}">
                                {{csrf_field()}}
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="نام" required="required">
                                </div>
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="ایمیل" required="required">
                                </div>
                                <div class="input-field">
                                    <input type="submit" value="ارسال" id="footer-form-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--footer items tags end-->
            </div>
            <div id="contact_results"></div>
        </div><!--footer container end-->
        <div class="footer-bottom"><!--footer bottom copyrights-->
            <div class="copyright" style="text-align:center;">Copyright {{date('Y')}}. Design adn Develop: <a target="_blank" class="tooltip1" href="http://cyancoder.co">Cyan
                    Coder<span style="margin-right: -300px" class="tooltiptext1">Branding &amp; Business Marketing | website &amp; Mobile App Development</span>
                </a>
            </div>
        </div><!--footer bottom copyrights end-->
    </div><!--footer end-->
</div><!--#page end-->


<!--================================JQuery===========================================-->

<script type="text/javascript" src="{{asset('index/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('index/js/jquery.js')}}"></script><!-- jquery 1.11.2 -->
<script type="text/javascript" src="{{asset('index/js/jquery.easing.1.3.js')}}"></script>

<!--================================BOOTSTRAP===========================================-->
<script src="{{asset('index/js/bootstrap.min.js')}}"></script>

<!--================================ message display ===========================================-->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    }

    @if(Session::has('message'))
        toastr.info("{{ Session::get('message') }}");
    @endif

    @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
    @endif


    @if(Session::has('info'))
toastr.info("{{ Session::get('info') }}");
    @endif


    @if(Session::has('warning'))
toastr.warning("{{ Session::get('warning') }}");
    @endif


    @if(Session::has('error'))
toastr.error("{{ Session::get('error') }}");
    @endif


      @if ($errors->any())

              @foreach ($errors->all() as $error)
toastr.error("{{  $error }}")
    @endforeach

    @endif


</script>

<!--================================PROGRESS BAR===========================================-->

<script src="{{asset('index/js/SmoothScroll.js')}}"></script>
<!--================================RATINGS===========================================-->

<script src="{{asset('index/js/jquery.raty-fa.js')}}"></script>
<script src="{{asset('index/js/rate.js')}}"></script>

<!--================================PROGRESS BAR===========================================-->

<script src="{{asset('index/js/pbar.js')}}"></script>

<!--================================GALLARY ===========================================-->

<script src="{{asset('index/js/jquery.isotope.min.js')}}"></script><!-- isotop -->
<script src="{{asset('index/js/script.js')}}"></script>

<!--================================COLORBOX==========================================-->

{{--<script src="{{asset('index/assets/colorbox/jquery.colorbox.js')}}"></script>--}}
{{--<script src="{{asset('index/assets/colorbox/colorbox-triger.js')}}"></script>--}}


<!--================================static header height===========================================-->
<script type="text/javascript" src="{{asset('index/js/height.js')}}"></script>

<!--================================OWL CARESOUL=============================================-->

<script src="{{asset('index/js/owl.carousel.js')}}"></script>
<script src="{{asset('index/js/triger.js')}}" type="text/javascript"></script>
<!--================================form integration=============================================-->
<script src="{{asset('index/mail/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('index/mail/mailchimp.js')}}"></script>
<script src="{{asset('index/mail/form-triger.js')}}"></script>
<!--================================FunFacts Counter===========================================-->
<script src="{{asset('index/js/jquery.countTo.js')}}"></script>
<!--================================video===========================================-->
<script src="{{asset('index/assets/html5lightbox/html5lightbox.js')}}"></script>
<!--================================NAVIGATION===========================================-->

<script type="text/javascript" src="{{asset('index/js/navigation.js')}}"></script>
<script type="text/javascript" src="{{asset('index/js/onepagescroll.js')}}"></script>
<!--================================waypoint===========================================-->

<script type="text/javascript" src="{{asset('index/js/jquery.waypoints.min.js')}}"></script><!-- Countdown JS FILE -->

<!--================================custom script===========================================-->
<script type="text/javascript" src="{{asset('index/js/custom.js')}}"></script>
<script src="{{asset('index/js/jquery.vide.js')}}"></script>
<!--================================COUNTDOWN===========================================-->
<script type="text/javascript" src="{{asset('index/js/countdown.js')}}"></script><!-- Countdown JS FILE -->
<script type="text/javascript" src="{{asset('index/js/countdown-triger.js')}}"></script><!-- Countdown JS FILE -->

</body>
</html>