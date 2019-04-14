<?php
//
//if ($comments == !null){
//
//    $post->comments = $comments;
//}

?>
@foreach($comments as $comment)
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
            <img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"  src="<?= Url('/user-img/'.$comment->user->profile->image_b); ?>" alt="" />
        @endif


    </span>
    @if(Auth::check())
        @can('create', \App\Contents\Post::class)

            @if(Auth::check())
                @can('delete', $comment)
                    <span id="remove-comment{{$comment->id}}"
                          style="float: left;margin-right: 15px; color:#5e5e55"><a><small><i
                                        class="fa fa-remove"></i>&nbsp;</small></a></span>
                @endcan
            @endif


            <span id="" style="float: left;"><a
                id="reply-12-<?php echo $comment->post->id.$comment->id.'12'?>"><small><i
                        class="fa fa-reply"></i>&nbsp;پاسخ</small></a></span>

   @endcan
    @endif

    <a   href="<?= Url('home/profile/show/137-'.$comment->user->id.'-42-'.$comment->user->username); ?>" title="">&nbsp;{{$comment->user->username}} </a>
    <p id="comment-{{$comment->id}}">{{$comment->comment}}   </p>


    <script>
        $(document).ready(function () {
            $("#remove-comment{{$comment->id}}").click(function () {
                $.ajax({
                    url: '/home/intro/commentRemove/{{$comment->id}}',
                    type: "get",
                    beforeSend:function(){
                        return confirm('آیا از حذف نظر مطمئن هستید؟');
                    },
                    success: function (data) {
                        $("#comment-{{$comment->id}}").html('این نظر حذف شد!');
                    }
                })
            });
        });
    </script>




    <section class="timeline2">
        <ul>
            @foreach($comment->answers as $reply)

                <li>
                    <p id="comment-{{$reply->id}}" class="" style="background-color:  #efefef; border-radius: 4px; padding: 16px; margin-right: 10%; padding-bottom: 10px">
                                     <span class="tooltip2"><span
                                                 class="tooltiptext2">{{$reply->user->name.' '.$reply->user->family}}</span>

                                         @if($reply->user->profile == null)
                                             <img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                         @else
                                             <img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"  src="<?= Url('/user-img/'.$reply->user->profile->image_b); ?>" alt="" />
                                         @endif


                                     </span>
                        <span title=""><a    href="<?= Url('home/profile/show/137-'.$reply->user->id.'-42-'.$reply->user->username); ?>"
                                           style="color: #242424">&nbsp;{{$reply->user->username}} </a></span>




                        @if(Auth::check())
                            @can('delete', $reply)
                                <span id="remove-comment{{$reply->id}}"
                                      style="float: left; color:#5e5e55"><a><small><i
                                                    class="fa fa-remove"></i>&nbsp;</small></a></span>
                            @endcan
                        @endif

                        <br> {{$reply->comment}}
                    </p>
                </li>

                <script>
                    $(document).ready(function () {
                        $("#remove-comment{{$reply->id}}").click(function () {
                            $.ajax({
                                url: '/home/intro/commentRemove/{{$reply->id}}',
                                type: "get",
                                beforeSend:function(){
                                    return confirm('آیا از حذف نظر مطمئن هستید؟');
                                },
                                success: function (data) {
                                    $("#comment-{{$reply->id}}").html('این نظر حذف شد!');
                                }
                            })
                        });
                    });
                </script>
            @endforeach


        </ul>
    </section>

    <script>
        $(document).ready(function () {
            $("#reply-12-<?php echo $comment->post->id.$comment->id.'12'?>").click(function () {
                $(".cm-1-all").css("display", "none");
                $(".cm-1-<?php echo $comment->post->id.$comment->id.'12'?>").css("display", "block");
            });
        });





    </script>











    @if(Auth::check())
        @can('create', \App\Contents\Post::class)
    <form id="replyForm<?php echo $comment->post->id.$comment->id?>" name="_token" method="POST" enctype="multipart/form-data"
          action="<?= Url('/home/intro/store'); ?>"
          class="cm-1-all cm-1-<?php echo $comment->post->id.$comment->id.'12'?> post-reply-12  post-reply cm-12 radius-s">
        {{ csrf_field() }}
        <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>

                        <textarea required id="commentText<?php echo $comment->post->id.$comment->id?>" name="comment" placeholder=""></textarea> <i class="ti-comment"></i>

        <a class=" cm-1-all commentReply-<?php echo $comment->post->id.$comment->id?> cm-1-<?php echo $comment->post->id.$comment->id.'12'?> cm-12 c-btn small blue-bg radius-s " style="float: left">ارسال پاسخ </a>

        <div id="" class="comment<?php echo $comment->post->id.$comment->id?>" style="margin-top: 0px ;display: none">
            نظر شما با موفقیت ثبت شد <a id="close">[close]</a>
        </div>
        <div id="" class="commentError<?php echo $comment->post->id.$comment->id?>" style="background-color: #ed6b75 !important;display: none">
            خطا در ارسال نظر! <a id="close">[close]</a>
        </div>

    </form>



    <script>
        var msg;
        $(document).ready(function () {
            $(".commentReply-<?php echo $comment->post->id.$comment->id?>").click(function (e) {
                    e.preventDefault();
                    if ($("#commentText<?php echo $comment->post->id.$comment->id?>[name='comment']").val()== "") {
                        $(".commentError<?php echo $comment->post->id.$comment->id?>").attr('id', 'note').css("display", "block");
                        setTimeout(
                            function () {
                                $(".commentError<?php echo $comment->post->id.$comment->id?>").attr('id', '').css("display", "none")
                            }, 2400);

                    } else {


                        var _token = "{{ csrf_token() }} ";
                        var comment = $("#commentText<?php echo $comment->post->id.$comment->id?>[name='comment']").val();
                        var post_id = "{{$comment->post->id}}";
                        var parent_id = "{{$comment->post->id}}";
                        var approved = "0";

                        $.ajax({
                            url: "/home/intro/commentStore",
                            type: 'POST',
                            data: {
                                _token: _token,
                                comment: comment,
                                post_id: post_id,
                                parent_id: parent_id,
                                approved: approved
                            },
                            dataType: 'json',
                            success: function (data) {
                                $("#commentText<?php echo $comment->post->id.$comment->id?>[name='comment']").val("");

                                $(".comment<?php echo $comment->post->id.$comment->id?>").attr('id', 'note').css("display", "block");
                                setTimeout(
                                    function () {
                                        $(".comment<?php echo $comment->post->id.$comment->id?>").attr('id', '').css("display", "none")
                                        $('#post-comment<?php echo $comment->post->id?>').append(data.comment);
                                    }, 2400);
                                if ($.isEmptyObject(data.error)) {

                                } else {

                                }
                            },
                            error: function (data) {
                                $(".commentError<?php echo $comment->post->id.$comment->id?>").attr('id', 'note').css("display", "block");
                                setTimeout(
                                    function () {
                                        $(".commentError<?php echo $comment->post->id.$comment->id?>").attr('id', '').css("display", "none")
                                    }, 2400);
                            }
                        });
                    }


                }


            );
        });

    </script>
@endcan
    @endif

@endforeach
