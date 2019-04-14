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


    <div class="row">
        <div class="col-md-12">





            <div id="overlay"></div>
            <div id="overlayContent">
                <img id="imgBig" src="" alt="" />
            </div>


            <div class="profile-sec"  >
                <div class="profile-head overlay"
                     @if($user->profile !== null)
                     @if($user->profile->image !== null)
                     style="background-image: url(../../../user-img/{{$user->profile->image}})"
                     @endif
                     @endif
                >


                    <div class="profile-avatar">
                        <span>
                            @if($user->name == null)
                            <img  src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                        @else
                                <img id="imgSmall" style="height: 90px;width: 90px" src="<?= Url('/user-img/'.$user->profile->image_b); ?>" alt="" />
                                <script>

                            $("#imgSmall").click(function(){
                                $("#imgBig").attr("src","<?= Url('/user-img/'.$user->profile->image_b); ?>");
                                $("#overlay").show();
                                $("#overlayContent").css("display", "flex");
                            });

                            $("#imgBig, #overlay").click(function(){
                                $("#imgBig").attr("src", "");
                                $("#overlay").hide();
                                $("#overlayContent").hide();
                            });
                        </script>
                            @endif

                        </span>








                        <div class="profile-name">

                            @if($user->profile == null)
                            <h3 style="color: #f0f0f0 !important;">{{$user->username}} </h3>
                            @else
                                <h3 style="color: #f0f0f0 !important;">{{$user->name.' '.$user->family}} </h3>
                            @endif


                            @if($user->profile !== null)
                            <i>   {{$user->profile->education}} </i>
                            <i>     {{$user->profile->job}}</i>
                            @endif

                            <ul class="social-btns">

                                @if($user->social !== null)

                                       @if($user->social->facebook !== "#")
                                <li><a  title="" target="_blank" href="{{$user->social->facebook}}"><i class="ti-facebook"></i></a></li>
                                       @endif
                                       @if($user->social->google !== "#")
                                <li><a title="" target="_blank" href="{{$user->social->google}}"><i class="ti-google"></i></a></li>
                                       @endif
                                       @if($user->social->tweeter !== "#")
                                <li><a title="" target="_blank" href="{{$user->social->tweeter}}"><i class="ti-twitter"></i></a></li>
                                       @endif
                                       @if($user->social->instagram !== "#")
                                <li><a title="" target="_blank" href="{{$user->social->instagram}}"><i class="ti-instagram"></i></a></li>
                                       @endif
                                       @if($user->social->linkedin !== "#")
                                <li><a title="" target="_blank" href="{{$user->social->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                           @else
                                <li><a title="" href="#"><i class=""></i></a></li>
                                       @endif

                                    @else
                                    <li><a title="" href="#"><i class=""></i></a></li>
                                @endif

                            </ul>
                        </div>
                    </div>

                    <ul class="profile-count">
                        <li>{{$user->connections->where('followers_id', !0)->count()}}<i>همراهان</i></li>
                        <li>{{$user->courses->count()}}<i>دوره ها</i></li>
                        <li>{{$user->posts->count()}}<i>پست ها</i></li>
                    </ul>
                    <ul class="profile-connect">
                        @if(Auth::check())
                            @cannot('edit', $user)

                                @cannot('follow', $user)
                        <li><a style="background-color: #1392e9;color: #e1e1e1" href="<?= Url('/home/profile/follow/134-'.$user->id); ?>" title="">لغو همراهی </a></li>
                                @endcannot
                                    @can('follow', $user)
                                    <li><a href="<?= Url('/home/profile/follow/134-'.$user->id); ?>" title="">  همراهی</a></li>
                                    @endcan


                        <li><a data-toggle="modal" data-target="#message" title="">ارسال پیام  </a></li>
                            @endcannot
                            @can('edit', $user)
                        <li><a style="border: 1px solid #f0ad4e" href="<?= Url('/home/profile/edit'); ?>" title="">ویرایش پروفایل   </a></li>
                            @endcan
                        @endif
                    </ul>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="widget blank">
                <div class="birthday blue-bg">
                    <h3><i class="ti-user"></i>{{$user->username}}<span> {{$user->roleLabel[0]->label}}   سایت</span></h3>
                </div>
            </div>

            <div class="widget with-padding">
                <div class="collapse-sec">
                    <div id="accordian2" class="c-collapse">
                        <h2><i class="ti-book blue-bg"></i> فیلدهای تحصیلی</h2>
                        <div class="content">
                                <div class="activity-feed">
                                    <ul id="activity-scroll">
                                        @foreach($user->educations as $education)
                                        <li>
                                            <span><i class="fa fa-info green-bg"></i></span>
                                            <h3>{{$education->title.' '.$education->major}} </h3>
                                            <p>  <a href="#" title="">{{$education->place}} </a></p>
                                            <i>{!! jdate_mounth_name($education->start_month)." / ".$education->start_year!!}&nbsp; - &nbsp;
                                                @if($education->finish_month !== '13')
                                                {!!jdate_mounth_name($education->finish_month)." / ".$education->finish_year!!}
                                                    @else
                                                    هم اکنون
                                                @endif
                                            </i>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        <h2><i class="ti-comments blue-bg"></i> حوزه های کاری</h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll1">
                                    @foreach($user->works as $work)
                                    <li>
                                        <span><i class="fa fa-file green-bg"></i></span>
                                        <h3>{!!  $work->major.'<br><br>'.$work->title!!} </h3>
                                        <p>  <a href="#" title="">{{$work->place}} </a></p>
                                        <i>{!!jdate_mounth_name($work->start_month)." / ".$work->start_year!!} &nbsp; - &nbsp;

                                            @if($work->finish_month !== '13')
                                            {!!jdate_mounth_name($work->finish_month)." / ".$work->finish_year!!}
                                            @else
                                                هم اکنون
                                            @endif


                                        </i>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <h2><i class="ti-bolt blue-bg"></i>مقالات و کتب منتشر شده </h2>
                        <div class="content">
                            <div class="our-clients-sec">
                                <div id="searchDir"></div>
                                <ul id="people-list" class="client-list">
                                    @foreach($user->articles as $article)
                                    <li>
                                        <span class="user-status online red-bg"><i class="fa fa-info red-bg-bg"></i></span>
                                        <div class="client-info">
                                            <h3><a href="{{$article->link}}" title="
 @if($article->coworker !== null || $article->coworker !== '')
                                                {{'سایر نویسندگان: '.$article->coworker}}
                                                @endif                                                        ">{{$article->title}} </a></h3>
                                            <p title="
