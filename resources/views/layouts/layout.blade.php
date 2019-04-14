<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <!-- Meta-Information -->
    <title> شبکه اجتماعی انرژی آب کربن | تالار گفتمان انرژی</title>
    <meta charset="utf-8">
    <meta name="description" content="انرژی تجدید پذیر | شبکه اجتماعی و تالار گفتمان انرژی و محیط زیست |
 Iranian National Community of the Energy and Environmen ">
    <meta name="keywords" content=",
Iranian National Community of the Energy and Environmen , انرژی, شبکه اجتماعی,  محیط زیست,  تالار گفتمان , چت آنلاین , کتابخانه فایل , دوره های آموزشی , محیط زیست, پادکست , چت گروهی , کورس تخصصی , اقتصاد انرژی ,انجمن انرژی,  مهندسی انرژی, آب, کربن">
    <meta name="author" content="CyanCoder">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link rel="stylesheet" href="<?= Url('assets/bootstrap-tagsinput.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/app.css'); ?>">
    <!--  CSS Styles -->
    <link rel="stylesheet" href="<?= Url('assets/css/style2.min.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/icons.css'); ?>">
    <!--  jquery 3 -->
    <script src="<?= Url('assets/js/jquery3.min.js'); ?>"></script>
    <!--  notify -->
    @yield('header')
    <script src="<?= Url('assets/js/ntf.js'); ?>"></script>
    <style>
        .ajax-load {width: 100%;}
        #note {position:absolute;z-index:6001;top:14px;left: 0;right: 0;background: #33b7a0;text-align:center;
            line-height: 2.5;overflow: hidden;-webkit-box-shadow:0 0 5px #333;-moz-box-shadow:0 0 5px #333; box-shadow:0 0 5px #333;
            color: #fff !important;border-radius: 3px !important;}
        .cssanimations.csstransforms #note {
            -webkit-transform: translateY(-60px);-webkit-animation: slideDown 3.5s 2.0s 1 ease forwards;
            -moz-transform:    translateY(-60px);-moz-animation:    slideDown 3.5s 2.0s 1 ease forwards;}
        #close {position: absolute;right: 10px;top: 9px;text-indent: -9999px;height: 16px;width: 16px;cursor: pointer;}
        .cssanimations.csstransforms #close {display: none;}
        @-webkit-keyframes slideDown {
            0%, 100% { -webkit-transform: translateY(-50px); }
            10%, 90% { -webkit-transform: translateY(0px); }}
        @-moz-keyframes slideDown {
            0%, 100% { -moz-transform: translateY(-50px); }
            10%, 90% { -moz-transform: translateY(0px); }}
        #search-live{
            border: none!important;
            padding-top: 9px;
            height: 100%;}
        #search-live:focus{
            border: none!important;
            padding-top: 9px;
            height: 100%;
            width: 100%;}

        #overlay{
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            background-color: #000;
            opacity: 0.7;
            filter: alpha(opacity = 70) !important;
            z-index: 100;
            display: none;}
        #overlayContent{
            position: absolute;
            width: 100%;
            display: none;
            align-items: center;
            align-content: center;
            justify-items: center;
            justify-content: center;
            -webkit-align-items: center;
            -webkit-justify-content:center ;
        }
        #imgBig {
            cursor: pointer;
            margin: 0 auto;
            width: 43%;
            z-index: 1000;
            border: 1px solid #e0dfe3;
            border-radius: 3px;}




        #overlay-{
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            background-color: #000;
            opacity: 0.7;
            filter: alpha(opacity = 70) !important;
            z-index: 100;
            display: none;}
        #overlayContent-{
            position: absolute;
            width: 100%;
            display: none;
        }
        #imgBig- {
            position: absolute;
            cursor: pointer;
            margin: 40px auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            z-index: 1000;
            border: 1px solid #e0dfe3;
            border-radius: 3px;}


    </style>




    <link rel="stylesheet" href="croppie.css" />
    <script src="croppie.js"></script>








    <script>
        var citynames = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
                url: '../../assets/citynames.json',
                filter: function(list) {
                    return $.map(list, function(cityname) {
                        return { name: cityname }; });
                }
            }
        });
        citynames.initialize();

        $('input').tagsinput({
            maxTags: 1,
            typeaheadjs: {
                name: 'citynames',
                displayKey: 'name',
                valueKey: 'name',
                source: citynames.ttAdapter()
            }
        });

    </script>



</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!--  Content -->
<header class="simple-normal">
    <div class="top-bar">
        <div class="logo" style="margin-left: 0">
            <h1 style="height: 5px; margin-top: -10px"> <a href="<?= Url('/home/intro') ?>" title="" style="font-size: 15px;color: #fff8f8 !important;"> <img src="<?= Url('assets/images/logo.png'); ?>" style="height: 35px">&nbsp;&nbsp;      باشگاه صاحبنظران انرژی ایرانیان</a></h1>
        </div>
        <div class="search-dashboard">
            <div class="responsive-search">
                <i  class="fa fa-search"></i>
            </div>
            <form>
                <input id="search-live" name="search" type="text" placeholder="جستجو ..." />
                <button href="#" style="padding-top: 5px" id="search-complete" type="button"><i class="fa fa-search"></i></button>
                <div id="search-result">
                </div>
            </form>
        </div><!-- Search Dashboard -->
        <div class="top-bar-quick-sec">
            <ul class="quick-notify-section custom-dropdowns">
                    @if(Auth::check())
                        <li class="notification-list dropdown">
                            <span class="d1"><i class="ti-user blue-hover"></i><strong class=""></strong></span>
                            <div class="notification drop-list d11">
                                <ul>
                                    <li>
                                        <a href="<?= Url('home/profile/show/137-'.Auth::user()->id.'-42-'.Auth::user()->username); ?>" title=""><span><i class="fa fa-user blue-bg"></i></span>   صفحه کاربری (@if(isset(Auth::user()->roleLabel[0])){{Auth::user()->roleLabel[0]->label}}@endif سایت) <h6></h6></a>
                                    </li>
                                    <li>
                                        <a href="<?= Url('home/message/inbox/0'); ?>" title=""><span><i class="fa fa-envelope-o blue-bg"></i></span><i>       پیام ها و اعلانات  </i><h6></h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url('home/logout'); ?>" title=""><span><i class="fa fa-user-times blue-bg"></i></span><i>   خروج از حساب  </i><h6></h6>
                                        </a>
                                    </li>

                                    @can('manager', \App\Contents\Post::class)
                                    <li>
                                        <a href="<?= Url('/home/event/manage');?>" title=""><span><i class="ti-crown green-bg"></i></span> مدیریت رویداد<h6></h6></a>
                                    </li>

                                        <!--<li>
                                            <a href="javascript:alert('under developing')" title=""><span><i class="ti-crown green-bg"></i></span>   مدیریت مطالب<h6></h6></a>
                                        </li>-->

                                        <li>
                                            <a href="<?= Url('/home/admin/users'); ?>" title=""><span><i class="ti-crown green-bg"></i></span><i>   مدیریت کاربران</i><h6></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Url('/home/admin/category'); ?>" title=""><span><i class="ti-crown red-bg"></i></span>  مدیریت دسته ها<h6></h6>
                                            </a>
                                        </li>


                                @endcan
                                </ul>
                            </div><!-- Notification Drop list -->
                        </li>
                    @endif

                <script>
                    $(document).ready(function () {
                        $(".d1").click(function () {
                            $(".drop-list").removeClass( "active" );
                            if ( $(".d11").hasClass( "active" ) ) {
                                $(".d11").removeClass( "active" );
                            }else {
                                $(".d11").addClass( "active" );}
                        });
                    });
                    $(document).ready(function () {
                        $(".d2").click(function () {
                            $(".drop-list").removeClass( "active" );
                            if ( $(".d22").hasClass( "active" ) ) {
                                $(".d22").removeClass( "active" );
                            }else {
                                $(".d22").addClass( "active" );}
                        });
                    });
                    $(document).ready(function () {
                        $(".d3").click(function () {
                            $(".drop-list").removeClass( "active" );
                            if ( $( ".d33").hasClass( "active" ) ) {
                                $(".d33").removeClass( "active" );
                            }else {
                                $(".d33").addClass( "active" );}
                        });
                    });
                </script>
                <li  class="notification-list dropdown ">
                    <span class="d2"><i class="fa fa-pencil blue-hover"></i><strong class=""></strong></span>
                    <div class="notification drop-list d22">
                        <ul>
                           <!-- <li>
                                <a data-toggle="modal" data-target=".large-modal"  title=""><span><i class="ti-pencil red-bg"></i></span> مقاله جدید<h6></h6></a>
                            </li>-->
                            <li>
                                <a href="<?= Url('/home/course/create'); ?>" title=""><span><i class="ti-volume blue-bg"></i></span><i> ارسال دوره جدید</i><h6></h6>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url('home/course/manage'); ?>" title=""><span><i class="fa fa-book blue-bg"></i></span><i>     مدیریت دوره های آموزشی </i><h6></h6>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url('/home/file/category'); ?>" title=""><span><i class="ti-file green-bg"></i></span>دانلود و آپلود در کتابخانه <h6></h6>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url('home/event/category'); ?>" title=""><span><i class="fa fa-map red-bg"></i></span><i>   مشاهده رویدادها  </i><h6></h6>
                                </a>
                            </li>
                            @can('admin', \App\Contents\Post::class)
                                <li>
                                    <a href="<?= Url('/home/admin/content/manage'); ?>" title=""><span><i class="ti-crown red-bg"></i></span>  مدیریت صفحات<h6></h6></a>
                                </li>
                                <li>
                                    <a href="<?= Url('/home/admin/post/manage'); ?>" title=""><span><i class="ti-crown red-bg"></i></span>  مدیریت مطالب<h6></h6></a>
                                </li>
                            @endcan
                        </ul>
                    </div><!-- Notification Drop list -->
                </li>
                <li class="notification-list dropdown">
                    <span class="d3"><i class="fa fa-bell-o blue-hover"></i><strong class="">
                             @if(Auth::check())
                            {{Auth::user()->unreadNotifications->count()}}
                            @endif

                        </strong></span>
                    <div class="notification drop-list d33">
                        <ul>

                            @if(Auth::check())

                            @foreach(Auth::user()->unreadNotifications->where('type', 'App\Notifications\Notify')->take(2) as $notification)
                            <li>
                                <a href="<?= Url('home/message/inbox/'.$notification->id); ?>" title=""><span><i class="fa fa-envelope-o
                                 red-bg


