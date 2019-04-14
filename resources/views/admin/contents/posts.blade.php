@extends('layouts.layout')
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                    <h1>مدیریت  پست ها </h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;عنوان پست</th>
                                            <th style="text-align: center">&nbsp;متن پست</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center">  ارسال کننده</th>
                                            <th style="text-align: center"> تایید خبرنامه</th>

                                            <th style="text-align: center"> مشاهده</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contents as $content)

                                            @if( ! empty($content->user))
                                            <tr class="odd gradeX"
                                                @if($content->news == '1')
                                                style="background-color: #e3e3e3;"
                                                @endif
                                            >
                                                <th style="text-align: center"> &nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$content->user->id.'-42-'.$content->user->username); ?>">{{$content->title}} </a></th>
                                                <th style="text-align: center; font-weight: 100"> &nbsp;{!! \Illuminate\Support\Str::words($content->intro , $words = 5, $end = '...') !!} </th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($content->created_at) !!}</th>
                                                <th style="text-align: center">

                                                    <span><img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                               @if($content->user->profile == null)
                                                               src="<?= Url('/images/3-sm.jpg'); ?>"
                                                               @else
                                                               src="<?= Url('/user-img/'.$content->user->profile->image_b); ?>"
                                                               @endif
                                                               alt=""/></span>
                                                    <span href="<?= Url('home/profile/show/137-'.$content->user->id.'-42-'.$content->user->username); ?>" title="{{$content->user->name.' '.$content->user->family}}"><a
                                                                target="_blank" href="<?= Url('home/profile/show/137-'.$content->user->id.'-42-'.$content->user->username); ?>"
                                                                style="color: #242424">&nbsp; {{$content->user->username}}  </a></span>


                                                </th>


                                                <th style="text-align: center; font-weight: 100">
                                                    @if($content->state == '1')
                                                    <a href="<?= Url('/home/admin/post/dismiss/'.$content->id); ?>" class="btn btn-warning ">عدم تایید</a>
                                                    @elseif($content->state == '0')
                                                    <a  href="<?= Url('/home/admin/post/allow/'.$content->id); ?>" class="btn btn-success "> تایید</a>
                                                    @endif
                                                </th>




                                                <th style="text-align: center; font-weight: 100"><a data-toggle="modal" data-target=".edit-page-{{$content->id}}" class="btn btn-primary "><i class="fa fa-file-text"></i></a></th>
                                                <th style="text-align: center; font-weight: 100">

                                                    <a onclick="return confirm('آیا از حذف این پست مطمئن هستید؟');"  href="<?= Url('/home/admin/post/delete/'.$content->id); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>

                                                </th>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$contents->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>







    @foreach($contents as $post)

        @if( ! empty($post->user))
        <div class="modal fade edit-page-{{$post->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                        <div class="modal-body">
                        <div class="row">

                            @if($post->comment !== '0' && ! empty($post->comment->intro))

                                <div id="share-1234-{{$post->id}}" class="timeline2 " style="direction: rtl; max-height: 500px; overflow: auto; background-color: #e9e9e9;border-bottom: solid 1px #fff; padding: 30px;">
                                <span><img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                           @if($post->share($post->comment)->user->profile == null)
                                           src="<?= Url('/images/3-sm.jpg'); ?>"
                                           @else
                                           src="<?= Url('/user-img/'.$post->share($post->comment)->user->profile->image_b); ?>"
                                           @endif
                                           alt=""/></span>
                                    <span href="<?= Url('home/profile/show/137-'.$post->share($post->comment)->user->id.'-42-'.$post->share($post->comment)->user->username); ?>" title="{{$post->share($post->comment)->user->name.' '.$post->share($post->comment)->user->family}}"><a
                                                target="_blank" href="<?= Url('home/profile/show/137-'.$post->share($post->comment)->user->id.'-42-'.$post->share($post->comment)->user->username); ?>"
                                                style="color: #242424">&nbsp; {{$post->share($post->comment)->user->username}}  </a></span>
                                    @if($post->share($post->comment)->image !== 'null' || $post->share($post->comment)->image !== '')
                                        <hr>
                                        <div style=" max-height: 600px;overflow: hidden;margin-bottom: 10px">
                                            <img style="width: 100%; margin-bottom: 10px" src="<?= Url('/post-images/'.$post->share($post->comment)->image); ?>" alt=""/>
                                        </div>
                                    @endif
                                    <p  style="margin-top: 17px">{!! \Illuminate\Support\Str::words($post->share($post->comment)->intro , $words = 180, $end = '...') !!}</p>
                                    @if($post->share($post->comment)->image_b !== 'null' && $post->share($post->comment)->image_b !== 'file' && $post->share($post->comment)->image_b !== '')
                                        <div id="file-1234-{{$post->id}}" style=" max-height: 400px;overflow: hidden">
                                            <a target="_blank" href="<?= Url('/post-files/'.$post->share($post->comment)->image_b); ?>" type="button" name="_token"
                                               class="btn btn-sm btn-default"><i class="fa fa-paperclip"></i> دانلود پیوست
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            <div class="timeline-content">
                                @if($post->image !== 'null' || $post->image !== '')
                                    <div id="image-1234-{{$post->id}}" style=" max-height: 600px;overflow: hidden;margin-bottom: 10px">
                                        <img id="imgSmall{{$post->id}}" style="border:1px solid #ecf5ec;width: 100%; margin-bottom: 10px;" src="<?= Url('/post-images/'.$post->image); ?>" alt=""/>
                                    </div>

                                    <script>
                                        $("#imgSmall{{$post->id}}").click(function(){
                                            $("#imgBig").attr("src","<?= Url('/post-images/'.$post->image); ?>");
                                            $("#overlay").show();
                                            $("#overlayContent").css("display", "block");
                                        });

                                        $("#imgBig, #overlay").click(function(){
                                            $("#imgBig").attr("src", "");
                                            $("#overlay").hide();
                                            $("#overlayContent").hide();
                                        });
                                    </script>
                                @endif
                                <div class="post-data-{{$post->id}}">

                                    <p id="content-{{$post->id}}">
                                        {!! \Illuminate\Support\Str::words($post->intro, $words = 51, $end = '...') !!}

                                        @if (Auth::check())
                                            @if (strlen($post->intro) > 270|| strlen($post->text) > 6)
                                                <a id="more-{{$post->id}}">نمایش بیشتر </a>
                                            @endif
                                        @endif
                                    </p>
                                    <p id="contentFull-{{$post->id}}"></p>
                                </div>

                            </div>

                        </div>
                        </div>
                        <div class="modal-footer" >
                            <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                        </div>

                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $("#more-{{$post->id}}").click(function () {
                    loadMore{{$post->id}}({{$post->id}});
                });
            });

            function loadMore{{$post->id}}(id) {
                $.ajax({
                    url: '/home/intro/showMore/' + id,
                    type: "get",
                    success: function (data) {
                        $('#more-{{$post->id}}').hide();
                        $('#content-{{$post->id}}').hide();
                        $("#contentFull-{{$post->id}}").html(data);}
                })
            }
        </script>
        @endif
    @endforeach
@endsection