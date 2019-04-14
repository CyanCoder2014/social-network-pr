@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>"/>

    <style>
        div {
            direction: rtl;

        }


    </style>
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 125px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-12 ">
                                <div class="title_sec">
                                    <h1> جزئیات تیکت</h1>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                                    <div class="form-group form-group col-lg-4 col-md-4 col-sm-12 col-xs12">
                                        <label>موضوع تیکت</label>
                                        <div><a class="btn btn-default btn-line"> {{$record->title}} </a></div>
                                    </div>
                                    <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                        <label>وضعیت</label>
                                        <div>
                                            @if($record->state == 0)
                                                <a class="btn btn-success "> مشاهده نشده</a>
                                            @elseif($record->state == 2)
                                                <a class="btn btn-primary "> پاسخ داده شده</a>
                                            @elseif($record->state == 3)
                                                <a class="btn btn-warning "> بررسی مجدد</a>
                                            @elseif($record->state == 4)
                                                <a class="btn btn-default "> بسته شده</a>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                        <label>تاریخ</label>
                                        <div><a class="btn btn-default btn-line">{!!  to_jalali($record->datetime) !!}</a></div>
                                    </div>

                                    <div class="form-group form-group col-lg-1 col-md-1 col-sm-12 col-xs12">
                                        <label>اولویت</label>
                                        <div>
                                            @if($record->priority == 1)
                                                <a class="btn btn-default btn-line"> کم </a>
                                            @elseif($record->priority == 2)
                                                <a class="btn btn-default btn-line"> متوسط </a>
                                            @elseif($record->priority == 3)
                                                <a class="btn btn-default btn-line"> زیاد </a>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                        <label>بخش</label>
                                        <div>
                                            @if($record->section == 'fi')
                                                <a class="btn btn-default btn-line"> بخش مالی </a>
                                            @elseif($record->section == 'gc')
                                                <a class="btn btn-default btn-line"> روابط عمومی </a>
                                            @elseif($record->section == 'tr')
                                                <a class="btn btn-default btn-line"> بخش ترجمه </a>
                                            @endif
                                        </div>

                                    </div>

                                    <br><br><br><br>

                                    <div class="panel panel-default">
                                        <div class="panel-heading"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ \Illuminate\Support\Str::words($user->name, $words = 2, $end = '...')}} </div>
                                        <div class="panel-body">{{$record->message}}</div>

                                    </div>

                                    @foreach($reply as $reply)

                                        @if($user_reply->keyBy('id')[$reply->user_id]->id == $user->id)
                                            <div class="panel panel-default">
                                                @else
                                                    <div class="panel panel-warning">
                                                        @endif
                                                        <div class="panel-heading"><i class="fa fa-archive"></i>&nbsp;&nbsp;{{ \Illuminate\Support\Str::words($user_reply->keyBy('id')[$reply->user_id]->name, $words = 2, $end = '...')}}
                                                        </div>
                                                        <div class="panel-body"> {{$reply->reply_message}}</div>
                                                    </div>
                                                    @endforeach


                                    <form name="_token" method="POST" enctype="multipart/form-data"
                                          action="<?= Url('admin/ticket/reply/'.$record->id ); ?>">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                                        <input type="hidden" name="message_id" value="{{ $record->id }} ">


                                        <div class="form-group">

                                            <div class="panel-group" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="btn btn-default" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseOne"> پاسخ
                                                                مجدد</a>
                                                            <a  href="<?= Url('admin/ticket/close/'.$record->id ); ?>" class="btn btn-warning" style="color: white">بستن تیکت
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse ">
                                                        <div class="panel-body">
                                                <textarea class="form-control" rows="4" name="reply_message"
                                                          placeholder="متن پاسخ ... "></textarea>
                                                            <br>
                                                            <button type="submit" name="_token"
                                                                    value="{{ csrf_token() }}"
                                                                    class="btn btn-warning">ارسال
                                                            </button>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <br><br>


                    </div>
                    </div>

                </section>

            </div>


    </div>


    <!--PAGE CONTENT -->


@endsection