"></i></span><i> {{\App\User::find($notification->data['sender'])->username}}</i>{!! \Illuminate\Support\Str::words($notification->data['message'] , $words = 5, $end = '...')    !!}<h6>{!! until_time($notification->created_at) !!}</h6><p class="status blue-bg">مشاهده نشده</p></a>
                            </li>
                            @endforeach
                                @foreach(Auth::user()->unreadNotifications->where('type', 'App\Notifications\Event')->take(2) as $notification)
                                    <li>
                                        <a
                                                @if($notification->data['message'] !== '0')
                                                href="<?= Url('home/profile/show/137-'.\App\User::find($notification->notifiable_id)->id.'-42-'.\App\User::find($notification->notifiable_id)->username.'/'.$notification->id); ?>"
                                                @else
                                                href="<?= Url('home/message/inbox/'.$notification->id); ?>"
                                                @endif
                                                title=""><span><i class="fa fa-bullhorn
                                 green-bg


"></i></span><i> {{\App\User::find($notification->data['sender'])->username}}</i>{!!  \Illuminate\Support\Str::words($notification->data['message'] , $words = 5, $end = '...')    !!}<h6>{!! until_time($notification->created_at) !!}</h6></a>
                                    </li>
                                @endforeach
@endif



                        </ul>
                        <a href="<?= Url('home/message/inbox/0'); ?>" title="">نمایش همه پیام ها</a>
                    </div><!-- Notification Drop list -->
                </li>
            </ul>
            <div class="menu-options hide-side"><span class="menu-action"><i></i></span></div>
            <!--    <span class="open-panel"><i class="fa fa-cog fa-spin"></i></span>  -->
            <!--   <span id="toolFullScreen" class="full-screen-btn"><i class="fa fa-arrows-alt"></i></span>   -->
            <div class="name-area">
                <a href="<?= Url('home/file/category') ?>" title=""> <strong style="font-size: 14px"><i class="fa fa-file-archive-o"></i> &nbsp;    کتابخانه</strong></a>
            </div>
            <div class="name-area">
                <a href="<?= Url('home/forum/category') ?>" title=""> <strong style="font-size: 14px"><i class="fa fa-comments-o"></i> &nbsp;تالارها </strong></a>
            </div>
            <div class="name-area">
                <a href="<?= Url('home/course/categories') ?>" title=""> <strong style="font-size: 14px"><i class="fa fa-leanpub"></i> &nbsp;دوره‌ها  </strong></a>
            </div>
            <div class="name-area">
                        @if(Auth::check())
                            <a href="<?= Url('home/profile/show/137-'.Auth::user()->id.'-42-'.Auth::user()->username); ?>" title=""><strong style="font-size: 14px"> &nbsp;&nbsp;&nbsp;
                                    {{Auth::user()->username}}</strong>
                         @else
                                        <a href="<?= Url('/home/intro') ?>" title=""><strong style="font-size: 14px"> &nbsp;&nbsp;&nbsp;
                                                ورود / ثبت نام
                                            </strong>
                                            @endif


                    @if(Auth::check())
                                                @if(Auth::user()->profile == null)
                                                    <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                                @else
                                                    <img style="height: 37px;width: 37px" src="<?= Url('/user-img/'.Auth::user()->profile->image_b); ?>" alt="" />
                                                @endif
                    @else
                        <img style="width: 37px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                    @endif
                    </a>
            </div>
        </div>
    </div><!-- Top Bar -->
    <div class="side-menu-sec hide-side" id="header-scroll">

        <div class="side-menus">
            <span></span>
            <nav>
                <ul class="parent-menu">

                    @if(Auth::check())

                        <li class="menu-item">
                            @if(Auth::check())
                                <a href="<?= Url('home/profile/show/137-'.Auth::user()->id.'-42-'.Auth::user()->username); ?>" title=""><strong style="font-size: 14px"> &nbsp;&nbsp;&nbsp;
                                        {{Auth::user()->username}}</strong>
                                </a>
                            @else
                                            <a href="<?= Url('/home/intro') ?>" title=""><a style="font-size: 14px"> &nbsp;&nbsp;&nbsp;

                                                    ورود / ثبت نام

                                                </a></a>
                            @endif

                        </li>

                        @can('manager', \App\Contents\Post::class)
                           <!-- <li class="menu-item">
                                <a href="javascript:alert('under developing')" title=""><i class="ti-file"></i><span> مدیریت مطالب</span> </a>
                            </li>-->
                            <li class="menu-item">
                                <a href="<?= Url('/home/admin/users'); ?>" title=""><i class="ti-user"></i><span>مدیریت کاربران</span>
                                </a>
                            </li>

                            @can('admin', \App\Contents\Post::class)

                                <li class="menu-item">
                                    <a href="<?= Url('/home/admin/category'); ?>" title=""><i class="ti-crown"></i><span>مدیریت دسته ها</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?= Url('/home/admin/content/manage'); ?>" title=""><i class="ti-crown"></i><span>  مدیریت صفحات</span></a>
                                </li>
                                   <li class="menu-item">
                                       <a href="<?= Url('/home/admin/post/manage'); ?>" title=""><i class="ti-crown"></i><span>  مدیریت مطالب</span></a>
                                   </li>
                            @endcan

                        @endcan

                    @endif
                    <li class="menu-item">
                        <a href="<?= Url('home/course/categories') ?>" title=""><i class="ti-pencil"></i><span>دروه ها<i class="badge skyblue-bg">3</i></span></a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= Url('home/forum/category') ?>" title=""><i class="ti-rocket"></i><span>تالار ها <i class="badge green-bg">43</i></span></a>
                    </li>
                    <li class="menu-item">
                        <a  href="<?= Url('home/file/category') ?>" title=""><i class="ti-rocket"></i><span>کتابخانه فایل ها<i class="badge blue-bg">12</i></span></a>
                    </li>



                </ul>
            </nav>
        </div>
    </div>
