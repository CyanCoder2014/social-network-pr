@extends('layouts.layout')
@section('content')


    <div class="row" style="min-height: 548px">
        <div class="col-md-12">
            <div class="main-title-sec">
                <br>
                <div class="row">
                    <div class="col-md-3 column">
                        <div class="heading-profile">
                            <h2>{{$posts->first()->forum->title}}</h2>
                            <span> ایجاد توسط: <a    href="<?= Url('home/profile/show/137-'.$posts->first()->forum->user->id.'-42-'.$posts->first()->forum->user->username); ?>" id="popoverone"  data-content="
                                           @if($posts->first()->forum->user->profile !== null)
                                {{$posts->first()->forum->user->profile->education}}
                                @endif
                                        " rel="popover"
                                                   data-placement="top" data-original-title="{{$posts->first()->forum->user->name.' '.$posts->first()->forum->user->family}}"
                                                   data-trigger="hover">{{$posts->first()->forum->user->username}}</a>  </span>
                        </div>
                    </div>
                    <div class="col-md-9 column">
                        <div class="top-bar-chart">
                            <span><img style="border-radius: 5px; height: 50px" src="<?= Url('course-images/'. $posts->first()->forum->image) ?>" alt=""/></span>
                        </div>
                        <div class="top-bar-chart">
                            <div class="bar-chart-details">
                                <p>تعداد کاربران </p>
                                <h5>{{$posts->first()->forum->userNumber($posts->first())}}</h5>
                            </div>
                        </div>
                        <div class="top-bar-chart">
                            <div class="bar-chart-details">
                                <p>تعداد پست ها </p>
                                <h5>{{$posts->first()->forum->postNumber($posts->first()->forum->id)}}</h5>
                            </div>
                        </div>
                        @if(Auth::check())
                            @can('create', \App\Contents\ForumPost::class)
                        <div class="quick-btn-title">
                            <a  href="#post-create-12" title=""><i class="fa fa-plus"></i> پست جدید </a>
                        </div>

                                @if(Auth::user()->can('director', \App\Contents\ForumPost::class))

                                <div style="float: left">
                                    <a class="btn btn-danger btn-sm red-bg" id="add-post-123" href="javascript:void(0)" title=""><i class="fa fa-check"></i>  درخواست های در انتظار تایید </a>
                                </div>
                                @endif
                            @endcan
                         @endif
                    </div>
                </div>
            </div><!-- Heading Sec -->
            <ul class="breadcrumbs">
                <li><a href="<?= Url('home/forum/list/'. $posts->first()->forum->cat->id) ?>">{{$posts->first()->forum->cat->title}} </a></li>
                <li style="float: left"><a href="javascript:void(0)" title=""> {!!  until_time($posts->first()->forum->created_at) !!}</a> </li>
            </ul>

            @if(Auth::check())

            @if(in_array($posts->first()->forum->id , Auth::user()->forumsGetRegister()) || Auth::user()->can('director', \App\Contents\ForumPost::class))

                    <div class="main-content-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-single">
                            <div class="blog">
                                <div class="blog-thumb">
                                </div>
                                <div class="blog-info">
