{{--<li>--}}
{{--<div class="single-comment">--}}
    {{--<div class="comment-thumb">--}}
        {{--<h4 class="comment-meta pull-left">--}}
           {{--{{ $comment->name  }}:--}}
        {{--</h4>--}}
    {{--</div>--}}
    {{--<div class="comment-content">--}}
        {{--<div class="comment-text">{{ $comment->comment  }}</div>--}}
    {{--</div>--}}
    {{--<!--<a href="#" class="comment-reply btn btn-sm">Reply</a>-->--}}
    {{--@if ($comment->children->count() > 0)--}}
        {{--@foreach ($comment->children as $comment)--}}
            {{--<ul  @if(App::getLocale() == 'en')style="margin-left: 30px"@elseif(App::getLocale() == 'fa')style="margin-right: 30px"@endif>--}}
                {{--@include('contents.comment', ['comment' => $comment])--}}
            {{--</ul>--}}
        {{--@endforeach--}}
    {{--@endif--}}
{{--</div>--}}
{{--</li>--}}

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
                                                                <i class="icon-comment"></i>&nbsp;@if($comment->userid != 0){{$comment->user['name']}}@else{{ $comment->name }}@endif</a>
                                                        </h4>

                                                        <h5> مطلب : <a href="<?=  URL::to(App::getLocale()) . '/content/'.$comment->post->id; ?>">{{$comment->post->title}}</a></h5>

                                                        @if($comment->published == 0)
                                                            <a href="<?= Url('/admin/comment/accept/'.$comment->id); ?>" class="btn btn-warning  btn-sm"> تایید نشده</a>
                                                        @elseif($comment->published == 1)
                                                            <a href="<?= Url('/admin/comment/deny/'.$comment->id); ?>" class="btn btn-primary  btn-sm"> منتشر شده</a>
                                                        @endif
                                                        <a style="float: left"
                                                           class="btn btn-default  btn-sm">{!! to_jalali(date("Y-m-d H:i:s", strtotime(str_replace('-', '/',$comment->date)) )) !!}</a>

                                                    </div>
                                                    <div id="collapse{{$comment->id}}" class="panel-collapse collapse ">
                                                        <div class="panel-body">
                                                            {{$comment->comment}}
                                                            <br>
                                                            <a onclick="return confirm('آیا از حذف این نظر مطمئن هستید؟');" href="<?= Url('/admin/comment/destroy/'.$comment->id); ?>" class="btn btn-danger btn-line btn-sm">  حذف نظر</a>
                                                            <form method="post" action="{{route('comment.reply')}}">
                                                                <input type="hidden" name="post_id" value="{{$comment->id}}">
                                                                <input type="hidden" name="parent" value="{{$comment->parent}}">
                                                                <input type="hidden" name="object_group" value="{{$comment->object_group}}">
                                                                {{csrf_field()}}
                                                                <textarea name="comment" class="form-control"></textarea>
                                                                <button type="submit" class="btn btn-primary">ارسال</button>
                                                            </form>
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>نویسنده</th>
                                                                    <th>وضعیت</th>
                                                                    <th>تاریخ</th>
                                                                    <th>متن</th>
                                                                    <th>اعمال</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if($comment->adminreply->count() > 0)
                                                                    @foreach($comment->adminreply as $reply)
                                                                        <tr>
                                                                            <td>@if($reply->userid != 0){{$reply->user['name']}}@else{{ $reply->name }}@endif</td>
                                                                            <td>
                                                                                @if($comment->published == 0)
                                                                                    <a href="<?= Url('/admin/comment/accept/'.$reply->id); ?>" class="btn btn-warning  btn-sm"> تایید نشده</a>
                                                                                @elseif($comment->published == 1)
                                                                                    <a href="<?= Url('/admin/comment/deny/'.$reply->id); ?>" class="btn btn-primary  btn-sm"> منتشر شده</a>
                                                                                @endif
                                                                            </td>
                                                                            <td>{!! to_jalali(date("Y-m-d H:i:s", strtotime(str_replace('-', '/',$reply->date)) )) !!}</td>
                                                                            <td>{{$reply->comment}}</td>
                                                                            <td>
                                                                                <a onclick="return confirm('آیا از حذف این نظر مطمئن هستید؟');" href="<?= Url('/admin/comment/destroy/'.$comment->id); ?>" class="btn btn-danger btn-line btn-sm">  حذف نظر</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody></table>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {!! $comments->links() !!}
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