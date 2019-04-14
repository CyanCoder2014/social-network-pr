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
                                        مشتریان
                                        <a data-toggle="modal"
                                           data-target="#{{1}}" style="float: left"
                                           class="btn btn-primary  btn-sm"><i class="icon-plus"></i>&nbsp;&nbsp;افزودن مشتری </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            @foreach($teachers as $teacher)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$teacher->id}}">
                                                                @if($teacher->state == 1)
                                                                    <i style="color: #00aa00" class="icon-ok"></i>
                                                                    &nbsp;{{$teacher->name}}</a>
                                                            @else
                                                                <i class="icon-book"></i>
                                                                &nbsp;{{$teacher->title}}</a>
                                                            @endif
                                                        </h4>


                                                    </div>
                                                    <div id="collapse{{$teacher->id}}"
                                                         class="panel-collapse collapse ">
                                                        <div class="panel-body">


                                                                <form name="_token" method="POST"
                                                                      enctype="multipart/form-data"
                                                                      action="<?= Url('admin/manager/edit/' . $teacher->id); ?>">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }} ">
                                                                    <input type="hidden" name="email"
                                                                           value="{{ $teacher->email  }} ">



                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 ">
                                                                    <img src="{{'../../../teachers-img/'.$teacher->images}}"
                                                                         alt="" style="width: 100px ; height: 100px; border: solid 2px #0080FF">
                                                                    <input type="hidden" name="images"
                                                                           value="{{ $teacher->images}} ">


                                                                        <div><input type="file"
                                                                                                     name="images_u"
                                                                                                     value="images_u"
                                                                                                     accept="images/*"/>
                                                                        </div>

                                                                    </div>




                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                        <label> عنوان فارسی </label>
                                                                        <input class="form-control" name="title"
                                                                               value="{{$teacher->title}}">
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                        <label> عنوان انگلیسی </label>
                                                                        <input class="form-control" name="description"
                                                                               value="{{$teacher->description}}">
                                                                    </div>

<br><br><br><br>

                                                                    <a type="submit" onclick="return confirm('آیا از حذف مشخصات مدرس مطمئن هستید؟');"
                                                                       href="<?= Url('/admin/manager/destroy/' . $teacher->id); ?>"
                                                                       class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف </a>
                                                                    <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                       class="btn btn-primary  btn-sm">اعمال تغییرات</button>

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

    <!-- modal -->
    <div class="modal fade" id="{{1}}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">  افزدون </h4>
                </div>
                <div class="modal-body">

                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('admin/manager/add') ?>">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">

                        <div class="">

                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12">
                                <img src=""
                                     alt="" style="width: 100px ; height: 100px; border: solid 2px #0080FF">
                                <input type="hidden" name="images">


                                <div><input type="file"
                                            name="images"
                                            value="images"
                                            accept="images/*"/>
                                </div>
                            </div>

                                <div class="col-lg-6 col-md-6  col-sm-12 col-xs12">


                                <label>  عنوان فارسی  </label>
                                <input class="form-control" name="title">


                                <label>  عنوان انگلیسی </label>
                                <input class="form-control" name="description">
                            </div>


                        </div>
<br><br><br><br><br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">افزودن
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection