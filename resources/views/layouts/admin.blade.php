<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>پنل مدیریت - CyanPro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->


    <link rel="stylesheet" href="<?= Url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/responsive.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/style-admin.css'); ?>">

    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/bootstrap/css/bootstrap.rtl.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/admin/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/admin/css/theme.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/admin/css/MoneAdmin.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>" />
    <!--END GLOBAL STYLES -->
    <link rel="stylesheet" href="<?= Url('assets/admin/css/bootstrap-fileupload.min.css'); ?>" />
    <link href="<?= Url('assets/admin/plugins/dataTables/dataTables.bootstrap.css'); ?>" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES -->
    <link href="<?= Url('assets/admin/css/layout2.css'); ?>" rel="stylesheet" />
    <link href="<?= Url('assets/admin/plugins/flot/examples/examples.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/timeline/timeline.css'); ?>" />
    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->




    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'); ?>"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'); ?>"></script>
    <![endif]-->



    @yield('admin_head')



</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 " >


<!-- MAIN WRAPPER -->
<div id="wrap" >


    <!-- HEADER SECTION -->
    <div id="top">

        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding: 10px;">
            <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                <i class="icon-align-justify"></i>
            </a>
            <!-- LOGO SECTION -->
            <header class="navbar-header" >

                <a title="Branding & Business Marketing | website & Mobile App Development" href="http://cyancoder.co" target="_blank" class="navbar-brand">
                    <img src="<?= Url('assets/admin/img/logo.png'); ?>" alt="" height="35" style="margin: 0px 14px" />
                    <spanp class="site">CyanPro CMS</spanp>
                </a>
            </header>
            <!-- END LOGO SECTION -->
            <ul class="nav navbar-top-links navbar-left" style="margin-top: 5px">

                <!-- MESSAGES SECTION -->

                <!--END MESSAGES SECTION -->

                <!--TASK SECTION -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-foursquare"></i> <i class="icon-chevron-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-tasks">

                        @foreach(Auth::user()->unreadNotifications->where('type', 'App\Notifications\Notify')->take(2) as $notification)
                            <li>
                                <a href="<?= Url('admin/read/'.$notification->id); ?>" title=""><span><i class="fa fa-envelope-o
                                 red-bg