@if($article->coworker !== null || $article->coworker !== '')
                                            {{'سایر نویسندگان: '.$article->coworker}}
                                            @endif                                                        ">{{$article->journal}}  </p>
                                            <p>
                                                    @if($article->type == '13')
                                                    علمی پژوهشی
                                                    @elseif($article->type == '1')
                                                کنفرانسی
                                                    @elseif($article->type == '2')
                                                    علمی ترویجی
                                                    @elseif($article->type == '3')
                                                تالیف کتاب
                                                    @elseif($article->type == '4')
                                                ترجمه کتاب
                                                    @elseif($article->type == '5')
                                                روزنامه
                                                    @elseif($article->type == '6')
                                                ISI
                                                    @elseif($article->type == '12')
                                                سایر
                                                    @endif
                                             </p>

                                            @if($article->file !== '' && $article->file !== 'null' )
                                            <p><a href="<?= Url('/article-file/'.$article->file); ?>" >دانلود مقاله</a> </p>
                                            @endif

                                            <i>{!!$article->publish_date!!}</i>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <h2><i class="ti-palette blue-bg"></i>تخصص های کاری و علمی</h2>
                        <div class="content">
                                <div class="full-report">
                                    <ul>
                                        @foreach($user->skills as $skill)
                                            <div class="e<?php echo $skill->id?>" style="background-color: #337ab7 !important; margin-top: 0px ;display: none">
                                                شما این مهارت را تایید کردید <a id="close">[close]</a>
                                            </div>
                                            <div class="eError<?php echo $skill->id?> " style="background-color: #ed6b75 !important;display: none">
                                                تایید شما بر این مهارت لغو شد <a id="close">[close]</a>
                                            </div>



                                        <li><a id="e-{{$skill->id}}"><span class="fa fa-plus"></span></a>{{$skill->title}} <i id="skillScore-{{$skill->id}}"><a  data-toggle="modal" data-target=".like-modal">{{$skill->score}}</a></i></li>


                                            <script>
                                                $(document).ready(function () {
                                                    $("#e-{{$skill->id}}").click(function () {
                                                        console.log('100');
                                                        e{{$skill->id}}({{$skill->id}});
                                                    });
                                                });
                                                function e{{$skill->id}}(id) {
                                                    $.ajax({
                                                        url: '/home/profile/eSkill/' + id,
                                                        type: "get",
                                                        success: function (data) {
                                                            console.log(data);
                                                            $("#skillScore-{{$skill->id}}").html(data['result']);
                                                            if(data['error']=='0') {
                                                                $(".e<?php echo $skill->id?>").attr('id', 'note').css("display", "block");
                                                                setTimeout(
                                                                    function () {
                                                                        $(".e<?php echo $skill->id?>").attr('id', '').css("display", "none")
                                                                    }, 2400); }else {
                                                                $(".eError<?php echo $skill->id?>").attr('id', 'note').css("display", "block");
                                                                setTimeout(
                                                                    function () {
                                                                        $(".eError<?php echo $skill->id?>").attr('id', '').css("display", "none")
                                                                    }, 2400);}
                                                        }
                                                    })
                                                }



                                                $(document).ready(function () {
                                                    $("#skillScore-{{$skill->id}}").click(function () {
                                                        likeUsers{{$skill->id}}({{$skill->id}});
                                                    });
                                                });
                                                function likeUsers{{$skill->id}}() {

                                                    $.ajax({
                                                        url: "/home/profile/endorses/{{$skill->id}}",
                                                        type: 'get',
                                                        success: function (data) {
                                                            $('#load-before-users').hide();
                                                            $("#like-users-list").html(data.users);
                                                        },
                                                        error: function (data) {
                                                        }
                                                    });}
                                                $(document).ready(function () {
                                                    $("#like-close-").click(function () {
                                                        $('#like-users-list').empty();
                                                        $('#load-before-users').show();

                                                    });
                                                });


                                            </script>

                                        @endforeach
                                    </ul>
                                </div>
                        </div>









                        <h2><i class="ti-heart blue-bg"></i>همراهان </h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll">
                                    @foreach($user->connections as $connection)

                                        @if($connection->followers_id !== '0' && ! empty($connection->following($connection->followers_id)->username))
                                            <li>
                                                <span style=" border: 1px solid #e0dfe3"> <img style="height: 35px;width: 35px;" src="<?= Url('/user-img/'.$connection->following($connection->followers_id)->profile->image_b); ?>" alt="" /></span>
                                                <h3><a target="_blank" href="<?= Url('home/profile/show/137-'.$connection->following($connection->followers_id)->id.'-42-'.$connection->following($connection->followers_id)->username); ?>">{{$connection->following($connection->followers_id)->username}} </a></h3>
                                                <p> </p>
                                            </li>
                                        @endif

                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <h2><i class="ti-heart blue-bg"></i>  کاربران همراهی شده</h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll">
                                    @if($user->id != 384)
                                    @foreach($user->connections as $connection_)

                                        @if($connection_->followings_id != '0' && !empty($connection_->following($connection_->followings_id)->username))
                                            <li>
                                                <span style=" border: 1px solid #e0dfe3"> <img style="height: 35px;width: 35px;" src="<?= Url('/user-img/'.$connection_->following($connection_->followings_id)->profile->image_b); ?>" alt="" /></span>
                                                <h3><a target="_blank" href="<?= Url('home/profile/show/137-'.$connection_->following($connection_->followings_id)->id.'-42-'.$connection_->following($connection_->followings_id)->username); ?>">{{$connection_->follower($connection_->followings_id)->username}} </a></h3>
                                                <p> </p>
                                            </li>
                                        @endif

                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>

                        <h2><i class="ti-info blue-bg"></i>درباره من</h2>
                        <div class="content">
                            @if($user->profile !== null)
                                <p>  {!! \Illuminate\Support\Str::words($user->profile->intro, $words = 51, $end = '...') !!} </p>
                            @endif
                        </div>
                    </div>
                </div><!-- Accordian -->

            </div>

            <div class="widget white">
                <div class="widget-title">
                    <h3>تالارهای عضو</h3>
                </div>
            <div class="friend-list">
                <ul id="frnd-list">

                    <li>
                        @foreach($user->forums as $forum)
                            <img src="http://placehold.it/40x40" alt="" />
                            <h3> {{$forum->title}} <i>فعال</i></h3>
                            <span class="offline"></span>
                        @endforeach
                    </li>



                </ul>
            </div>
            </div>
        </div>


                    <div class="col-md-8">

                        @if(Auth::check())
                            @can('edit', $user)
                        <div class="col-md-3 col-sm-6">
                            <div class="widget blank">
                                <a target="_blank" href="<?= Url('/home/file/category'); ?>">  <div class="quick-report-widget style2 blue-bg">
                                    <i class="fa fa-area-chart"></i>
                                    <span>دانلود و آپلود فایل  </span>
                                    </div></a>

                            </div><!-- Widget -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget blank">
                                <a target="_blank" href="<?= Url('/home/course/create'); ?>">  <div class="quick-report-widget style2 red-bg">
                                    <i class="fa fa-clock-o"></i>
                                    <span>ارسال دوره جدید </span>
                                    </div></a>

                            </div><!-- Widget -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget blank">
                                <a target="_blank" href="<?= Url('home/course/manage'); ?>">  <div class="quick-report-widget style2 skyblue-bg">
                                    <i class="fa fa-book"></i>
                                    <span>مدیریت دوره ها </span>
                                    </div></a>

                            </div><!-- Widget -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget blank">
                              <a target="_blank" href="<?= Url('home/event/category'); ?>">  <div class="quick-report-widget style2 green-bg">
                                    <i class="fa fa-bank"></i>
                                    <span> مشاهده رویداد ها </span>

                                </div></a>
                            </div><!-- Widget -->
                        </div>

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

                        </div>
                    </div>

            </div>





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

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><p>انتخاب تصویر مطلب</p>
                                <input type="file" name="image" value="image" style="position: absolute; margin-top: 10px" accept="images/*"/>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group"><p style="float: right"> عنوان مطلب</p>
                                    <input name="title" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="state" value="1">


                            <br><br><br><br>
                            <div class="col-md-12"><br><br>
                                <textarea title="text" name="intro" id="editor2" rows="10" cols="80"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer" >

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

    <div class="modal fade" id="message" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">  ارسال پیام</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/admin/message/'.$user->id); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان پیام</label>
                                    <input  class="form-control" name="title"
                                            value="">
                                </div>
                                <div class="form-group">
                                    <label> متن پیام </label>

                                </div>
                                <textarea required title="text" name="message" id="editor" rows="10" cols="80"> </textarea>
                                <br>


                                <input type="hidden" name="type"
                                       value="1">

                                <!--
                                <select class="form-control" name="type" >
                                    <option value="1">اعلان پیام</option>
                                    <option value="2">ایمیل پیام</option>
                                    <option value="3">اعلان و ایمیل پیام</option>

                                </select>-->




                            </div>
                        </div><br><br>
                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ارسال
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
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

        CKEDITOR.replace( 'editor',{
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
                    <h4 class="modal-title">کاربرانی که این تخصص را تایید کرده اند</h4>
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