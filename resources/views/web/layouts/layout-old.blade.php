<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@if(App::getLocale() == 'en')
            {{$setting->data['title']}}
        @elseif(App::getLocale() == 'fa')
            {{$setting->data['title_fa']}}
        @endif</title>
{{--old--}}
    <link rel="stylesheet" href="/prismetric/css/bootstrap.min.css">
    <link rel="stylesheet" href="/prismetric/css/mdb.min.css">
    <link rel="stylesheet" href="/prismetric/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
{{--/old--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Seo Meta -->
    <meta name="description" content="Colangine - Responsive Multipurpose HTML Template">
    <meta name="keywords" content="Colangine, corporate, modern, creative, flat, clean, theme, template, themeforest">

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="/prismetric/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/prismetric/js1/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="styles/font-awesome/css/font-awesome.css" media="screen" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images1/favicon.ico">
    <link rel="apple-touch-icon" href="images1/apple-touch-icon.png">
    {{--<link rel="stylesheet" type="text/css" href="styles/ie.css" media="screen" />--}}
<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    @if(App::getLocale() == 'fa')
    <link rel="stylesheet" type="text/css" href="/prismetric/css/style.css" media="screen" />

   <link rel="stylesheet" href="/prismetric/css/rtl.css">
@endif

    @yield('head')
    <style>
        .dropdown-submenu {
            position: relative;
        }


        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar bg-white change-bg bg-trance">

    <!-- Navbar brand -->

    <div id="layout" class="boxed">
    <header id="header" style="margin: 0 0 0 0 !important; padding: 0 0 0 0 !important; direction: rtl; font-family: 'Yekan';font-size: 20px" >
        <div class="first-head" >
            <div class="row clearfix animtt" data-gen="fadeInDown" style="opacity:0;">
                <div class="grid_6">
                    <nav>
                        <ul class="sf-menu">
                            {{--<li><a>@lang('home.About')</a></li>--}}
                            {{--<li><a>@lang('home.Blog')</a></li>--}}
                            <li><a href="#">سمینارها</a>
                                <ul>
                                    <li><a href=""></a></li>
                                    <li><a href="">سمینار 2</a></li>
                                    <li><a href="">سمینار 3</a></li>
                                    <li><a href="#">سمینارهای خارجی</a>
                                        <ul>
                                            <li><a href="#">سمینار 1</a></li>
                                            <li><a href="#">سمینار 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">تماس با ما</a></li>
                        </ul>
                    </nav>
                </div><!-- grid 6 -->

                <div class="grid_3">
                    <div class="search">
                        <form class="searchform">
                            <input class="s" type="text" onfocus="if (this.value == 'جستجو') {this.value = '';}" onblur="if (this.value == '')  {this.value = 'جستجو';}" value="جستجو" placeholder="جستجو">
                        </form>
                    </div><!-- search -->
                </div><!-- grid 3 -->
            </div><!-- row -->
        </div><!-- first head -->

        <div class="second-head" id="sticky">
            <div class="row clearfix">
                <div class="grid_3">
                    <a href="#"><img class="logo animtt" data-gen="fadeInLeft" style="opacity:0;" src="images1/logo.png" alt="#"></a>
                </div>

                <div class="social head-social animdelay" data-gen="fadeInRight">
                    <a href=""><img src="images1/social/twitter.png" alt="#"></a>
                    <a href=""><img src="images1/social/facebook.png" alt="#"></a>
                    <a href=""><img src="images1/social/dribbble.png" alt="#"></a>
                    <a href=""><img src="images1/social/googleplus.png" alt="#"></a>
                </div>

                <nav>
                    <ul class="sf-menu">
                        <li><a>@lang('home.About')</a></li>

                        @foreach($menus as $menu)
                            <?php
                            if($menu->type == 2 || $menu->type == 3 || $menu->children->count() > 0 )
                                $nested=true;
                            else
                                $nested=false;
                            ?>
                            <li>
                                <a class="nav-link  @if($nested) dropdown-toggle @endif text-uppercase waves-effect waves-light"  @if($nested) data-toggle="dropdown" @endif
                                href="{!!  $menu->link_maker(App::getLocale()) !!}">{{ $menu->name[App::getLocale()] }}
                                    @if($nested) <span class="caret"></span> @endif
                                </a>
                                @if($nested)
                                    <ul>
                                        @if($menu->type != 1)
                                            @foreach($menu->items() as $item)
                                                <li><a href="{{$item->link()}}" tabindex="-1">
                                                        @if(App::getLocale() == 'en')
                                                            {{$item->title}}
                                                        @elseif(App::getLocale() == 'fa')
                                                            {{$item->title_fa}}
                                                        @endif

                                                    </a></li>
                                            @endforeach
                                            @foreach($menu->children as $child)
                                                @include('layouts.menu',['menu'=> $child])
                                            @endforeach
                                        @endif

                                    </ul>
                                @endif
                            </li>
                        @endforeach

                        <li>
                            <?php
                            $prefix = 'fa';
                            $prefix2 = 'en';
                            $path = Request::path();

                            if (substr($path, 0, strlen($prefix)) == $prefix) {
                                $path = substr($path, strlen($prefix));
                            }
                            elseif (substr($path, 0, strlen($prefix2)) == $prefix2) {
                                $path = substr($path, strlen($prefix2));
                            }
                            ?>
                            @if (App::getLocale() == 'fa')
                                <a href="<?= Url('en/' . $path) ?>"
                                   class="nav-link  text-uppercase waves-effect waves-light"><img
                                            src="<?= Url('/prismetric/img/uk_flag.png'); ?>"
                                            style="margin: 2px; margin-top: 0; height: 19px;width: 38px; border: 1px solid #5e5e5e;"
                                            alt=""/>English</a>


                            @elseif(App::getLocale() == 'en')
                                <a href="<?= Url('fa/' . $path); ?>"
                                   style="font-family: Tahoma, Geneva, sans-serif"
                                   class="nav-link  text-uppercase waves-effect waves-light"><img
                                            src="<?= Url('/prismetric/img/ir_flag.jpg'); ?>"
                                            style="margin: 2px; margin-top: 0; height: 19px;width: 38px; border: 1px solid #5e5e5e;"
                                            alt=""/>فارسی</a>
                            @endif
                        </li>

                    </ul>

                </nav>
            </div><!-- row -->
        </div><!-- second head -->
    </header>
    </div>














@yield('content')

<div class="small-contact">
    <button class="contact-btn"><i class="fas fa-phone"></i></button>
    <address style="color: #fff;padding: 10px">
        <p><i class="fa fa-fw fa-map-marker"></i>@if(App::getLocale() == 'en')
                {{ $contact->data['adress'] }}
            @elseif(App::getLocale() == 'fa')
                {{ $contact->data['adress_fa'] }}
            @endif</p>
        <p><i class="fa fa-fw fa-phone"></i><a style="color: #fff;direction: ltr;" href="tel:{{$contact->data['phone']}}">{{$contact->data['phone']}}</a></p>
        <p><i class="fa fa-fw fa-envelope"></i><a style="color: #fff" href="mailto:{{$contact->data['email']}}"><i class="fa fm fa-envelope-o"></i>{{$contact->data['email']}}</a></p>
    </address>
</div>

    <div style="margin-top: 0px">
        <footer id="footer"  >
            <div class="row clearfix" style="padding-top: 0px !important; ">
                <div class="grid_6 animtt" data-gen="fadeInUp" data-gen-offset="bottom-in-view" style="opacity:0;">
                    <h4 class="p-title"> درباره باشگاه صاحب نظران انرژی ایرانیان </h4>

                    <div class="widget-content">
                        <img class="fll four-radius" src="images1/assets/about.jpg" style="padding: 5px ; margin: 10px !important; ;float: right ; border: solid 2px" alt="#">
                        <p> @if(App::getLocale() == 'en')
                                {{ $setting->data['about_us'] }}
                            @elseif(App::getLocale() == 'fa')
                                {{ $setting->data['about_us_fa'] }}
                            @endif </p>
                    </div><!-- widget content -->
                </div><!-- grid 6 -->

                <div class="grid_3 animtt" data-gen="fadeInRight" data-gen-offset="bottom-in-view" style="opacity:0;">
                    <h4 class="p-title"> Contact Info </h4>

                    <div class="widget-content">
                        <strong>Address:</strong>
                        <p>Nobody Street, 2222 Chicago, USA</p>

                        <strong>Phone:</strong>
                        <p>001 (123) 55 65 558 <br> 0049 (021) 21 55 555</p>

                        <strong>Email:</strong>
                        <p class="mbt">information@theme20.com</p>
                    </div><!-- widget content -->

                    <div class="social footer-social">
                        <a href=""><img src="images/social/twitter.png" alt="#"></a>
                        <a href=""><img src="images/social/facebook.png" alt="#"></a>
                        <a href=""><img src="images/social/googleplus.png" alt="#"></a>
                        <a href=""><img src="images/social/dribbble.png" alt="#"></a>
                        <a href=""><img src="images/social/rss.png" alt="#"></a>
                    </div>
                </div><!-- grid 3 -->
            </div><!-- row -->

            <div class="row copyright mts animtt" data-gen="fadeInUp" data-gen-offset="bottom-in-view" style="opacity:0;height: 20px;width: 100%;background: #010316">© 2017 All Rights Reserved. Powered by CyanCoder</div>
        </footer>
    </div>
    <!-- Footer -->

    <script type="text/javascript" src="js1/jquery.min.js"></script>
    <script type="text/javascript" src="js1/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="js1/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="js1/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js1/superfish.js"></script>
    <script type="text/javascript" src="js1/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js1/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js1/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js1/twitter/jquery.tweet.js"></script>
    <script type="text/javascript" src="js1/custom.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var tpj=jQuery;
        tpj.noConflict();
        tpj(document).ready(function() {
            if (tpj.fn.cssOriginal!=undefined)
                tpj.fn.css = tpj.fn.cssOriginal;
            var api= tpj('.revolution').revolution({
                delay:9000,
                startheight:380,
                startwidth:960,
                hideThumbs:200,
                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:5,
                navigationType:"none",
                navigationArrows:"verticalcentered",
                navigationStyle:"square",
                touchenabled:"on",
                onHoverStop:"on",
                navOffsetHorizontal:0,
                navOffsetVertical:20,
                shadow:0
            });
        });
        /* ]]> */
    </script>

    <script src="/prismetric/js/jquery-3.3.1.min.js"></script>
    <script src="/prismetric/js/bootstrap.min.js"></script>
    <script src="/prismetric/js/mdb.min.js"></script>
    <script src="/prismetric/js/script.js"></script>

</body>

@yield('end')
<script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>

</html>