"></i></span><i> {{\App\User::find($notification->data['sender'])->name}}</i><h5> {{$notification->data['title']}}</h5><h6>الویت:@if($notification->data['priority']==1)کم@elseif($notification->data['priority']==2)متوسط@elseif($notification->data['priority']==3)زیاد@endif</h6>{!! \Illuminate\Support\Str::words($notification->data['message'] , $words = 5, $end = '...')    !!}<h6>{!! until_time($notification->created_at) !!}</h6><p class="status blue-bg"> مشاهده نشده </p></a>
                            </li>
                        @endforeach

                    </ul>

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="label label-danger">3</span>   <i class="icon-tasks"></i>&nbsp; <i class="icon-chevron-down"></i>
                    </a>

                    <?php

                    if($count_ticket == 0){
                    $count_ticket = 1; } ;
                    if($count_comment == 0){
                        $count_comment = 1; } ;
                    if($count_message == 0){
                        $count_message = 1; } ;

                    $ticket_percent= round(($count_ticket-$count_ticket_o)/($count_ticket)*100,0,PHP_ROUND_HALF_UP);
                    $comment_percent= round((($count_comment_o/$count_comment)*100),0,PHP_ROUND_HALF_UP);
                    $message_percent= round((($count_message_o/$count_message)*100),0,PHP_ROUND_HALF_UP);
                    ?>



                    <ul class="dropdown-menu dropdown-tasks">

                        <li>
                            <a href="#" deacti>
                                <div>
                                    <p>
                                        <strong> پشتیبانی </strong>
                                        <span class="pull-left text-muted">{{$ticket_percent}}% رسیدگی شده</span>
                                    </p>
                                    {{--<div class="progress progress-striped active">--}}
                                        {{--<div class="progress-bar progress-bar-info" role="progressbar"  style="width: {{$ticket_percent}}%">--}}
                                            {{--<span class="sr-only">{{$ticket_percent}}% رسیدگی شده% رسیدگی شده</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> نظرات </strong>
                                        <span class="pull-left text-muted">{{$comment_percent}}% تائید شده</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning"  style="width: {{$comment_percent}}%">
                                            <span class="sr-only">{{$comment_percent}}% تائید شده</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> پیام ها </strong>
                                        <span class="pull-left text-muted">{{$message_percent}}% پاسخ داده شده</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-sucess" role="progressbar" a style="width: {{$message_percent}}%">
                                            <span class="sr-only">{{$message_percent}}% پاسخ داده شده </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>


                </li>
                <!--END TASK SECTION -->

                <!--ALERTS SECTION -->
                <!-- END ALERTS SECTION -->

                <!--ADMIN SETTINGS SECTIONS -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="icon-user"></i> مشاهده پروفایل </a>
                        </li>
                        <li><a href="#"><i class="icon-gear"></i> تنظیمات </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= Url('/admin/logout'); ?>"><i class="icon-signout"></i> خروج </a>
                        </li>
                    </ul>

                </li>

                <!--END ADMIN SETTINGS -->
            </ul>

        </nav>

    </div>
    <!-- END HEADER SECTION -->



    <!-- MENU SECTION -->

    <div id="right">


        <ul id="menu" class="collapse">


            <li class="panel active">
                <a href="<?= Url('/admin'); ?>" >
                    <i class="icon-dashboard"></i>&nbsp; پنل مدیریت


                </a>
            </li>



            <li class="panel ">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav" style="color: #5e5e5e">
                    <i class="icon-foursquare"  > </i>&nbsp;پشتیبانی

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>

            </li>
            <li class="panel ">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav" style="color: #5e5e5e">
                    <i class="icon-pencil"></i> &nbsp;امکانات

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="form-nav" >
                    <li class=""><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i> نمایش رخدادها </a></li>
                    <li class=""><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i> افزدون امکانات </a></li>
                </ul>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                    <i class="icon-comment-alt"></i>&nbsp; پیام هاو اعلانات

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="pagesr-nav">
                    <li><a href="<?= Url('admin/message') ?>"><i class="icon-angle-left"></i> پاسخگویی به پیام ها </a></li>
                    <!--<li><a href="<?= route('Notif') ?>" ><i class="icon-angle-left"></i>ارسال اعلانات</a></li>-->
                    <li><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i> تنظیمات ایمیل  </a></li>
                    <li><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i> تنظیمات فرم تماس </a></li>


                </ul>
            </li>
            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav" style="color: #5e5e5e">
                    <i class="icon-tasks"></i>&nbsp; پرداخت آنلاین

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="chart-nav">



                    <li><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i>   امکانات فروشگاه </a></li>
                    <li><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i>خدمات پرداخت  </a></li>
                </ul>
            </li>

            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                    <i class=" icon-sitemap"></i> &nbsp; محتوا

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="DDL-nav">
                    <li>
                        <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL1-nav">
                            <i class="icon-sitemap"></i>&nbsp;
                            مطالب

                            <span class="pull-left" style="margin-left: 20px;">
                            <i class="icon-angle-right"></i>
                        </span>


                        </a>
                        <ul class="collapse" id="DDL1-nav">
                            <li>
                                <a href="<?= Url('admin/content/create') ?>"><i class="icon-angle-left"></i> ثبت مطلب جدید</a>

                            </li>
                            <li>
                                <a href="<?= Url('admin/content') ?>"><i class="icon-angle-left"></i> مدیریت مطالب </a>
                            </li>




                        </ul>

                    </li>

                    <li><a href="<?= Url('admin/category') ?>" ><i class="icon-angle-left"></i>دسته بندی محتوا </a></li>

                </ul>
            </li>
            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                    <i class=" icon-copy"></i>&nbsp; مدیریت صفحات

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="DDL4-nav">
                    <li>
                        <a href="#" data-parent="DDL4-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_1-nav">
                            <i class="icon-sitemap"></i>&nbsp;صفحه نخست

                            <span class="pull-left" style="margin-left: 20px;">
                            <i class="icon-angle-right"></i>
                        </span>


                        </a>
                        <ul class="collapse" id="DDL4_1-nav">
                            <li>
                                <a href="#" data-parent="#DDL4_1-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_2-nav">
                                    <i class="icon-sitemap"></i>&nbsp;بخش ها

                                    <span class="pull-left" style="margin-left: 20px;">
                            <i class="icon-angle-right"></i>
                        </span>
                                </a>
                                <ul class="collapse" id="DDL4_2-nav">
                                    @foreach(config('utility.names') as $key => $value)
                                        <li><a href="{{ route('utility.index',['name' => $key]) }}"><i class="icon-angle-left"></i>{{ $value }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>


                    </li>
                    <li><a href="{{ route('menu') }}" ><i class="icon-angle-left"></i> تنظیمات منو ها  </a></li>
                    <li><a href="<?= Url('admin/page') ?>" > <i class="icon-angle-left"></i> لینک صفحات</a></li>

                </ul>
            </li>
            <li class="panel">
                <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#news-nav" >
                    <i class="icon-foursquare" > </i>&nbsp; خبرنامه

                    <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                </a>
                <ul class="collapse" id="news-nav">
                    <li class=""><a href="<?= Url('admin/newsletter') ?>"><i class="icon-angle-left"></i> ارسال ایمیل </a></li>
                    <li class=""><a href="<?= Url('admin/deny') ?>" style="color: #5e5e5e"><i class="icon-angle-left"></i>  خبرنامه ها </a></li>

                </ul>

            </li>
            <li class="panel">
                <a href="<?= Url('/admin/sigups'); ?>" title=""><span><i class="fa fa-map red-bg"></i></span><i>   مدیریت ثبت نامی ها  </i><h6></h6>
                </a>
            </li>

            <li><a href="<?= Url('admin/logout') ?>"><i class="icon-signin"></i>&nbsp; خروج کاربر

                </a>

            </li>

        </ul>

    </div>
    <!--END MENU SECTION -->












@yield('admin_content')




    <div id="left">





        <div class=" panel-primary " id="menu" style="min-height: 704px" >
            <div class="panel-heading  " style="padding-top: 13px ;padding-bottom: 10px">
                <i class="icon-desktop"></i> پنل  اطلاعات
            </div>
            <div class="panel-body">
                <div class="panel-group" id="accordion_l">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion_" href="#collapseOne_l"><i class="fa fa-user"></i> &nbsp;اطلاعات کاربری </a>
                            </h4>
                        </div>
                        <div id="collapseOne_l" class="panel-collapse collapse in">
                            <div class="panel-body">
                               نام کاربری: {{Auth::user()->name}}
                                <br>
                                دسترسی: {{Auth::user()->usertype}}


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion_" href="#collapseTwo_l"><i class="icon-bullhorn"></i> &nbsp;اعلان ها</a>
                            </h4>
                        </div>
                        <div id="collapseTwo_l" class="panel-collapse collapse ">
                            <div class="panel-body">
                                {!!  until_time(date('m-d-Y H:i:s', time())) !!}
                                <br>
                                کاربران عضو: {{$count_user}}
                                <br>
                                نظرات تایید نشده: {{$count_comment-$count_comment_o}}
                                <br>
                                پیام های جدید: {{$count_message-$count_message_o}}
                                <br>
                                {{--تیکت های جدید: {{$count_ticket_o}}--}}
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion_" href="#collapseThree_l"><i class="icon-road"></i> &nbsp;میانبر ها</a>
                            </h4>
                        </div>
                        <div id="collapseThree_l" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <!--<a  href="<?= Url('admin/ticket/create') ?>"><i class="icon-caret-left"></i> &nbsp;  ارسال تیکت جدید   </a> -->
                                <br>
                                <a href="<?= Url('admin/content/create') ?>"><i class="icon-caret-left"  ></i> &nbsp;ثبت مطلب جدید    </a>
                                <br>

                                <a href="<?= Url('admin/course/create') ?>"><i class="icon-caret-left" ></i> &nbsp;ثبت پروژه جدید    </a>
                                <br>

                                <a href="<?= Url('admin/message') ?>"><i class="icon-caret-left" ></i> &nbsp;پاسخگویی پیام ها    </a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











</div>

<!-- FOOTER -->
<div id="footer">
    <p><a title="Branding & Business Marketing | website & Mobile App Development" target="_blank" href="http://cyancoder.co">Cyan Coder</a></p>
</div>
<!--END FOOTER -->


<!-- GLOBAL SCRIPTS -->

<!-- END GLOBAL SCRIPTS -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?= Url('assets/admin/plugins/flot/jquery.flot.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/flot/jquery.flot.resize.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/flot/jquery.flot.time.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/flot/jquery.flot.stack.js'); ?>"></script>
<script src="<?= Url('assets/admin/js/for_index.js'); ?>"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?= Url('assets/admin/plugins/jquery-2.0.3.min.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/bootstrap/js/bootstrap.rtl.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
<!-- END GLOBAL SCRIPTS -->

<!-- END GLOBAL SCRIPTS -->
<!-- PAGE LEVEL SCRIPTS -->
<script src="<?= Url('assets/admin/plugins/dataTables/jquery.dataTables.js'); ?>"></script>
<script src="<?= Url('assets/admin/plugins/dataTables/dataTables.bootstrap.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

@yield('script')

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
            toastr.warning("{{  $error }}")
        @endforeach
    @endif


</script>





</body>

<!-- END BODY -->
</html>
