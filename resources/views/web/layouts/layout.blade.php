
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @if(App::getLocale() == 'en')
            {{$setting->data['title']}}
        @elseif(App::getLocale() == 'fa')
            {{$setting->data['title_fa']}}
        @endif
    </title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="/new/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="/new/css/font-awesome.css" rel="stylesheet">

    <!-- Owl Carousel Slider CSS -->
    <link href="/new/css/owl.carousel.css" rel="stylesheet">
    <link href="/new/css/owl.theme.css" rel="stylesheet">

    <!-- Fancy Box CSS -->
    <link href="/new/css/jquery.fancybox.min.css" rel="stylesheet">

    <!-- Swiper Slider -->
    <link href="/new/css/swiper.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/new/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">
        .dr{
            direction: rtl;
            text-align: right;
        }

        .sh{
            box-shadow: 1px 1px 4px rgba(0,0,0,.3)
        }

        .yekan{
            font-family: 'Yekan', sans-serif !important;
        }

        .sahel{
            font-family: 'Sahel', sans-serif !important;
        }
    </style>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<!-- Page Loader -->
<div class="loader">
    <div class="cssload-thecube">
        <div class="cssload-cube cssload-c1"></div>
        <div class="cssload-cube cssload-c2"></div>
        <div class="cssload-cube cssload-c4"></div>
        <div class="cssload-cube cssload-c3"></div>
    </div>
</div>

<!-- Page Content -->
<!-- Navigation -->
<nav class="navbar  navbar-fixed-top appland_navbar  ">
    <div class="container ">
        <div class="navbar-header navbar-right
 ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand scroll  dr yekan" href="/" style="display: flex">
                <div class="logo" >
                    <img style="width: 55px;margin-top: -13px" src="/new/images/appland_logo.png" alt="logo">
                </div>
                <h1 class="yekan" style="font-size: 18px ;color: #e1e1e1">باشگاه صاحب نظران انرژی ایرانیان</h1>


            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left yekan
 ">
                <li>
                    <a href="#page_content_contactus" class="scroll yekan">تماس با ما</a>
                </li>
                <li>
                    <a href="#page_content_aboutus" class="scroll yekan">درباره ما</a>
                </li>
                <li class="active">
                    <a href="/signup" class="scroll yekan" >ثبت نام اعضا</a>
                </li>

                <li>
                    <a href="#page_content_getapp" class="scroll yekan">اهداف</a>
                </li>
                <li>
                    <a href="#page_content_news" class="scroll yekan">مقالات</a>
                </li>
                <li>
                    <a href="#page_content_features" class="scroll yekan">خدمات</a>
                </li>

                <li>
                    <a href="/home/intro" class="scroll yekan" style="font-weight: bold;font-size:18px;text-shadow: 0px 0px 2px  #e54b4b!important;"> شبکه اجتماعی</a>
                </li>

<!--
                @foreach($menus as $menu)
                    <?php
                    if($menu->type == 2 || $menu->type == 3 || $menu->children->count() > 0 )
                        $nested=true;
                    else
                        $nested=false;
                    ?>
                    <li >
                        <a class="nav-link  @if($nested) dropdown-toggle @endif text-uppercase waves-effect waves-light"  @if($nested) data-toggle="dropdown" @endif
                        href="{!!  $menu->link_maker(App::getLocale()) !!}">{{ $menu->name[App::getLocale()] }}
                            @if($nested) <span class="caret"></span> @endif
                        </a>
                        @if($nested)
                            <ul class="dropdown-menu  special-color">
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



                    <li class="nav-item dropdown mega-dropdown active" style="margin-left: 20px">
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
                                            alt=""/></a>


                            @elseif(App::getLocale() == 'en')
                <a href="<?= Url('fa/' . $path); ?>"
                                   style="font-family: Tahoma, Geneva, sans-serif"
                                   class="nav-link  text-uppercase waves-effect waves-light"><img
                                            src="<?= Url('/prismetric/img/ir_flag.jpg'); ?>"
                                            style="margin: 2px; margin-top: 0; height: 19px;width: 38px; border: 1px solid #5e5e5e;"
                                            alt=""/></a>
                            @endif
                    </li>
            -->


            </ul>
        </div>
    </div>
</nav>







@yield('content')
















<!-- Page Content Website Owner Information -->
<div class="page_content_owner_information clearfix">
    <div class="page_content_owner_information_1 page_content_owner_information_0">
        <i class="fa fa-group" aria-hidden="true"></i>
        <p>کانال تلگرام</p>
        <p>{{$contact->data['email']}}</p>
    </div>
    <div class="page_content_owner_information_1 page_content_owner_information_2">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <p>ایمیل</p>
        <p>info@iraneec.ir</p>
    </div>
    <div class="page_content_owner_information_1 page_content_owner_information_3">
        <i class="fa fa-map-marker" aria-hidden="true"></i>

        <p>آدرس</p>
        <p>
            @if(App::getLocale() == 'en')
                {{ $contact->data['adress'] }}
            @elseif(App::getLocale() == 'fa')
                {{ $contact->data['adress_fa'] }}
            @endif
        </p>
    </div>
    <div class="page_content_owner_information_1 page_content_owner_information_4">
        <i class="fa fa-mobile-phone" aria-hidden="true"></i>
        <p>تلفن تماس</p>
        <p>{{$contact->data['phone']}}</p>
    </div>
    <div class="page_content_owner_information_1 page_content_owner_information_5">
        <i class="fa fa-globe" aria-hidden="true"></i>
        <p>آدرس وب سایت</p>
        <p>www.iraneec.ir</p>
    </div>
</div>
<!-- /Page Content Website Owner Information -->
<!-- Page Content Social Media Footer -->
<div class="page_content_social_media">
    <ul class="social_footer_icons">
        <li><a href="#" class="twitter_social"><i class="fa fa-twitter " aria-hidden="true"></i></a></li>
        <li><a href="#" class="facebook_social"><i class="fa fa-facebook-f " aria-hidden="true"></i></a></li>
        <li><a href="#" class="pinterest_social"><i class="fa fa-instagram " aria-hidden="true"></i></a></li>
        <li><a href="#" class="linkedin_social"><i class="fa fa-linkedin " aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- /Page Content Social Media Footer -->
<!-- Page Content CopyRight Footer -->
<div class="page_content_copyright_footer">
    <p>© 2018 - Powered by <a target="_blank" href="https://cyancoder.co">CyanCoder</a></p>
</div>
<!-- /Page Content CopyRight Footer -->
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="/new/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/new/js/bootstrap.min.js"></script>

<!-- Owl Carousel Script -->
<script src="/new/js/owl.carousel.js"></script>

<!-- Fancy Box Script -->
<script src="/new/js/jquery.fancybox.min.js"></script>

<!-- Google Map + Api Key -->
<script type="text/javascript" src="js/gmap.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>

<!-- Swiper Script -->
<script src="/new/js/swiper.jquery.min.js"></script>

<!-- Custom Script -->
<script src="/new/js/script.js"></script>

</body>









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
        "timeOut": 5000,
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
        toastr.warning("{{  $error }}")
    @endforeach
    @endif


</script>
</html>









