<!-- <div class="post-tags">
                                        <span><i class="fa fa-tags"></i> Tags :</span>
                                        <a title="" href="javascript:void(0)">Admin</a>,
                                        <a title="" href="javascript:void(0)">Parallax</a>,
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session()->has('message'))
                <script>
                    $.notify("{{ session()->get('message') }}", "success");

                    $(".pos-demo").notify(
                        "I'm to the right of this box",
                        {position: "right"}
                    );
                </script>
            @endif
            <div style="direction: ltr !important;"> {{$posts->links()}}</div>
            <div  class="widget no-padding blank">
                <div class="timeline-sec">
                    <ul id="post-data">
                        @include('forums.forumdata')
                        <div style="direction: ltr !important;"> {{$posts->links()}}</div>
                    </ul>
                </div>
                <br><br><br>
                <div class="ajax-load text-center" style="display:none">
                    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif"></p>
                </div>
            </div>
            @if(Auth::check())
                @can('create', \App\Contents\ForumPost::class)
                    <div id="post-create-12" ></div>
            <div class="widget no-padding" style="width: 94%; float: right">
                <div class="status-upload">
                    <form  id="postForm" name="_token" method="POST" enctype="multipart/form-data"
                           action="<?= Url('/home/forum/store'); ?>">
                        {{ csrf_field() }}
                        <div id="" class="note" style="display: none">
                            پست شما با موفقیت ارسال گردید <a id="close">[close]</a>
                        </div>
                        <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">
                            خطا در ارسال پست! <a id="close">[close]</a>
                        </div>
                        <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                        <input type="hidden" name="parent_id" value="0">
                        <input type="hidden" name="forums_id" value="{{ $posts->first()->forum->id }} ">
                        <textarea required id="intro" name="intro" placeholder="مطلب مورد نظر خود را بنویسید ..."></textarea>

                        <ul>
                            <li><a title="Sound Record" data-toggle="tooltip" data-placement="bottom"><i
                                            class="ti-link"></i></a></li>
                        </ul>
                        <input type="file" name="image" value="image"
                               style="position: absolute; margin-top: 40px; display: none"
                               accept="images/*" id="ImageBrowse" size="30"/><br>
                        <input type="file" name="image_b" value="file"
                               style="position: absolute; margin-top: 40px; display: none"
                               accept="images/*"/>

                        <input type="hidden" name="state" value="1">

                        <button onclick="return fileCheck();" id="postSubmit" class="btn btn-submit green-bg btn-sm" name="_token" value="{{ csrf_token() }}"><i
                                    class="ti-comment"></i> ارسال
                        </button>
                        <a data-toggle="modal" data-target=".large-modal" href="#"
                           style="margin-right: 12px; margin-top: 10px" class="btn btn-sm blue-bg"><i
                                    class="ti-comments"></i> ثبت پیشرفته</a>
                    </form>
                </div>
            </div>

            <script>

                $(document).ready(function () {
                    $("#add-post-12, #add-post-123").click(function () {
                        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                    }); });


                $(document).ready(function (e) {
                    $('#postForm').on('submit',(function(e) {
                        e.preventDefault();
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
                                        $("#upload").css("display", "none");
                                        $("#postSubmit").css("display", "block");
                                        $("textarea#intro").css("display", "block");
                                        $("#post-data").append(data.html);
                                    }, 200);
                                setTimeout(
                                    function () {
                                        $(".note").attr('id', '').css("display", "none")}, 2400);},
                            error: function(data){
                                $("#postSubmit").css("display", "block");
                                $("#upload").css("display", "none");
                                $("textarea#intro").css("display", "block");

                                $(".noteError").attr('id', 'note').css("display", "block");
                                setTimeout(
                                    function () {
                                        $(".noteError").attr('id', '').css("display", "none")}, 4000);}
                        });
                    }));
                });
            </script>
                @endcan
            @endif










                    @elseif(in_array($posts->first()->forum->id , Auth::user()->forumsRequested()))
                        <div class="main-content-area">
                            <div class="row"><br><br><br><br><br>
                                <div class="col-md-12">

                                    <div style="display: flex; justify-content: center; align-content: center;justify-items: center;align-items: center ">
                                        <p>درخواست شما برای عضویت در این کانال ارسال شده است.</p>
                                    </div>

                                </div>
                            </div>
                        </div>


                @else(in_array($posts->first()->forum->id , Auth::user()->forumsRequested()))
                    <div class="main-content-area">
                        <div class="row"><br><br><br><br><br>
                            <div class="col-md-12">



                                <div style="display: flex; justify-content: center; align-content: center;justify-items: center;align-items: center ">
                                    <a href="<?= Url('/home/forum/request/'.$posts->first()->forum->id); ?>"  class="btn btn-success green-bg">درخواست عضویت در این تالار</a>
                                </div>

                            </div>
                        </div>
                    </div>




            @endif
            @endif








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
                      action="<?= Url('/home/forum/store'); ?>">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                            <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                            <input type="hidden" name="parent_id" value="0">
                            <input type="hidden" name="forums_id" value="{{ $posts->first()->forum->id }} ">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><p>انتخاب تصویر مطلب</p>
                                <input type="file" name="image" value="image" style="position: absolute; margin-top: 10px" accept="images/*"/>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group"><p style="float: right"> عنوان مطلب</p>
                                    <input name="title" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="state" value="1">

                            <input type="hidden" name="intro" value="متن: ">

                            <br><br><br><br>
                            <div class="col-md-12"><br><br>
                                <textarea title="text" name="text" id="editor2" rows="10" cols="80"></textarea>
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




    @if(Auth::check())
@if( Auth::user()->can('director', \App\Contents\ForumPost::class))
    <div class="row" >
        <div class="main-content-area">
            <div class="mail-area">
                <div class="row" style="float: right;">
                    <div class="col-md-12">
                        <div class="all-mail">
                            <br><br><br><br><hr>
                            <h3>    درخواست های عضویت در این تالار</h3><br>
                            <div class="mail-head">
                                <div class="search-emails">
                                    <div id="inboxMail"></div>
                                </div>
                            </div><!-- mail head -->
                            <ul class="your-emails"  id="inbox-mail-list">

                                @foreach($requests as $request)
                                    <li class="email unread">
                                        <a   href="<?= Url('home/profile/show/137-'.$request->id.'-42-'.$request->username); ?>"  id="{{$request->id}}" style="margin-right: 30px;color: #1b6d85"  class="inbox-msg"><span class="blue-bg">{{$request->username}}</span>      </a>
                                        <a href="<?= Url('/home/forum/accept/'.$forumId.'/'.$request->id); ?>" id="{{$request->id}}" style="float:left;margin-top:5px;margin-right: 20px; color: #fff8f8"   title="" class=" btn btn-success btn-sm green-bg">تایید درخواست </a>

                                        <span style="margin-right: 40px" >{{$request->name.' '.$request->family}}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div><!-- All Emails -->
                    </div>
                </div>
                <!-- Modal -->
            </div><!-- Mail Area -->
        </div>
    </div>
    @endif
    @endif


@endsection