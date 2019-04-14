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
                                        مدرسین
                                        <a style="float: left"
                                           class="btn btn-primary  btn-sm"><i class="icon-plus"></i>&nbsp;&nbsp;افزودن مدرس </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            @foreach($teachers as $teachers)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$teachers->id}}">
                                                                @if($teachers->state == 1)
                                                                    <i style="color: #00aa00" class="icon-ok"></i>
                                                                    &nbsp;{{$teachers->name}}</a>
                                                            @else
                                                                <i class="icon-book"></i>
                                                                &nbsp;{{$teachers->name}}</a>
                                                            @endif
                                                        </h4>


                                                    </div>
                                                    <div id="collapse{{$teachers->id}}"
                                                         class="panel-collapse collapse ">
                                                        <div class="panel-body">


                                                                <form name="_token" method="POST"
                                                                      enctype="multipart/form-data"
                                                                      action="<?= Url('admin/message/reply/' . $teachers->id); ?>">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }} ">
                                                                    <input type="hidden" name="email"
                                                                           value="{{ $teachers->email  }} ">



                                                                    <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                    <img src="{{'../../../images/'.$teachers->images}}"
                                                                         alt="" style="width: 100px ; height: 100px; border: solid 2px #0080FF">
                                                                    <input type="hidden" name="images"
                                                                           value="{{ $teachers->images}} ">


                                                                        <div><input type="file"
                                                                                                     name="images_u"
                                                                                                     value="images_u"
                                                                                                     accept="images/*"/>
                                                                        </div>

                                                                    </div>



                                                                    <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                        <label> نام مدرس</label>
                                                                        <input class="form-control" name="name"
                                                                               value="{{$teachers->name}}">
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                        <label> عنوان مدرس </label>
                                                                        <input class="form-control" name="name"
                                                                               value="{{$teachers->name}}">
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5  col-sm-12 col-xs12 form-group">
                                                                        <label> توضیحات </label>
                                                                        <input class="form-control" name="name"
                                                                               value="{{$teachers->name}}">
                                                                    </div>

<br><br><br><br>

                                                                    <a onclick="return confirm('آیا از حذف این پیام مطمئن هستید؟');"
                                                                       href="<?= Url('/admin/message/destroy/' . $teachers->id); ?>"
                                                                       class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف مدرس</a>
                                                                    <a style="float: left"
                                                                       class="btn btn-primary  btn-sm">اعمال تغییرات</a>

                                                                </form>

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