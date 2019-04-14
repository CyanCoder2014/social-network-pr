@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>"/>

    <style>
        div {
            direction: rtl;

        }

        th {
            text-align: right;
        }


    </style>

    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 0px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                        نظرات
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            @foreach($comments as $comment)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$comment->id}}">
                                                                <i class="icon-comment"></i>&nbsp;{{$comment->name}}</a>
                                                        </h4>
                                                        @permission('comment-accept')
                                                        @if($comment->published == 0)
                                                            <a href="<?= Url('/admin/comment/accept/'.$comment->id); ?>" class="btn btn-warning  btn-sm"> تایید نشده</a>
                                                        @elseif($comment->published == 1)
                                                            <a href="<?= Url('/admin/comment/deny/'.$comment->id); ?>" class="btn btn-primary  btn-sm"> منتشر شده</a>
                                                        @endif
                                                        @endpermission
                                                        <a style="float: left"
                                                           class="btn btn-default  btn-sm">{!! Jdate::to_jalali($comment->date) !!}</a>

                                                    </div>
                                                    <div id="collapse{{$comment->id}}" class="panel-collapse collapse ">
                                                        <div class="panel-body">
                                                            {{$comment->comment}}
                                                            <br>
                                                            @permission('comment-delete')
                                                            <a onclick="return confirm('آیا از حذف این نظر مطمئن هستید؟');" href="<?= Url('/admin/comment/destroy/'.$comment->id); ?>" class="btn btn-danger btn-line btn-sm">  حذف نظر</a>
                                                            @endpermission
                                                        </div>
                                                        <div class="panel-body">
                                                            @permission('comment-reply')
                                                            <form name="_token" method="POST" enctype="multipart/form-data" action="{{ route('comment.reply',['url'=>$comment->id]) }}">
                                                                {{ csrf_field() }}
                                                                <input  type="hidden" name="parent_id" value="{{$comment->id}}">
                                                                <input  type="hidden" name="post_id" value="{{$comment->post_id}}">
                                                                <div class="panel-body">
                                                                    <textarea class="form-control" rows="4" name="comment" placeholder="متن پاسخ ... "></textarea>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-warning">ارسال</button>

                                                                </div>

                                                            </form>
                                                            @endpermission
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>


                </section>
            </div>
        </div>
    </div>


    <!--PAGE CONTENT -->



@endsection