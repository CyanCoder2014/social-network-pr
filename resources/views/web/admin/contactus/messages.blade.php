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
                                        پیام ها
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            @foreach($messages as $messages)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$messages->id}}">
                                                                @if($messages->state == 1)
                                                                    <i style="color: #00aa00" class="icon-ok"></i>&nbsp;{{$messages->name}}</a>
                                                                @else
                                                                <i class="icon-comment"></i>&nbsp;{{$messages->name}}</a>
                                                            @endif
                                                        </h4>
                                                        <a onclick="return confirm('آیا از حذف این پیام مطمئن هستید؟');" href="<?= route('contactus.delete',['url'=>$messages->id]); ?>" class="btn btn-danger btn-line btn-sm">  حذف پیام</a>


                                                        <a style="float: left"
                                                           class="btn btn-default  btn-sm">{!! date($messages->datetime) !!}</a>
                                                        <span style="float: left"
                                                              class=""> &nbsp; &nbsp; {!! $messages->email !!} &nbsp;<i class="icon-mail"></i>  &nbsp;</span>

                                                    </div>
                                                    <div id="collapse{{$messages->id}}" class="panel-collapse collapse ">
                                                        <div class="panel-body">
                                                            {{$messages->message}}

                                                            <br>
                                                            @if($messages->state == 1)
                                                                <hr>
                                                                پاسخ:
                                                                {{$messages->reply}}
                                                                <br>
                                                            @else
                                                            <br>
                                                                <form name="_token" method="POST" enctype="multipart/form-data"
                                                                      action="<?= route('contactus.reply',['url' =>$messages->id ]); ?>">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                                                    <input type="hidden" name="email" value="{{ $messages->email  }} ">


                                                                    <div class="panel-body">
                                                <textarea class="form-control" rows="4" name="reply_message"
                                                          placeholder="متن پاسخ ... "></textarea>
                                                                <br>
                                                                <button type="submit" name="_token"
                                                                        value="{{ csrf_token() }}"
                                                                        class="btn btn-warning">ارسال
                                                                </button>

                                                            </div>

                                                                </form>
                                                            @endif
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