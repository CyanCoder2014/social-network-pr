
@foreach($posts as $post)
    <li>
        <div class="timeline">
            <div class="user-timeline">
                                    <span>
                                       @if($post->user->profile == null)
                                            <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                        @else
                                            <img style="height: 50px;width: 50px" src="<?= Url('/user-img/'.$post->user->profile->image_b); ?>" alt="" />
                                        @endif
                                    </span>
            </div>
            <div class="timeline-detail">
                <div class="timeline-head">
                    <h3>&nbsp; <a   href="<?= Url('home/profile/show/137-'.$post->user->id.'-42-'.$post->user->username); ?>" id="popoverone"  data-content="
                                           @if($post->user->profile !== null)
                        {{$post->user->profile->education}}
                        @endif
                                " rel="popover"
                                  data-placement="top" data-original-title="{{$post->user->name.' '.$post->user->family}}"
                                  data-trigger="hover"> {{$post->user->username}} </a>
                        <span>{!! until_time($post->created_at) !!} </span></h3>



                    @if(Auth::check())
                        @can('create', $post)
                            <!--<div class="social-share">
                                <a id="popovertwo" data-content="34" rel="popover" data-placement="bottom"
                                   data-trigger="hover"> <i class="ti-sharethis"></i></a>
                            </div>-->
                            <!-- <div class="social-share">
                                <a id="popover7" data-content="{{$post->commentNumber($post->id)}}" rel="popover" data-placement="bottom"
                                   data-trigger="hover"> <i class="ti-comment"></i></a>
                            </div>-->
                        @endcan
                        <!-- <div class="social-share">
                            <a class="like-{{$post->id}}" id="popoverfour" data-content="{{$post->like}}" rel="popover" data-placement="bottom"
                               data-trigger="hover"> <i class="ti-heart"></i></a>
                        </div>-->
                            <div class="social-share ">
                                <a class="reply-post-<?php echo $post->id.'12'?>" id="popoverfour" data-content="پاسخ" rel="popover" data-placement="bottom"
                                   data-trigger="hover"> <i class="fa fa-reply"></i></a>
                            </div>
                        <div style="float: left" class="social-share">
                            <a title=""><i class="ti-more"></i></a>
                            <ul class="social-btns">

                                @can('ban', $post)
                                    @if($post->id !== $posts->first()->id)
                                    <li><a class="ban-{{$post->id}}" id="popoverfour" data-content="ممنوعیت" rel="popover"
                                           data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                           href="javascript:void(0)"><i class="ti-na blue-bg"></i></a></li>
                                    @endif
                                @endcan

                                <li><a class="report-{{$post->id}}" id="popoverfour" data-content="ریپورت" rel="popover"
                                       data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                       href="javascript:void(0)"><i
                                                class="ti-face-sad blue-bg"></i></a></li>
                                @can('delete', $post)
                                        @if($post->id !== $posts->first()->id)
                                            <li><a class="delete-{{$post->id}}" id="popoverfour" data-content="حذف" rel="popover"
                                                   data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                                   href="javascript:void(0)"><i
                                                            class="fa fa-trash-o blue-bg"></i></a></li>
                                        @endif
                                @endcan
                            </ul>
                        </div>
                        @can('update', $post)
                            <div style="float: left" class="social-share">
                                <a  id="edit-post-{{$post->id}}" class="" title="ویرایش"><i class="ti-pencil-alt "></i></a>
                            </div>
                        @endcan
                    @endif
                </div>
                @if($post->parent_id != 0)
                <div class="timeline2 timeline3" >
                    <ul>
                        <li style="margin-left: 20px !important;">
                            <div><span><img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"

                                    @if($post->user->profile == null )
                                       src="<?= Url('/images/3-sm.jpg'); ?>"
                                    @else
                                        src="<?= Url('/user-img/'.$post->answered($post->parent_id)->user->profile->image_b); ?>"
                                    @endif

                                            alt=""/></span>
                                <span href="<?= Url('home/profile/show/137-'.$post->answered($post->parent_id)->user->id.'-42-'.$post->answered($post->parent_id)->user->username); ?>" title="{{$post->answered($post->parent_id)->user->name.' '.$post->answered($post->parent_id)->user->family}}"><a
                                             href="<?= Url('home/profile/show/137-'.$post->answered($post->parent_id)->user->id.'-42-'.$post->answered($post->parent_id)->user->username); ?>"
                                            style="color: #242424">&nbsp; {{$post->answered($post->parent_id)->user->username}}  </a></span>
                                <p>{!! \Illuminate\Support\Str::words($post->answered($post->parent_id)->intro , $words = 180, $end = '...') !!}</p>



                                @if($post->answered($post->parent_id)->image_b !== 'null' && $post->answered($post->parent_id)->image_b !== 'file' && $post->answered($post->parent_id)->image_b !== '')
                                    <div id="file-1234-{{$post->id}}" style=" max-height: 400px;overflow: hidden">
                                        <a   href="<?= Url('/forum-files/'.$post->answered($post->parent_id)->image_b); ?>" type="button" name="_token"
                                           class="btn btn-sm btn-default"><i class="fa fa-file-archive-o"></i> دانلود پیوست
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="timeline-content">
                    <img style="width: 100%; margin-bottom: 10px" src="" alt=""/>
                    <div class="post-data-{{$post->id}}">
                        <p id="content-{{$post->id}}">

                            <?php
                            $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
                            $string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', nl2br($post->intro));
                            ?>
                            {!! \Illuminate\Support\Str::words($string, $words = 51, $end = '...') !!}


                            @if (Auth::check())
                                @if (strlen($post->intro) > 270|| strlen($post->text) > 6)
                                    <a id="more-{{$post->id}}">نمایش بیشتر </a>
                                @endif
                            @endif


                        </p>
                    <p class="post-data12-{{$post->id}}" id="contentFull-{{$post->id}}">
                    </p>
                    </div>

                    @if($post->image_b !== 'null' && $post->image_b !== 'file' && $post->image_b !== '')
                        <div id="file-1234-{{$post->id}}" style=" max-height: 400px;overflow: hidden">
                            <a   href="<?= Url('/forum-files/'.$post->image_b); ?>" type="button" name="_token"
                               class="btn btn-sm btn-default"><i class="fa fa-file-archive-o"></i> دانلود فایل پیوست
                            </a>
                        </div>
                    @endif




                    @if(Auth::check())
                        @can('update', $post)
                            <div id="textarea-{{$post->id}}" style="display: none;">
                                <textarea style="width: 100%" title="text" name="intro" id="editor{{$post->id}}" rows="10" cols="80"></textarea><br>
                            </div>
                        @endcan
                    @endif
                    <div class="share-{{$post->id}}" style="display: none;">
                        <hr><hr>
                        <textarea style="width: 100%" title="text" name="intro" id="share{{$post->id}}" rows="2" cols="80"></textarea><br>
                    </div>
                    <div id="edit-button-{{$post->id}}" style="display: none">
                        <a id="store-{{$post->id}}"  href="javascript:void(0)"
                           style="margin-right: 12px; margin-top: 10px" class="btn btn-sm blue-bg">    اعمال تغییرات</a>
                        <a id="cancel-{{$post->id}}" href="javascript:void(0)"
                           style="margin-right: 12px; margin-top: 10px" class="btn btn-sm red-bg"> انصراف    </a>
                    </div>
                    <div class="share-button-{{$post->id}}" style="display: none">
                        <a class="store-share-{{$post->id}}  btn btn-sm blue-bg"  href="javascript:void(0)"
                           style="margin-right: 12px; margin-top: 10px" >     اشتراک پست</a>
                        <a class="cancel-share-{{$post->id}} btn btn-sm red-bg" href="javascript:void(0)"
                           style="margin-right: 12px; margin-top: 10px" > انصراف    </a>

                    </div>


                    <div id="" class="report<?php echo $post->id?>" style="background-color: #337ab7 !important; margin-top: 0px ;display: none">
                        شما این پست را ریپورت کردید <a id="close">[close]</a>
                    </div>
                    <div id="" class="reportError<?php echo $post->id?>" style="background-color: #ed6b75 !important;display: none">
                        این پست را قبلا ریپورت کرده اید <a id="close">[close]</a>
                    </div>
                    <script>

                        $(document).ready(function () {
                            $("#more-{{$post->id}}").click(function () {
                                loadMore{{$post->id}}({{$post->id}});
                            });
                        });
                        function loadMore{{$post->id}}(id) {
                            $.ajax({
                                    url: '/home/forum/showMore/' + id,
                                    type: "get",
                                    success: function (data) {
                                        $('#more-{{$post->id}}').hide();
                                        $('#content-{{$post->id}}').hide();
                                        $("#contentFull-{{$post->id}}").html(data);}
                                })
                        }




                        $(document).ready(function () {
                            $(".ban-{{$post->id}}").click(function () {

                                ban{{$post->id}}({{$post->id}});
                            });
                        });
                        function ban{{$post->id}}(id) {
                            $.ajax({
                                url: '/home/forum/ban/' + id,
                                type: "get",
                                beforeSend:function(){
                                    return confirm('آیا از ممنوعیت این پست مطمئن هستید؟');
                                },
                                success: function (data) {
                                    $(".post-data-{{$post->id}}").text('این پست مجاز به نمایش نمی باشد!!');
                                    $(".post-data12-{{$post->id}}").text('').css("display", "none");


                                }
                            })
                        }

                        $(document).ready(function () {
                            $(".delete-{{$post->id}}").click(function () {

                                delete12{{$post->id}}({{$post->id}});
                            });
                        });
                        function delete12{{$post->id}}(id) {
                            $.ajax({
                                url: '/home/forum/delete/' + id,
                                type: "get",
                                beforeSend:function(){
                                    return confirm('آیا از حذف این پست مطمئن هستید؟');
                                },
                                success: function (data) {
                                    $(".post-data-{{$post->id}}").text('این پست حذف شده است!');
                                    $(".post-data12-{{$post->id}}").text('').css("display", "none");


                                }
                            })
                        }




                        $(document).ready(function () {
                            $(".report-{{$post->id}}").click(function () {
                                report{{$post->id}}({{$post->id}});
                            });
                        });
                        function report{{$post->id}}(id) {
                            $.ajax({
                                url: '/home/forum/report/' + id,
                                type: "get",
                                success: function (data) {
                                    if(data['error']=='0') {
                                        $(".report<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                        setTimeout(
                                            function () {
                                                $(".report<?php echo $post->id?>").attr('id', '').css("display", "none")
                                            }, 2400); }else {
                                        $(".reportError<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                        setTimeout(
                                            function () {
                                                $(".reportError<?php echo $post->id?>").attr('id', '').css("display", "none")
                                            }, 2400);}
                                }
                            })
                        }


                       $(document).ready(function () {
                            $(".like-{{$post->id}}").click(function () {
                                like{{$post->id}}({{$post->id}});
                            });
                        });
                        function like{{$post->id}}(id) {
                            $.ajax({
                                url: '/home/forum/like/' + id,
                                type: "get",
                                success: function (data) {
                                    $("#liked-{{$post->id}}").html(data['result']);
                                    $(".like-{{$post->id}}").addClass('unlike-{{$post->id}}').removeClass('like-{{$post->id}}');
                                    if(data['error']=='0') {
                                        $(".like<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                        $("#like12-{{$post->id}}").addClass('blue-bg').css("background-color", "#337ab7");
                                        setTimeout(
                                            function () {
                                                $(".like<?php echo $post->id?>").attr('id', '').css("display", "none")
                                            }, 2400); }else {
                                        $(".likeError<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                        $("#like12-{{$post->id}}").removeClass('blue-bg').css("background-color", "#fff");
                                        setTimeout(
                                            function () {
                                                $(".likeError<?php echo $post->id?>").attr('id', '').css("display", "none")
                                            }, 2400);}
                                }
                            })
                        }





                        $(document).ready(function () {
                            $("#edit-post-{{$post->id}}").click(function () {
                                editPost{{$post->id}}({{$post->id}});
                            });
                        });
                        function editPost{{$post->id}}(id) {
                            $.ajax({
                                url: '/home/forum/editPost/' + id,
                                type: "get",
                                success: function (data) {
                                    $('#more-{{$post->id}}').hide();
                                    $('#content-{{$post->id}}').hide();
                                    $("#editor{{$post->id}}").append(data);
                                    $("#textarea-{{$post->id}}").css("display", "block");
                                    $("#edit-button-{{$post->id}}").css("display", "block");

                                }
                            })
                        }

                        $(document).ready(function () {
                            $("#store-{{$post->id}}").click(function () {
                                store{{$post->id}}({{$post->id}});
                            });
                        });
                        function store{{$post->id}}() {
                            var _token = "{{csrf_token()}} ";
                            var intro = $("#editor{{$post->id}}").val();
                            $.ajax({
                                url: "/home/forum/storePost/{{$post->id}}",
                                type: 'POST',
                                data: {
                                    _token: _token,
                                    intro: intro},
                                dataType: 'json',
                                success: function (data) {
                                    $('#more-{{$post->id}}').hide();
                                    $('#content-{{$post->id}}').hide();
                                    $("#textarea-{{$post->id}}").css("display", "none");
                                    $("#edit-button-{{$post->id}}").css("display", "none");
                                    $("#contentFull-{{$post->id}}").html(data.html);


                                    $(".edited<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                    setTimeout(
                                        function () {
                                            $(".edited<?php echo $post->id?>").attr('id', '').css("display", "none")
                                        }, 2400);
                                },
                                error: function (data) {
                                    $(".editedError<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                    setTimeout(
                                        function () {
                                            $(".editedError<?php echo $post->id?>").attr('id', '').css("display", "none")
                                        }, 2400);}
                            });}

                        $(document).ready(function () {
                            $("#cancel-{{$post->id}}").click(function () {
                                $("#edit-button-{{$post->id}}").css("display", "none");
                                $("#textarea-{{$post->id}}").css("display", "none");

                                loadMore{{$post->id}}({{$post->id}});
                            });
                        });



                    </script>

                    <div data-toggle="buttons" class="btn-group btn-group-sm">
                        <small>
                            <small>&nbsp; <span id="liked-{{$post->id}}">{{$post->like}}</span> پسند ::&nbsp;{{$post->commentNumber($post->id)}} نظر</small>
                        </small>
                        @if(Auth::check())
                            @can('create', $post)

                            @endcan

                            @can('like', $post)
                                <label id="like12-{{$post->id}}" style="border-radius: 10px;margin-left: 4px; padding-left: 17px"  class="like-{{$post->id}} btn btn-default  blue-bg   blue-hover">
                                    <input  type="checkbox" name="options"/> <i class="ti-heart"></i>
                                </label>
                            @endcan
                            @cannot('like', $post)
                                <label id="like12-{{$post->id}}" style="border-radius: 10px;margin-left: 4px; padding-left: 17px" class="like-{{$post->id}} btn btn-default blue-hover">
                                    <input type="checkbox" name="options"/> <i class="ti-heart"></i>
                                </label>
                            @endcannot
                        @endif
                    </div>
                    <div><br><br><hr>
                    </div>
                    <div id="post-comment-first<?php echo $post->id?>">
                        @foreach($post->comments as $comment)
                            @if(Auth::check())
                                @can('create', $post)
                            <span class="margin-12" id="popoverthree" rel="popover" data-placement="top"
                                  data-original-title="{{$comment->user->name.' '.$comment->user->family}}" data-trigger="hover"
                                  data-content="
                                           @if($comment->user->profile !== null)
                                  {{$comment->user->profile->education}}
                                  @endif
                                          ">
                                 @if($comment->user->profile == null)
                                    <img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                @else
                                    <img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"  src="<?= Url('/user-img/'.$comment->user->profile->image_b); ?>" alt="" />
                                @endif
                            </span><span style="float: left;"><a
                                        id="reply-12-<?php echo $post->id . $comment->id?>"><small><i
                                                class="fa fa-reply"></i>&nbsp;پاسخ</small></a></span>
                                @endcan
                            @endif
                            <a   href="<?= Url('home/profile/show/137-'.$comment->user->id.'-42-'.$comment->user->username); ?>" title="">&nbsp;{{$comment->user->username}} </a>
                            <p>{{$comment->comment}}   </p>
                            <section class="timeline2">
                                <ul>
                                    @foreach($comment->answers as $reply)
                                        <li>
                                            <div>
                                     <span class="tooltip2"><span
                                                 class="tooltiptext2">{{$reply->user->name.' '.$reply->user->family}}</span>
                                         @if($reply->user->profile == null)
                                             <img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 3px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                         @else
                                             <img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"  src="<?= Url('/user-img/'.$reply->user->profile->image_b); ?>" alt="" />
                                         @endif

                                     </span>
                                                <span  title=""><a   href="<?= Url('home/profile/show/137-'.$reply->user->id.'-42-'.$reply->user->username); ?>"
                                                            style="color: #242424">&nbsp;{{$reply->user->username}} </a></span>
                                                <p> {{$reply->comment}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                            <script>
                                $(document).ready(function () {
                                    $("#reply-12-<?php echo $post->id . $comment->id?>").click(function () {
                                        $(".cm-1-<?php echo $post->id . $comment->id?>").css("display", "block");
                                    });
                                });
                            </script>
                                @if(Auth::check())
                                    @can('create', $post)
                            <form id="replyForm<?php echo $post->id . $comment->id?>" name="_token" method="POST" enctype="multipart/form-data"
                                  action="<?= Url('/home/forum/store'); ?>"
                                  class="cm-1-<?php echo $post->id . $comment->id?> post-reply-12  post-reply cm-12 radius-s">
                                {{ csrf_field() }}
                                <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                                <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                <textarea required id="commentText<?php echo $post->id . $comment->id?>" name="comment" placeholder=""></textarea> <i class="ti-comment"></i>
                                <div id="" class="comment<?php echo $post->id . $comment->id?>" style="margin-top: 0px ;display: none">
                                    نظر شما با موفقیت ثبت شد <a id="close">[close]</a>
                                </div>
                                <div id="" class="commentError<?php echo $post->id . $comment->id?>" style="background-color: #ed6b75 !important;display: none">
                                    خطا در ارسال نظر! <a id="close">[close]</a>
                                </div>


                            </form>
                            <a class="commentReply-<?php echo $post->id . $comment->id?> cm-1-<?php echo $post->id . $comment->id?> cm-12 c-btn small blue-bg radius-s "
                               style="float: left">ارسال پاسخ </a>
                            <script>
                                        @endcan
                                        @endif
                                var msg;
                                $(document).ready(function () {
                                    $(".commentReply-<?php echo $post->id . $comment->id?>").click(function (e) {
                                        e.preventDefault();

                                            if ($("#commentText<?php echo $post->id . $comment->id?>[name='comment']").val()== "") {
                                                $(".commentError<?php echo $post->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                setTimeout(
                                                    function () {
                                                        $(".commentError<?php echo $post->id . $comment->id?>").attr('id', '').css("display", "none")
                                                    }, 2400);
                                            } else {
                                                var _token = "{{ csrf_token() }} ";
                                        var comment = $("#commentText<?php echo $post->id . $comment->id?>[name='comment']").val();
                                        var post_forum_id = "{{$post->id}}";
                                        var parent_id = "{{$comment->id}}";
                                        var approved = "0";

                                        $.ajax({
                                            url: "/home/forum/commentStore",
                                            type: 'POST',
                                            data: {
                                                _token: _token,
                                                comment: comment,
                                                post_forum_id: post_forum_id,
                                                parent_id: parent_id,
                                                approved: approved
                                            },
                                            dataType: 'json',

                                            success: function (data) {
                                                $("#commentText<?php echo $post->id . $comment->id?>[name='comment']").val("");

                                                $(".comment<?php echo $post->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                setTimeout(
                                                    function () {
                                                        $(".comment<?php echo $post->id . $comment->id?>").attr('id', '').css("display", "none");
                                                        $('#post-comment<?php echo $post->id?>').append(data.comment);

                                                    }, 2400);

                                                if ($.isEmptyObject(data.error)) {

                                                } else {

                                                }
                                            },
                                            error: function (data) {
                                                $(".commentError<?php echo $post->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                setTimeout(
                                                    function () {
                                                        $(".commentError<?php echo $post->id . $comment->id?>").attr('id', '').css("display", "none")
                                                    }, 2400);
                                            }
                                        });
                                    }


                                }


                                );
                                });

                            </script>

                        @endforeach


                    </div>


                    <div id="post-comment<?php echo $post->id?>">
                    </div>
                    <div class="ajax-load-comment<?php echo $post->id?> text-center" style="display:none">
                        <p><img src="<?= Url('assets/images/loader.gif'); ?>"></p>
                    </div>

                    @if($post->commentNumber($post->id) !== 0 && Auth::check())
                        <a id="more-comment-<?php echo $post->id?>">
                            <small><i class="ti-comments"></i>&nbsp; نمایش نظرات بیشتر</small>
                        </a>
                    @endif
                    <script>
                        $(document).ready(function () {
                            $(".textarea-<?php echo $post->id?>").click(function () {
                                $("#cm-12-<?php echo $post->id  ?>").css("display", "block");
                            });
                        });
                    </script>
                    @if(Auth::check())
                        @can('create', $post)
                    <form  id="commentForm<?php echo $post->id  ?>" name="_token" method="POST" enctype="multipart/form-data"
                          class="post-reply radius-s" action="<?= Url('/home/forum/commentStore'); ?>">
                        {{ csrf_field() }}
                        <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <textarea required name="comment" class="textarea-<?php echo $post->id  ?>" id="commentText-<?php echo $post->id?>"
                                  placeholder="نظر خود را بنویسید ..."></textarea>

                        <i class="ti-comment"></i>
                        <div id="" class="comment<?php echo $post->id?>" style="display: none">
                            نظر شما با موفقیت ثبت شد <a id="close">[close]</a>
                        </div>
                        <div id="" class="commentError<?php echo $post->id?>" style="background-color: #ed6b75 !important;display: none">
                            خطا در ارسال نظر! <a id="close">[close]</a>
                        </div>
                        <div id="" class="commentLoad<?php echo $post->id?>" style="background-color: #36c6d3 !important;display: none">
                            فعلا نظر دیگری برای این پست ثبت نشده <a id="close">[close]</a>
                        </div>



                        <div id="" class="like<?php echo $post->id?>" style="margin-top: 0px ;display: none">
                            شما این پست را پسند کردید <a id="close">[close]</a>
                        </div>
                        <div id="" class="likeError<?php echo $post->id?>" style="background-color: #36c6d3 !important;display: none">
                            علاقه مندی شما به این پست لغو شد <a id="close">[close]</a>
                        </div>

                    </form>
                    <button type="button" id="cm-12-<?php echo $post->id  ?>" class="comment-btn<?php echo $post->id?> cm-12 c-btn small blue-bg radius-s"  style="float: left " name="_token" value="{{ csrf_token() }}"><i
                                class="ti-comment"></i> ارسال نظر
                    </button>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::check())
            @can('create', $post)
        <a id="reply-post-<?php echo $post->id.'12'?>" class="reply-post-<?php echo $post->id.'12'?> btn blue-hover hover-shadow"><i class="fa fa-reply"></i> پاسخ به این پست </a>
        <div class="reply-box-<?php echo $post->id.'12'?>  widget no-padding" style="display: none; width: 94%; float: right; margin-bottom: 50px">
        <div class="status-upload">
            <form  id="postForm<?php echo $post->id.'12'?>" name="_token" method="POST" enctype="multipart/form-data"
                   action="<?= Url('/home/forum/store'); ?>">
                {{ csrf_field() }}
                <input type="hidden" name="forums_id" value="{{ $post->forum->id }} ">

                <div id="" class="note<?php echo $post->id.'12'?>" style="display: none">
                    پست شما با موفقیت ارسال گردید <a id="close">[close]</a>
                </div>
                <div id="" class="noteError<?php echo $post->id.'12'?>" style="background-color: #ed6b75 !important; display: none">
                    خطا در ارسال پست! <a id="close">[close]</a>
                </div>
                <i id="upload<?php echo $post->id.'12'?>" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                <input type="hidden" name="parent_id" value="<?php echo $post->id?>">
                <textarea  id="textarea<?php echo $post->id.'12'?>" required name="intro" placeholder="پاسخ مورد نظر برای این پست را بنویسید ..."></textarea>

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

                <button id="postSubmit<?php echo $post->id.'12'?>" class="btn btn-submit green-bg btn-sm" name="_token" value="{{ csrf_token() }}"><i
                            class="ti-comment"></i> ارسال
                </button>

                <a data-toggle="modal" data-target=".large-modal" href="#"
                   style="margin-right: 12px; margin-top: 10px" class="btn btn-sm blue-bg"><i
                            class="ti-comments"></i> ثبت پیشرفته</a>
                <a id="reply-close-<?php echo $post->id.'12'?>"
                   style="margin-right: 12px; margin-top: 10px" class="btn btn-sm red-bg"> <i
                            class="ti-close"></i> بستن </a>
            </form>
        </div>
        </div>
            @endcan
        @endif
    </li>




    <script>
        $(document).ready(function () {
            $(".reply-post-<?php echo $post->id.'12'?>").click(function () {
                $(".reply-box-<?php echo $post->id.'12'?>").css("display", "block");
                $("#reply-post-<?php echo $post->id.'12'?>").hide();
            });
        });
        $(document).ready(function () {
            $("#reply-close-<?php echo $post->id.'12'?>").click(function () {
                $(".reply-box-<?php echo $post->id.'12'?>").css("display", "none");
                $("#reply-post-<?php echo $post->id.'12'?>").show();
            });
        });
        $(document).ready(function (e) {
            $('#postForm<?php echo $post->id.'12'?>').on('submit',(function(e) {
                e.preventDefault();
                $("#textarea<?php echo $post->id.'12'?>").css("display", "none");
                $("#upload<?php echo $post->id.'12'?>").css("display", "block");
                $("#postSubmit<?php echo $post->id.'12'?>").css("display", "none");
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $(".note<?php echo $post->id.'12'?>").attr('id', 'note').css("display", "block");
                        $("#textarea<?php echo $post->id.'12'?>").val("");
                        setTimeout(
                            function () {
                                $("#upload<?php echo $post->id.'12'?>").css("display", "none");
                                $(".reply-box-<?php echo $post->id.'12'?>").css("display", "none");
                                $(".note<?php echo $post->id.'12'?>").attr('id', '').css("display", "none")}, 2400);},
                    error: function(data){
                        $("#postSubmit<?php echo $post->id.'12'?>").css("display", "block");
                        $("#upload<?php echo $post->id.'12'?>").css("display", "none");
                        $("#textarea<?php echo $post->id.'12'?>").css("display", "block");

                        $(".noteError<?php echo $post->id.'12'?>").attr('id', 'note').css("display", "block");
                        setTimeout(
                            function () {
                                $(".noteError<?php echo $post->id.'12'?>").attr('id', '').css("display", "none")}, 4000);
                    }
                });
            }));
        });




        var msg;
        $(document).ready(function () {
            $("#cm-12-<?php echo $post->id  ?>").click(function (e) {
                e.preventDefault();
                if ($("#commentText-<?php echo $post->id?>[name='comment']").val()== "") {
                        $(".commentError<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                        setTimeout(
                            function () {
                                $(".commentError<?php echo $post->id?>").attr('id', '').css("display", "none")}, 2400);
                    } else {

                        var _token = "{{ csrf_token() }} ";
                        var comment = $("#commentText-<?php echo $post->id?>[name='comment']").val();
                        var post_forum_id = "{{$post->id}}";
                        var parent_id = "0";
                        var approved = "0";
                        $.ajax({
                            url: "/home/forum/commentStore",
                            type: 'POST',
                            data: {
                                _token: _token,
                                comment: comment,
                                post_forum_id: post_forum_id,
                                parent_id: parent_id,
                                approved: approved
                            },
                            dataType: 'json',
                            success: function (data) {
                                $("#commentText-<?php echo $post->id?>[name='comment']").val("");
                                $(".comment<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                setTimeout(
                                    function () {
                                        $("#cm-12-<?php echo $post->id  ?>").css("display", "none");
                                        $(".comment<?php echo $post->id?>").attr('id', '').css("display", "none")}, 2400);
                                $('#post-comment<?php echo $post->id?>').append(data.comment);

                                if ($.isEmptyObject(data.error)) {
                                } else {}
                            },
                            error: function (data) {
                                $(".commentError<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                                setTimeout(
                                    function () {
                                        $(".commentError<?php echo $post->id?>").attr('id', '').css("display", "none")}, 2400);}
                        });
                    }
                }
            );
        });



        var id<?php echo $post->id?>id = 0;
        $(document).ready(function () {
            $("#more-comment-<?php echo $post->id?>").click(function () {
                id<?php echo $post->id?>id++;
                loadMoreComments<?php echo $post->id?>(id<?php echo $post->id?>id);
            });
        });
        function loadMoreComments<?php echo $post->id?>(id) {
            $.ajax(
                {
                    url: '/home/forum/getComments/' + <?php echo $post->id?> +'/1?page=' + id,
                    type: "get", beforeSend: function () {
                    $('.ajax-load-comment<?php echo $post->id?>').show();
                },
                    success: function (data) {
                        if (data == "") {
                            $('.ajax-load-comment<?php echo $post->id?>').hide();
                            $(".commentLoad<?php echo $post->id?>").attr('id', 'note').css("display", "block");
                            setTimeout(
                                function () {
                                    $(".commentLoad<?php echo $post->id?>").attr('id', '').css("display", "none")}, 2300);
                            return}
                        $('#post-comment-first<?php echo $post->id?>').hide();
                        $('#post-comment<?php echo $post->id?>').append(data);
                        $('.ajax-load-comment<?php echo $post->id?>').hide();}
                })
        }
    </script>

@endforeach

