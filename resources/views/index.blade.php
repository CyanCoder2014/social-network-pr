@extends('layouts.layout')
@section('content')
    <div id="overlay-"></div>
    <div id="overlayContent-">
        <img id="imgBig-" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" style="position: fixed!important;margin-top: -10px!important;margin-right: 18%"/>
    </div>

    <div id="" class="note" style="display: none">پست شما با موفقیت ارسال گردید <a id="close">[close]</a></div>
    <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">خطا در ارسال پست! <a id="close">[close]</a></div>

    <style type="text/css">
        .ajax-load {
            width: 100%;}
    </style>

    @if(!Auth::check())
        <div class="row">
            <div class="col-md-12">
                <div class="widget blank">
                    <div class="parallax-example" >
                        <div class="qwhitish-12">
                            <div data-velocity="-.1"
                                 style="background: url(../../images/0099.jpg) repeat scroll 50% 0px transparent;"
                                 class="parallax scrolly-invisible no-repeat"></div><!-- PARALLAX BACKGROUND IMAGE -->
                            <div class="col-md-7">
                                <div class="widget-title">
                                    <h3 style="color: #fff !important;">ثبت نام</h3>
                                    <span>&nbsp;هم اکنون به ما بپیوندید &nbsp;</span>
                                </div><!-- Widget title -->
                                <div class="account-form">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6 feild">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <div class="col-md-12 right12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon icon-user"></div>
                                                            <input id="name" type="text"  placeholder="نام کاربری (انگلیسی)" class="form-control" name="username" value="{{old('username')}}" required >
                                                            <span class="input-group-addon"><i class="ti-user"></i> </span>
                                                        </div>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $('#name').on('keypress', function (event) {
                                                   // var regex = new RegExp("^[a-zA-Z0-9@_&!-]+$");
                                                    var regex = /^(?:[a-zA-Z0-9&-@!#._]|[\b])+$/;
                                                    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                                                    if (!regex.test(key)) {
                                                        event.preventDefault();
                                                        return false;}
                                                });
                                            </script>

                                            <div class="col-md-6 feild">
                                                <div class="form-group{{ $errors->has('email12') ? ' has-error' : '' }}">
                                                    <div class="col-md-11 right12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon icon-mail"></div>
                                                            <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email" value="{{ old('email') }}" required>
                                                            <span class="input-group-addon"><i class="ti-email"></i></span>
                                                        </div>
                                                        @if ($errors->has('email12'))
                                                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 feild">
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <div class="col-md-12 right12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon icon-lock"></div>
                                                            <input id="password" type="password" placeholder="کلمه عبور" class="form-control" name="password" required>
                                                            <span class="input-group-addon"><i class="ti-lock"></i></span>
                                                        </div>
                                                        @if ($errors->has('password'))
                                                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 feild">
                                                <div class="form-group">
                                                    <div class="col-md-11 right12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon icon-lock"></div>
                                                            <input id="password-confirm" type="password" placeholder="تکرار کلمه عبور" class="form-control" name="password_confirmation" required>
                                                            <span class="input-group-addon"><i class="ti-unlock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label><input required type="checkbox" style="float: right; text-align: left "/> <a  href="<?= Url('/content/page/1'); ?>"
                                                            title="" style="color: #fff !important;">قوانین و مقررات </a>
                                                    &nbsp;سایت را تایید می نمایم&nbsp;
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3 ">
                                                    <div class="feild col-md-4">
                                                        <input style="color: #fff !important;" type="submit" value="ثبت نام"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-1" >
                                <div style="max-height: 250px !important;"><img style="margin-top: 25px;width: 2px; height: 250px" src="/images/0035.png"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget-title">
                                    <h3 style="color: #fff !important; margin-right: 30px">ورود</h3>
                                    <span></span>
                                </div><!-- Widget title -->
                                <div class="account-form">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                                                <div class="col-md-11 ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon icon-mail"></div>
                                                        <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email" value="{{ old('email') }}" required >
                                                        <span class="input-group-addon"><i class="ti-email"></i></span>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('password12') ? ' has-error' : '' }} ">
                                                <div class="col-md-11 ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon icon-lock"></div>
                                                        <input id="password" type="password" placeholder="کلمه عبور" class="form-control" name="password" required>
                                                        <span class="input-group-addon"> <i class="ti-lock"></i></span>
                                                    </div>
                                                    @if ($errors->has('password12'))
                                                        <span class="help-block"><strong>{{ $errors->first('password12') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-3 ">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا بخاطر بسپار
                                                        </label>
                                                        <a style="color: #ffff; margin-top: 7px" class="btn btn-link" href="{{ route('password.request') }}">
                                                            <small>فراموشی کلمه عبور</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-3 ">
                                                    <div class="feild col-md-12">
                                                        <input style="color: #fff !important; margin-top: -7px" type="submit" value="ورود"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    <div class="row">
        <div class="col-md-3">
            @if(Auth::check())
            <div class="widget">
                <div class="my-profile-widget">
                    <div class="profile-widget-head">
                        <h3>{{Auth::user()->name.' '.Auth::user()->family}} </h3>
                        <i>
                            @if(Auth::user()->profile == null)
                                عنوان شغلی
                            @else
                                {{Auth::user()->profile->job}}
                            @endif
                        </i>
                        <span>
                             @if(Auth::user()->profile == null)
                                <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                            @else
                                <img style="height: 75px;width: 75px" src="<?= Url('/user-img/'.Auth::user()->profile->image_b); ?>" alt="" />
                            @endif
                        </span>
                    </div>
                    <h4> {{Auth::user()->username}}</h4>
                    <span class="red-bg"><i class="ti-user"></i> &nbsp;  {{Auth::user()->roleLabel[0]->label}} سایت</span>
                    <p>
                        @if(Auth::user()->profile == null)
                            رشته دانشگاهی
                        @else
                            {{Auth::user()->profile->education}}
                        @endif
                        </p>
                    <a title="" href="javascript:void(0)">  </a>
                    <ul class="social-btns">
                        @if(Auth::user()->social !== null)

                                @if(Auth::user()->social->facebook !== "#")
                                    <li><a  title="" target="_blank" href="{{Auth::user()->social->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if(Auth::user()->social->google !== "#")
                                    <li><a title="" target="_blank" href="{{Auth::user()->social->google}}"><i class="ti-google"></i></a></li>
                                @endif
                                @if(Auth::user()->social->tweeter !== "#")
                                    <li><a title="" target="_blank" href="{{Auth::user()->social->tweeter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if(Auth::user()->social->instagram !== "#")
                                    <li><a title="" target="_blank" href="{{Auth::user()->social->instagram}}"><i class="ti-instagram"></i></a></li>
                                @endif
                                @if(Auth::user()->social->linkedin !== "#")
                                    <li><a title="" target="_blank" href="{{Auth::user()->social->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif

                        @endif


                    </ul>
                </div>
            </div>
            @endif
            <div class="widget blank no-padding">
                <div class="carousal-widget fb-carousel">
                    <ul id="fb-carousel">
                            @foreach($events as $event)
                                    <li style="padding-top: 15px!important;">
                                <span class="img1"><img src="<?= Url('/event-img/'.$event->image); ?>" alt=""/></span>
                                <h3 style="color: #f0f0f0 !important;"> {!! \Illuminate\Support\Str::words($event->title, $words = 5, $end = '...') !!}</h3>

                                <span>  {!! \Illuminate\Support\Str::words($event->start, $words = 4, $end = '...') !!}    &nbsp;&nbsp;<i class="ti-location-pin"></i>  {!! \Illuminate\Support\Str::words($event->place, $words = 5, $end = '...') !!}</span>
                                <span>  <a href="<?= Url('/home/event/list/'.$event->id); ?>" id="popover1" class="c-btn medium green12-bg"
                                           data-content="{!! \Illuminate\Support\Str::words($event->start .' لغایت '.$event->finish, $words = 5, $end = '...') !!}" rel="popover" data-placement="top"
                                           data-original-title="{!! \Illuminate\Support\Str::words($event->description, $words = 23, $end = '...') !!}" data-trigger="hover">اطلاعات بیشتر    </a></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="widget blank no-padding">
                <div class="carousal-widget">
                    <ul id="simple-carousel">


                        @foreach($userActivities as $activity)
                        <li>
                            <div class="carousal-avatar">
                                <span><img

                                            @if( ! empty($activity->user))
                                            src="<?= Url('/user-img/'.$activity->user->profile->image_b); ?>"
                                            @else
                                            src="/images/3-sm.jpg"
                                            @endif


                                            alt=""/></span>
                                <h3>                                    @if( ! empty($activity->user))
                                        <a href="<?= Url('home/profile/show/137-'.$activity->user->id.'-42-'.$activity->user->username); ?>"
                                           title=" {{ $activity->user->name.' '.$activity->user->family }} "
                                       data-trigger="hover"> <td>
                                           {{ $activity->user->username }}
                                            </td></a>
                                    @else
                                        {{11}}
                                    @endif</h3>
                                <i>  پست
                                    @if( ! empty($activity->post) && ! empty($activity->post->user))
                                       <small> <a href="<?= Url('home/profile/show/137-'.$activity->post->user->id.'-42-'.$activity->post->user->username); ?>"
                                                   title=" {{$activity->post->user->name.' '.$activity->post->user->family}} "><small>
                                            {{ $activity->post->user->username }}
                                       </small></a> </small>@else

                                    @endif
                                        را پسندید
                                     </i>
                            </div>
                        </li>
                        @endforeach




                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
                @if(Auth::check())
                    @can('create', \App\Contents\Post::class)
            <div class="widget no-padding">
                <div class="status-upload">
                    <form  id="postForm" name="_token" method="POST" enctype="multipart/form-data"
                          action="<?= Url('/home/intro/store'); ?>">
                        {{ csrf_field() }}
                        <div id="upload" class="cell" style="display: none; width: 100%; text-align: center; margin-top: 15px">
                            <div class="card">
                                <span class="throbber">Loading&#8230;</span>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                        <textarea required id="intro" name="intro" placeholder="مطلب مورد نظر خود را بنویسید ..."></textarea>
                        <ul>
                            <li id="file-store-show"><a  title="Sound Record" data-toggle="tooltip" data-placement="bottom"><i
                                            class="ti-link"></i></a></li>
                            <li id="image-store-show"><a title="Picture" data-toggle="tooltip" data-placement="bottom"><i
                                            class="ti-gallery"></i></a></li>
                            <li><a title="ارسال به عنوان خبر" data-toggle="tooltip" data-placement="right"
                                   id="popoverone" rel="popover"
                                   data-content="انتشار عمومی مطلب" data-trigger="hover"><input title="اخبار (عمومی)" type="checkbox" name="news" value="1"></a></li>
                        </ul>

                        <div id="image-post-store" style="display: none; margin: 10px;">
                            <label style=" margin-top: 10px;">انتخاب تصویر برای پست</label>
                        <input type="file" name="image" value="image"
                               style=" margin-top: 5px; "
                               accept="images/*" id="image-post-" size="30"/><br>
                        </div>


                        <div id="file-post-store" style="display: none; margin: 10px;">
                            <label style=" margin-top: 10px;">فایل پیوست برای پست</label>
                            <input type="file" name="image_b" value="image_b"
                                   style=" margin-top: 5px; "
                                   accept="images/*" id="file-post-" size="30"/><br>
                        </div>


                        <input type="hidden" name="state" value="1">
                        <div style=" margin-bottom: 10px;">
                        <button id="postSubmit" class="btn btn-submit green-bg btn-sm" name="_token" value="{{ csrf_token() }}"><i
                                    class="ti-comment"></i> ارسال
                        </button>
                        <a data-toggle="modal" data-target=".large-modal" href="#"
                           style="margin-right: 12px; margin-top: 10px" class="btn btn-sm blue-bg"><i class="ti-comments"></i> ثبت پیشرفته</a>
                        </div>
                    </form>
                </div>
            </div>

            <script>
            $(document).ready(function (e) {
                $('#postForm').on('submit',(function(e) {
                    e.preventDefault();
                    var image = $('#image-post-').val().split('.').pop().toLowerCase();
                    var file = $('#file-post-').val().split('.').pop().toLowerCase();
                    if($.inArray(image, ['gif','png','jpg','jpeg','']) == -1 ||
                        $.inArray(file, ['gif','png','jpg','jpeg','pdf','zip','rar','ppt','pptx','xls','xlsx','doc','docx','txt','']) == -1) {
                        alert('فرمت فایل انتخابی مورد تایید نمی باشد!');
                    }else{
                    $("textarea#intro").css("display", "none");
                    $("#upload").css("display", "block");
                    $("#postSubmit").css("display", "none");
                    var formData = new FormData(this);
                    $.ajax({
                        type:'POST',
                        url: $(this).attr('action'),
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            $(".note").attr('id', 'note').css("display", "block");
                            $("textarea#intro").val("");
                            setTimeout(
                                function () {
                                    $("#image-post-store").css("display", "none");
                                    $("#file-post-store").css("display", "none");

                                    $("#upload").css("display", "none");
                                    $("#postSubmit").css("display", "block");
                                    $("textarea#intro").css("display", "block");
                                    $("#post-data").prepend(data.html);
                                }, 2000);
                            setTimeout(
                                function () {
                                    $(".note").attr('id', '').css("display", "none")}, 4000);},
                        error: function(data){
                            $("#postSubmit").css("display", "block");
                            $("#upload").css("display", "none");
                            $("textarea#intro").css("display", "block");
                            $(".noteError").attr('id', 'note').css("display", "block");
                            setTimeout(
                                function () {
                                    $(".noteError").attr('id', '').css("display", "none")}, 4000);}
                    });
                }
                }));
                $("#ImageBrowse").on("change", function() {
                });
            });

            $(document).ready(function () {
                $("#image-store-show").click(function () {
                if ($("#image-post-store").css("display") == 'none'){
                    $("#image-post-store").css("display", "block")
                }else {
                        $("#image-post-store").css("display", "none")
                    ;
                }})

            });

            $(document).ready(function () {

                $("#file-store-show").click(function () {
                    if ($("#file-post-store").css("display") == 'none'){
                        $("#file-post-store").css("display", "block")
                    }else {
                        $("#file-post-store").css("display", "none")
                        ;
                    }})

            });










        </script>


                     @endcan
                 @endif
                <div class="widget no-padding blank">
                <div class="timeline-sec">
                    <ul id="post-data">
                        @include('data')
                    </ul>


                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif"></p>
                </div>
            </div>
        </div>
        @if(Auth::check())
        <div class="col-md-3 col-sm-6">
            <div class="widget">
                <div class="quick-report-widget">
                    <span>شبکه ی ارتباطات شما </span>
                    <h4>{{Auth::user()->connections->count()}}</h4>
                    <i class="fa fa-users green-bg"></i>
                    <h5> پست های منتشر شده: {{Auth::user()->posts->count()}} </h5>
                </div>
            </div>
        </div>
        @endif

        <div class="col-md-3">
            <div class="widget white no-padding">
                <div class="widget-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" data-target="#tab1">تالارهای پربازدید</a></li>
                        <li><a data-toggle="tab" data-target="#tab2">جدیدترین تالارها</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <ul class="forum-threads" id="forum-scroll">

                                @foreach($bestForums as $bestForum1)
                                <li>
                                    <div class="user-avatar">
                                        <span><img style="margin-top:11px;width: 53px;min-height: 59px" src="<?= Url('forum-images/'. $bestForum1->image) ?>" alt=""/></span>
                                    </div>
                                    <a href="<?= Url('/home/forum/show/'.$bestForum1->id); ?>" title="">{{$bestForum1->title}}</a>
                                    <h3>ارائه توسط<a  href="<?= Url('home/profile/show/137-'.$bestForum1->user->id.'-42-'.$bestForum1->user->username); ?>" title="{{$bestForum1->user->name.' '.$bestForum1->user->family}}"> {{$bestForum1->user->username}}</a></h3>
                                    <i>{!! to_jalali_date($bestForum1->created_at) !!}</i>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <ul class="forum-threads" id="forum-scroll">
                                @foreach($lastForums as $lastForum)
                                    @if( ! empty($lastForum->image))

                                    <li>
                                        <div class="user-avatar">
                                            <span><img style=" margin-top:11px;width: 53px;min-height: 55px" src="<?= Url('forum-images/'. $lastForum->image) ?>" alt=""/></span>
                                        </div>
                                        <a href="<?= Url('/home/forum/show/'.$lastForum->id); ?>" title="">{{$lastForum->title}}</a>
                                        <h3>ارائه توسط<a  href="<?= Url('home/profile/show/137-'.$lastForum->user->id.'-42-'.$lastForum->user->username); ?>" title="{{$lastForum->user->name.' '.$lastForum->user->family}}"> {{$lastForum->user->username}}</a></h3>
                                        <i>{!! to_jalali_date($lastForum->created_at) !!}</i>
                                    </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget blank no-padding">
                <div class="tab-group">
                    <section id="tab1" title="دوره های پربازدید">
                        <ul class="forum-threads" id="forum-scroll" style="margin-top: 15px ; padding-right: 16px">



                            @foreach($bestCourses as $bestCourse1)
                            <li>
                                <div class="user-avatar">
<span>

    @if($bestCourse1->user->profile == null)
        <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
    @else
        <img   style="margin-top:10px; height: 50px;width: 50px; border: solid 1px #5e5e5e ; border-radius: 30px" src="<?= Url('/user-img/'.$bestCourse1->user->profile->image_b); ?>" alt="" />
    @endif


</span>                                </div>
                                <a href="<?= Url('/home/course/show/'.$bestCourse1->id); ?>" title="">{{$bestCourse1->title}}</a>
                                <h3><i>توسط</i>                                 <a href="<?= Url('home/profile/show/137-'.$bestCourse1->user->id.'-42-'.$bestCourse1->user->username); ?>" title="{{$bestCourse1->user->name.' '.$bestCourse1->user->family}}">{{$bestCourse1->user->username}}</a>
                                    <i>آغاز شد</i></h3>
                                <i>  {!! to_jalali_date($bestCourse1->created_at) !!}</i>
                            </li>
                            @endforeach




                        </ul>
                    </section>
                    <section id="tab2" title="آخرین دوره ها  ">
                        <ul class="forum-threads" id="forum-scroll" style="margin-top: 15px ; padding-right: 16px">

                            @foreach($lastCourses as $lastCourse)
                                <li>
                                    <div class="user-avatar">
<span>

    @if($lastCourse->user->profile == null)
        <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
    @else
        <img   style="margin-top:10px; height: 50px;width: 50px; border: solid 1px #5e5e5e ; border-radius: 30px" src="<?= Url('/user-img/'.$lastCourse->user->profile->image_b); ?>" alt="" />
    @endif


</span>                                </div>
                                    <a  href="<?= Url('/home/course/show/'.$lastCourse->id); ?>" title="">{{$lastCourse->title}}</a>
                                    <h3><i>توسط</i>                                 <a  href="<?= Url('home/profile/show/137-'.$lastCourse->user->id.'-42-'.$lastCourse->user->username); ?>" title="{{$lastCourse->user->name.' '.$lastCourse->user->family}}">{{$lastCourse->user->username}}</a>
                                        <i>آغاز شد</i></h3>
                                    <i>  {!! to_jalali_date($lastCourse->created_at) !!}</i>
                                </li>
                            @endforeach


                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                page++;
                loadMoreData(page);}
        });
        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function () {
                        $('.ajax-load').show();}
                })
                .done(function (data) {
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);

                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('مشکل در بارگذاری اطلاعات');
                });}
    </script>


    <div class="modal fade large-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="<?= Url('/home/intro/store'); ?>">
                    {{ csrf_field() }}
                <div class="modal-body">

                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                            <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                            <input type="hidden" name="intro" value="...">

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="input-group"><p style="float: right"> خبرنامه - انتشار عمومی </p>
                                    <input name="news" type="checkbox" placeholder="" value="1" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><p>انتخاب تصویر مطلب</p>
                                <input type="file" name="image" value="image" style="position: absolute; margin-top: 10px" accept="images/*"/>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="input-group"><p style="float: right"> عنوان مطلب</p>
                                    <input name="title" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="state" value="1">


                            <div class="col-md-12"><br><br>
                                <textarea required title="text" name="text" id="editor2" rows="10" cols="80"></textarea>
                                <br>

                            </div>
                        <div id="file-post-store" style="display: block; margin: 10px;">
                            <br>
                            <hr>
                                <label>فایل پیوست برای پست</label>
                                <input type="file" name="image_b" value="image_b"
                                       style=" margin-top: 5px; "
                                       accept="images/*" id="ImageBrowse" size="30"/><br>
                            </div>

                        </div>


                </div>
                <div class="modal-footer">
                    <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                    <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        CKEDITOR.replace( 'editor2',{
            filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
            filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
            filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
        });
    </script>









    <div class="modal fade like-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">کاربرانی که این پست را پسند کرده اند</h4>
                </div>


                <div class="modal-body">

                    <div class="modal-body">


                        <div id="like-users-list" >

                        </div>

                        <div id="load-before-users" class="cell" style=" width: 100%; text-align: center; margin-top: 15px">
                            <div class="card">
                                <span class="throbber">Loading&#8230;</span>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <a id="like-close-" type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                </div>

            </div>
        </div>
    </div>





@endsection