</header>



<div class="main-content menu-slide">

    @if(Auth::check())
    <div id="live-chat">
        <div class="clearfix chat-header">
            <a style="color: #e2e2e2; font-size: 24px"><i class="fa fa-comments"></i></a>
            <h4>  گفتگو آنلاین</h4>
        </div>
        <div class="chat" style="display:none; height: 400px">
          <object type="text/html" data="<?= Url('/cyanchat/index.php'); ?>" width="309px" height="400px" style="overflow:hidden!important;">
          </object>
        </div> <!-- end chat -->
    </div> <!-- end live-chat -->
    @endif


    <div class="panel-content">
        <div class="main-content-area ">
            <script src="<?= Url('assets/js/notify.js'); ?>"></script>
            @if(session()->has('message'))
                <script>
                    $.notify("{{ session()->get('message') }}", "success");
                </script>
            @endif
            @if(session()->has('alert'))
                <br>
                <div class="alert alert-warning">
                    {!!  session()->get('alert') !!}
                </div>
            @endif

            <script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>

            @yield('content')




            @if(session()->has('warn'))
                <script>
                    $.notify("{{ session()->get('warn') }}", "warn");
                </script>
            @endif
            @if(session()->has('error'))
                <script>
                    $.notify("{{ session()->get('error') }}", "error");
                </script>
            @endif
        </div>
    </div><!-- Panel Content -->
