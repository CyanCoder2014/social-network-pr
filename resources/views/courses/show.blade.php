@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="<?= Url('assets/css/DSAudioPlayer.css'); ?>">





    <div class="row" >



        <div class="col-md-3 ">

            <div class="widget blank">
                    <div class="tweet-widget">

                        <div class="ribbon-wrapper"><div class="ribbon-design skyblue-bg" style="font-size: 10px"> {{\Illuminate\Support\Str::words($course->user->profile->education , $words = 3, $end = '')}}</div></div>
                        <!-- <img src="/images/00333.jpg " alt="" style="max-height: 162px ; overflow: hidden"/>
                        -->
                        <div class="twitter-profile">
                            <span style="width: 61px;height: 61px">

                                  @if($course->user->profile == null)
                                    <img style="width: 60px;height: 60px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />

                                @else
                                    <img style="width: 60px;height: 60px" src="<?= Url('/user-img/'.$course->user->profile->image_b); ?>" alt="" />
                                @endif




                            </span>
                            <h3><a   href="<?= Url('home/profile/show/137-'.$course->user->id.'-42-'.$course->user->username); ?>">{{$course->user->username}} </a><i title="Verified" class="fa fa-check skyblue-bg" data-toggle="tooltip" data-placement="top"></i></h3>
                            <h4>{{$course->user->name.' '.$course->user->family}}  </h4>
                        </div>

                        <ul class="twitter-activity">
                            <li><i>همراهان</i><span>{{$course->user->connections->where('followers_id', !0)->count()}}</span></li>
                            <li><i>پست ها</i><span>{{$course->user->posts->count()}}</span></li>
                            <li><i>دوره ها</i><span>{{$course->user->courses->count()}}</span></li>
                        </ul>
                    </div><!-- Twitter Widget -->
            </div>

            <div class="widget blank" style="background-color: #0091cb;">
            <div style="background-color: #0091cb; direction: ltr" class="DSAudioPlayer" data-xmlPath="<?= Url('/home/course/media/'.$course->id); ?>"></div>
            </div>

            <div class="widget">
                <div style="max-height:600px; overflow: hidden" class="product-sale">
                    <img src="<?= Url('/course-img/'.$course->image); ?>" alt="" />

                </div>
            </div>
        </div>



        <div class="col-md-9">
            <div class="widget">
                <div class="widget-title">
                    <h3> {{$course->title}}</h3>
                    <span>   {{$course->cat->title}}</span>
                    <div class="widget-controls">
                        <span class="expand-content"><i class="fa fa-expand"></i></span>
                        <!--<span class="refresh-content"><i class="fa fa-refresh"></i></span>-->
                        <!--<span class=""><i class="fa fa-stop"></i></span>-->

                    </div><!-- Widget Controls -->
                </div>
                <div class="with-padding" >



                    <section class="center slider">
                        @foreach($course->slides as $slide)
                        <div>
                            <h3>{{$slide->title}}  </h3>
                            <div style="max-height: 550px;overflow: hidden">

                                @if($slide->effect == '1')
                                    <img src="{{$slide->description}}" alt="{{$slide->title}}"/>
                                @else
                                    <img src="<?= Url('/course-slide/'.$slide->image); ?>" alt="{{$slide->title}}">
                                @endif

                            </div>
                            <br>
                            @if($slide->effect != '1')
                                <p>{{$slide->description}}</p>
                            @endif
                            <br>
                        </div>
                        @endforeach
                    </section>








                      </div>
                  </div>
                  <div class="widget no-padding blank">
                      <div class="timeline-sec">
                          <ul>
                              <li>
                                  <div class="timeline">
                                      <div class="user-timeline">
                                    <span>
                                         @if($course->user->profile == null)
                                            <img src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                        @else
                                            <img style="height: 50px;width: 50px" src="<?= Url('/user-img/'.$course->user->profile->image_b); ?>" alt="" />
                                        @endif
                                    </span>
                                      </div>
                                      <div class="timeline-detail">
                                          <div class="timeline-head">
                                              <h3>&nbsp; <a   href="<?= Url('home/profile/show/137-'.$course->user->id.'-42-'.$course->user->username); ?>" id="popoverone" data-content="
                                           @if($course->user->profile !== null)
                                                  {{$course->user->profile->education}}
                                                  @endif
                                                          " rel="popover"
                                                            data-placement="top" data-original-title="{{$course->user->name.' '.$course->user->family}}"
                                                            data-trigger="hover"> {{$course->user->username}} </a>
                                                  <span>  {!! until_time($course->created_at) !!}  </span></h3>
                                          @if(Auth::check())
                                              @can('create', $course)
                                                  <!--
                    <div class="social-share">
                        <a id="popovertwo" data-content="34" rel="popover" data-placement="bottom"
                           data-trigger="hover"> <i class="ti-sharethis"></i></a>
                    </div>
                            <div class="social-share">
                                <a id="popover7" data-content="{{$course->commentNumber($course->id)}}" rel="popover" data-placement="bottom"
                                   data-trigger="hover"> <i class="ti-comment"></i></a>
                            </div>
                            -->
                                              @endcan
                                              <!--
                            <div class="social-share">
                                <a class="like-{{$course->id}}" id="popoverfour" data-content="{{$course->like}}" rel="popover" data-placement="bottom"
                                   data-trigger="hover"> <i class="ti-heart"></i></a>
                            </div>
                            -->
                                                  <div style="float: left" class="social-share">
                                                      <a title=""><i class="ti-more"></i></a>
                                                      <ul class="social-btns">
                                                          @can('ban', $course)
                                                              <li><a class="ban-{{$course->id}} " id="popoverfour" data-content="ممنوعیت" rel="popover"
                                                                     data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                                                     href="javascript:void(0)"><i class="ti-na blue-bg"></i></a></li>
                                                          @endcan
                                                          <li><a class="report-{{$course->id}}" id="popoverfour" data-content="ریپورت" rel="popover"
                                                                 data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                                                 href="javascript:void(0)"><i
                                                                          class="ti-face-sad blue-bg"></i></a></li>
                                                          @can('delete', $course)
                                                              <li><a class="delete-{{$course->id}}" id="popoverfour" data-content="حذف" rel="popover"
                                                                     data-trigger="hover"  data-toggle="tooltip" data-placement="left"
                                                                     href="javascript:void(0)"><i
                                                                              class="fa fa-trash-o blue-bg"></i></a></li>
                                                          @endcan
                                                      </ul>
                                                  </div>
                                                  @can('update', $course)
                                                      <div style="float: left" class="social-share">
                                                          <a id="edit-post-{{$course->id}}" class="" title="ویرایش"><i class="ti-pencil-alt "></i></a>
                                                      </div>
                                                  @endcan
                                              @endif
                                          </div>




                                          <div class="timeline-content">



                                              <div class="post-data-{{$course->id}}">

                                                  <p id="content-{{$course->id}}">
                                                      {!! \Illuminate\Support\Str::words($course->text, $words = 1000, $end = '...') !!}
                                                      @if (strlen($course->text) > 112700 && Auth::check())
                                                          <a id="more-{{$course->id}}">نمایش بیشتر </a>
                                                      @endif
                                                  </p>
                                                  <p id="contentFull-{{$course->id}}"></p>
                                              </div>


                                              @if($course->image_b !== 'null' && $course->image_b !== 'file' && $course->image_b !== '')
                                                  <div id="file-1234-{{$course->id}}" style=" max-height: 400px;overflow: hidden">
                                                      <a   href="<?= Url('/post-files/'.$course->image_b); ?>" type="button" name="_token"
                                                         class="btn btn-sm btn-default"><i class="fa fa-file-archive-o"></i> دانلود پیوست
                                                      </a>
                                                  </div>
                                              @endif



                                              @if(Auth::check())
                                                  @can('update', $course)
                                                      <div id="textarea-{{$course->id}}" style="display: none;">
                                                          <textarea style="width: 100%" title="text" name="intro" id="editor{{$course->id}}" rows="10" cols="80"></textarea><br>
                                                      <!--<script>
                            CKEDITOR.replace( 'editor{{$course->id}}',{
                                filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                                filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                                filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                            });
                        </script>-->
                                                      </div>
                                                  @endcan
                                              @endif

                                              <div class="share-{{$course->id}}" style="display: none;">
                                                  <hr><hr>
                                                  <textarea style="width: 100%" title="text" name="intro" id="share{{$course->id}}" rows="2" cols="80"></textarea><br>
                                              </div>



                                              <div id="edit-button-{{$course->id}}" style="display: none">
                                                  <a id="store-{{$course->id}}"  href="javascript:void(0)"
                                                     style="margin-right: 12px; margin-top: 10px" class="btn btn-sm blue-bg">    اعمال تغییرات</a>
                                                  <a id="cancel-{{$course->id}}" href="javascript:void(0)"
                                                     style="margin-right: 12px; margin-top: 10px" class="btn btn-sm red-bg"> انصراف    </a>
                                              </div>


                                              <div class="share-button-{{$course->id}}" style="display: none">
                                                  <a class="store-share-{{$course->id}}  btn btn-sm blue-bg"  href="javascript:void(0)"
                                                     style="margin-right: 12px; margin-top: 10px" >     اشتراک پست</a>
                                                  <a class="cancel-share-{{$course->id}} btn btn-sm red-bg" href="javascript:void(0)"
                                                     style="margin-right: 12px; margin-top: 10px" > انصراف    </a>

                                              </div>

                                              <div id="" class="report<?php echo $course->id?>" style="background-color: #337ab7 !important; margin-top: 0px ;display: none">
                                                  شما این پست را ریپورت کردید <a id="close">[close]</a>
                                              </div>
                                              <div id="" class="reportError<?php echo $course->id?>" style="background-color: #ed6b75 !important;display: none">
                                                  این پست را قبلا ریپورت کرده اید <a id="close">[close]</a>
                                              </div>
                                              <script>
                                                  $(document).ready(function () {
                                                      $("#more-{{$course->id}}").click(function () {
                                                          loadMore{{$course->id}}({{$course->id}});
                                                      });
                                                  });

                                                  function loadMore{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/intro/showMore/' + id,
                                                          type: "get",
                                                          success: function (data) {
                                                              $('#more-{{$course->id}}').hide();
                                                              $('#content-{{$course->id}}').hide();
                                                              $("#contentFull-{{$course->id}}").html(data);}
                                                      })
                                                  }



                                                  $(document).ready(function () {
                                                      $(".ban-{{$course->id}}").click(function () {

                                                          ban{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function ban{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/post/ban/' + id,
                                                          type: "get",
                                                          beforeSend:function(){
                                                              return confirm('آیا از ممنوعیت این پست مطمئن هستید؟');
                                                          },
                                                          success: function (data) {
                                                              $(".post-data-{{$course->id}}").text('این پست مجاز به نمایش نمی باشد!!');
                                                              $(".post-data12-{{$course->id}}").text('').css("display", "none");


                                                          }
                                                      })
                                                  }

                                                  $(document).ready(function () {
                                                      $(".delete-{{$course->id}}").click(function () {

                                                          delete12{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function delete12{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/post/delete/' + id,
                                                          type: "get",
                                                          beforeSend:function(){
                                                              return confirm('آیا از حذف این پست مطمئن هستید؟');
                                                          },
                                                          success: function (data) {
                                                              $(".post-data-{{$course->id}}").text('این پست حذف شده است!');
                                                              $("#share-1234-{{$course->id}}").css("display", "none");
                                                              $("#image-1234-{{$course->id}}").css("display", "none");
                                                              $(".post-data12-{{$course->id}}").text('').css("display", "none");


                                                          }
                                                      })
                                                  }


                                                  $(document).ready(function () {
                                                      $(".report-{{$course->id}}").click(function () {
                                                          report{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function report{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/post/report/' + id,
                                                          type: "get",
                                                          success: function (data) {
                                                              if(data['error']=='0') {
                                                                  $(".report<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                                  setTimeout(
                                                                      function () {
                                                                          $(".report<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                      }, 2400); }else {
                                                                  $(".reportError<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                                  setTimeout(
                                                                      function () {
                                                                          $(".reportError<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                      }, 2400);}
                                                          }
                                                      })
                                                  }


                                                  $(document).ready(function () {
                                                      $(".like-{{$course->id}}").click(function () {
                                                          like{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function like{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/post/like/' + id,
                                                          type: "get",
                                                          success: function (data) {
                                                              console.log(data);
                                                              $("#liked-{{$course->id}}").html(data['result']);
                                                              $(".like-{{$course->id}}").addClass('unlike-{{$course->id}}').removeClass('like-{{$course->id}}');
                                                              if(data['error']=='0') {
                                                                  $(".like<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                                  $("#like12-{{$course->id}}").addClass('blue-bg').css("background-color", "#337ab7");
                                                                  setTimeout(
                                                                      function () {
                                                                          $(".like<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                      }, 2400); }else {
                                                                  $(".likeError<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                                  $("#like12-{{$course->id}}").removeClass('blue-bg').css("background-color", "#fff");
                                                                  setTimeout(
                                                                      function () {
                                                                          $(".likeError<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                      }, 2400);}
                                                          }
                                                      })
                                                  }





                                                  $(document).ready(function () {
                                                      $("#edit-post-{{$course->id}}").click(function () {
                                                          editPost{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function editPost{{$course->id}}(id) {
                                                      $.ajax({
                                                          url: '/home/intro/editPost/' + id,
                                                          type: "get",
                                                          success: function (data) {
                                                              $('#more-{{$course->id}}').hide();
                                                              $('#content-{{$course->id}}').hide();
                                                              $("#editor{{$course->id}}").append(data);
                                                              $("#textarea-{{$course->id}}").css("display", "block");
                                                              $("#edit-button-{{$course->id}}").css("display", "block");

                                                          }
                                                      })
                                                  }


                                                  $(document).ready(function () {
                                                      $("#store-{{$course->id}}").click(function () {
                                                          store{{$course->id}}({{$course->id}});
                                                      });
                                                  });
                                                  function store{{$course->id}}() {
                                                      var _token = "{{csrf_token()}} ";
                                                      var intro = $("#editor{{$course->id}}").val();
                                                      $.ajax({
                                                          url: "/home/intro/storePost/{{$course->id}}",
                                                          type: 'POST',
                                                          data: {
                                                              _token: _token,
                                                              intro: intro
                                                          },
                                                          dataType: 'json',
                                                          success: function (data) {
                                                              $('#more-{{$course->id}}').hide();
                                                              $('#content-{{$course->id}}').hide();
                                                              $("#textarea-{{$course->id}}").css("display", "none");
                                                              $("#edit-button-{{$course->id}}").css("display", "none");
                                                              $("#contentFull-{{$course->id}}").html(data.html);


                                                              $(".edited<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                              setTimeout(
                                                                  function () {
                                                                      $(".edited<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                  }, 2400);
                                                          },
                                                          error: function (data) {
                                                              $(".editedError<?php echo $course->id?>").attr('id', 'note').css("display", "block");
                                                              setTimeout(
                                                                  function () {
                                                                      $(".editedError<?php echo $course->id?>").attr('id', '').css("display", "none")
                                                                  }, 2400);
                                                          }
                                                      });}


                                                  $(document).ready(function () {
                                                      $("#cancel-{{$course->id}}").click(function () {
                                                          $("#edit-button-{{$course->id}}").css("display", "none");
                                                          $("#textarea-{{$course->id}}").css("display", "none");

                                                          loadMore{{$course->id}}({{$course->id}});
                                                      });
                                                  });




















                                                  $(document).ready(function () {
                                                      $("#share-post-{{$course->id}}").click(function () {
                                                          $(".share-button-{{$course->id}}").css("display", "block");
                                                          $(".share-{{$course->id}}").css("display", "block");

                                                      });
                                                  });

                                                  $(document).ready(function () {
                                                      $(".store-share-{{$course->id}}").click(function () {
                                                          $("#share-button-{{$course->id}}").css("display", "block");
                                                          $("#share-{{$course->id}}").css("display", "block");

                                                          share{{$course->id}}();



                                                      });
                                                  });



                                                  function share{{$course->id}}() {
                                                      var _token = "{{csrf_token()}} ";
                                                      var intro = $("#share{{$course->id}}").val();
                                                      var comment = "{{$course->id}}";
                                                      var state = "1";
                                                      $.ajax({
                                                          url: "/home/post/share/{{$course->id}}",
                                                          type: 'POST',
                                                          data: {
                                                              _token: _token,
                                                              intro: intro,
                                                              comment: comment,
                                                              state: state
                                                          },
                                                          dataType: 'json',
                                                          success:function(data){
                                                              $(".share-button-{{$course->id}}").css("display", "none");
                                                              $(".share-{{$course->id}}").css("display", "none");

                                                              $(".note").attr('id', 'note').css("display", "block");
                                                              $("textarea#intro").val("");
                                                              setTimeout(
                                                                  function () {
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
                                                      });}


                                                  $(document).ready(function () {
                                                      $(".cancel-share-{{$course->id}}").click(function () {
                                                          $(".share-button-{{$course->id}}").css("display", "none");
                                                          $(".share-{{$course->id}}").css("display", "none");

                                                      });
                                                  });




                                              </script>

                                              <div data-toggle="buttons" class="btn-group btn-group-sm">
                                                  <small>

                                                      <div id="" class="like<?php echo $course->id?>" style="margin-top: 0px ;display: none">
                                                          شما این پست را پسند کردید <a id="close">[close]</a>
                                                      </div>
                                                      <div id="" class="likeError<?php echo $course->id?>" style="background-color: #36c6d3 !important;display: none">
                                                          علاقه مندی شما به این پست لغو شد <a id="close">[close]</a>
                                                      </div>



                                                      <div id="" class="edited<?php echo $course->id?>" style="margin-top: 0px ;display: none">
                                                          پست شما با موفقیت تغییر یافت <a id="close">[close]</a>
                                                      </div>
                                                      <div id="" class="editedError<?php echo $course->id?>" style="background-color: #ed6b75 !important;display: none">
                                                          خطا در اعمال تغییرات <a id="close">[close]</a>
                                                      </div>



                                                      <small>&nbsp; <span id="liked-{{$course->id}}">{{$course->like}}</span> پسند ::&nbsp;{{$course->commentNumber($course->id)}} نظر</small>
                                                  </small>
                                                  @if(Auth::check())
                                                      @can('create', $course)
                                                          <label style="border-radius: 10px;margin-left: 4px"  id="share-post-{{$course->id}}"  class="btn btn-default  blue-hover">
                                                              <input type="checkbox" checked="" name="options"/><i
                                                                      class="ti-sharethis"></i>
                                                          </label>
                                                      @endcan

                                                      @can('like', $course)
                                                          <label id="like12-{{$course->id}}" style="border-radius: 10px;margin-left: 4px; padding-left: 17px"  class="like-{{$course->id}} btn btn-default  blue-bg   blue-hover">
                                                              <input  type="checkbox" name="options"/> <i class="ti-heart"></i>
                                                          </label>
                                                      @endcan
                                                      @cannot('like', $course)
                                                          <label id="like12-{{$course->id}}"   style="border-radius: 10px;margin-left: 4px; padding-left: 17px" class="like-{{$course->id}} btn btn-default blue-hover">
                                                              <input type="checkbox" name="options"/> <i class="ti-heart"></i>
                                                          </label>
                                                      @endcannot
                                                  @endif
                                              </div>
                                              <div><br><br><hr>
                                              </div>

                                              <div id="post-comment-first<?php echo $course->id?>">
                                                  @foreach($course->comments as $comment)
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
                                                          @can('create', $course)
                                                              <span style="float: left;"><a
                                                                          id="reply-12-<?php echo $course->id . $comment->id?>"><small><i
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
                                             <img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
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
                                                              $("#reply-12-<?php echo $course->id . $comment->id?>").click(function () {
                                                                  $(".cm-1-<?php echo $course->id . $comment->id?>").css("display", "block");
                                                              });
                                                          });
                                                      </script>

                                                      @if(Auth::check())
                                                          @can('create', $course)
                                                              <form id="replyForm<?php echo $course->id . $comment->id?>" name="_token" method="POST" enctype="multipart/form-data"
                                                                    action="<?= Url('/home/intro/store'); ?>"
                                                                    class="cm-1-<?php echo $course->id . $comment->id?> post-reply-12  post-reply cm-12 radius-s">
                                                                  {{ csrf_field() }}
                                                                  <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                                                                  <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                                                  <textarea required id="commentText<?php echo $course->id . $comment->id?>" name="comment" placeholder=""></textarea> <i class="ti-comment"></i>
                                                                  <div id="" class="comment<?php echo $course->id . $comment->id?>" style="margin-top: 0px ;display: none">
                                                                      نظر شما با موفقیت ثبت شد <a id="close">[close]</a>
                                                                  </div>
                                                                  <div id="" class="commentError<?php echo $course->id . $comment->id?>" style="background-color: #ed6b75 !important;display: none">
                                                                      خطا در ارسال نظر! <a id="close">[close]</a>
                                                                  </div>

                                                              </form>
                                                              <a class="commentReply-<?php echo $course->id . $comment->id?> cm-1-<?php echo $course->id . $comment->id?> cm-12 c-btn small blue-bg radius-s "
                                                                 style="float: left">ارسال پاسخ </a>
                                                          @endcan
                                                      @endif

                                                      <script>
                                                          var msg;
                                                          $(document).ready(function () {
                                                              $(".commentReply-<?php echo $course->id . $comment->id?>").click(function (e) {
                                                                  e.preventDefault();

                                                                  if ($("#commentText<?php echo $course->id . $comment->id?>[name='comment']").val()== "") {
                                                                      $(".commentError<?php echo $course->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                                      setTimeout(
                                                                          function () {
                                                                              $(".commentError<?php echo $course->id . $comment->id?>").attr('id', '').css("display", "none")
                                                                          }, 2400);
                                                                  } else {
                                                                      var _token = "{{ csrf_token() }} ";
                                                                      var comment = $("#commentText<?php echo $course->id . $comment->id?>[name='comment']").val();
                                                                      var post_id = "{{$course->id}}";
                                                                      var parent_id = "{{$comment->id}}";
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
                                                                              $("#commentText<?php echo $course->id . $comment->id?>[name='comment']").val("");
                                                                              $(".comment<?php echo $course->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                                              setTimeout(
                                                                                  function () {

                                                                                      $(".comment<?php echo $course->id . $comment->id?>").attr('id', '').css("display", "none");
                                                                                      $('#post-comment<?php echo $course->id?>').append(data.comment);

                                                                                  }, 2400);
                                                                              if ($.isEmptyObject(data.error)) {
                                                                              } else {
                                                                              }
                                                                          },
                                                                          error: function (data) {
                                                                              $(".commentError<?php echo $course->id . $comment->id?>").attr('id', 'note').css("display", "block");
                                                                              setTimeout(
                                                                                  function () {
                                                                                      $(".commentError<?php echo $course->id . $comment->id?>").attr('id', '').css("display", "none")
                                                                                  }, 2400);}
                                                                      });}

                                                              });
                                                          });
                                                      </script>
                                                  @endforeach
                                              </div>
                                              <div id="post-comment<?php echo $course->id?>">
                                              </div>
                                              <div class="ajax-load-comment<?php echo $course->id?> text-center" style="display:none">
                                                  <div class="cell">
                                                      <div class="card">
                                                          <span class="three-quarters">Loading&#8230;</span>
                                                      </div>
                                                  </div>
                                              </div>
                                              @if($course->commentNumber($course->id) !== 0 && Auth::check())
                                                  <a id="more-comment-<?php echo $course->id?>">
                                                      <small><i class="ti-comments"></i>&nbsp; نمایش نظرات بیشتر</small>
                                                  </a>
                                              @endif

                                              <script>
                                                  $(document).ready(function () {
                                                      $(".textarea-<?php echo $course->id?>").click(function () {
                                                          $("#cm-12-<?php echo $course->id  ?>").css("display", "block");
                                                      });
                                                  });
                                              </script>

                                              @if(Auth::check())
                                                  @can('create', $course)
                                                      <form  id="commentForm<?php echo $course->id  ?>" name="_token" method="POST" enctype="multipart/form-data"
                                                             class="post-reply radius-s" action="<?= Url('/home/intro/commentStore'); ?>">
                                                          {{ csrf_field() }}
                                                          <i id="upload" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="display: none; width: 100%; text-align: center; margin-top: 15px"></i>
                                                          <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                                          <textarea required name="comment" class="textarea-<?php echo $course->id  ?>" id="commentText-<?php echo $course->id?>"
                                                                    placeholder="نظر خود را بنویسید ..."></textarea>
                                                          <i class="ti-comment"></i>
                                                          <div id="" class="comment<?php echo $course->id?>" style="display: none">
                                                              نظر شما با موفقیت ثبت شد <a id="close">[close]</a>
                                                          </div>
                                                          <div id="" class="commentError<?php echo $course->id?>" style="background-color: #ed6b75 !important;display: none">
                                                              خطا در ارسال نظر! <a id="close">[close]</a>
                                                          </div>
                                                          <div id="" class="commentLoad<?php echo $course->id?>" style="background-color: #36c6d3 !important;display: none">
                                                              فعلا نظر دیگری برای این پست ثبت نشده <a id="close">[close]</a>
                                                          </div>





                                                      </form>
                                                      <button type="button" id="cm-12-<?php echo $course->id  ?>" class="comment-btn<?php echo $course->id?> cm-12 c-btn small blue-bg radius-s"  style="float: left " name="_token" value="{{ csrf_token() }}"><i
                                                                  class="ti-comment"></i> ارسال نظر
                                                      </button>
                                                  @endcan
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                              </li>


                          </ul>
                      </div>

                  </div>
              </div>


          </div>

    <script src="<?= Url('assets/js/jquery2.min.js'); ?>"></script>
    <script src="<?= Url('assets/js/pod-cast.js'); ?>"></script>

    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".regular").slick({

                // autoplay: true,
                // autoplaySpeed: 2000,
                // rtl: true

                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            $(".center").slick({


                @if($course->state !== '0')
                autoplay: 1,
                @else
                autoplay: 0,
                @endif

                autoplaySpeed: '{{$course->state}}',



                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1,
//                 rtl: true

            });
            $(".variable").slick({
                dots: true,
                infinite: true,
                variableWidth: true
            });
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>  -->
    <!--  <script src="<?= Url('assets/js/slick.js'); ?>" type="text/javascript" charset="utf-8"></script>  -->

@endsection