</div>
<ul class="breadcrumbs">
    <li style="margin-right: 310px">&nbsp; &copy;2017 تمامی حقوق سایت متعلق به باشگاه صاحبنظران انرژی ایرانیان می باشد. </li>
    <li > <a href="<?= Url('/content/page/2'); ?>"><small>درباره ما</small></a></li>
    <li ><a href="<?= Url('/content/page/1'); ?>"><small>قوانین و مقررات</small> </a></li>
    <li > <a  href="<?= Url('/content/page/3'); ?>"><small>تماس با ما</small></a></li>
    <li style="float: left"><small>Powered by <a class="tooltip1" target="_blank" href="http://cyancoder.co"> <small>&nbsp;Cyan Coder</small>
                <span
                        class="tooltiptext1">Branding & Business Marketing | website & Mobile App Development</span></a></small></li>
</ul>
<!--  Javascripts -->
<script src="<?= Url('assets/js/main.min.js'); ?>"></script>





</body>
</html>

<script>
//        $(window).scroll(function () {
//            if ($(window).scrollTop() +1 >= $(document).height() - $(window).height()) {
//            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="<?= Url('/assets/bootstrap-tagsinput.min.js'); ?>"></script>
<script src="<?= Url('/assets/app_bs3.js'); ?>"></script>



<script>
    $(document).ready(function () {
        $( "#search-live" ).on('keydown', function () {
            if($("#search-live").val() == ''){
                $('#search-result').html('');
            }else {
                searchLive()
            }});
        });


        function searchLive() {
                var _token = "{{csrf_token()}} ";
                var input = $("#search-live").val();
                $.ajax({
                    url: "/search",
                    type: 'POST',
                    data: {
                        _token: _token,
                        input: input
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('#search-result').html(data.result);
                    },
                    error: function (data) {
                    }
                });}
</script>




<script>


    $.fn.modal.Constructor.prototype.enforceFocus = function() {
        var $modalElement = this.$element;
        $(document).on('focusin.modal',function(e) {
            if ($modalElement[0] !== e.target
                && !$modalElement.has(e.target).length
                && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
                $modalElement.focus();
            }
        });
    };






    $(document).on('ready', function(){

        'use strict';


        //**** Slide Panel Toggle ***//
        $('.star-email').on('click', function(){
            $(this).toggleClass('starred');
        });

        //* Sidebar Toogle //
        $('.inbox-msg').on('click', function(){
             var id = $(this).attr('id');
            $('#read-email-'+id+' ').addClass('reading');
        });

        //* Sidebar Toogle //
        $('.close-reading').on('click', function(){
            $('.read-email').removeClass('reading');
        });



        //**** Your Emails ****//
        $('.your-emails').slimScroll({
            height: '500px',
            wheelStep: 10,
            distance : '0px',
            color:'#878787',
            railOpacity : '0.1',
            size: '2px'
        });

        //**** Reading Emails ****//
        $('.read-email').slimScroll({
            height: '100%',
            wheelStep: 10,
            distance : '0px',
            color:'#878787',
            railOpacity : '0.1',
            size: '2px'
        });


        $('.your-request').slimScroll({
            height: '500px',
            wheelStep: 10,
            distance : '0px',
            color:'#878787',
            railOpacity : '0.1',
            size: '2px'
        });

    });
</script>


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
@yield('script')