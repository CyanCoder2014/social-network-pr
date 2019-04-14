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
                                         خدمات
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">









                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text8->id}}">
                                                            @if($text8->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text8->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text8->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text8->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text8->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text8->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text8->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text8->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text8->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text8->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text8->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text9->id}}">
                                                            @if($text9->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text9->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text9->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text9->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text9->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text9->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text9->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text9->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text9->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text9->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text9->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text10->id}}">
                                                            @if($text10->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text10->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text10->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text10->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text10->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text10->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text10->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text10->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text10->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text10->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text10->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text11->id}}">
                                                            @if($text11->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text11->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text11->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text11->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text11->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text11->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text11->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text11->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text11->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text11->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text11->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text12->id}}">
                                                            @if($text12->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text12->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text12->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text12->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text12->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text12->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text12->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text12->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text12->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text12->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text12->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>




                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text21->id}}">
                                                            @if($text21->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text21->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text21->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text21->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/service/edit/' . $text21->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text21->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text21->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text21->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text21->title}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک فارسی</label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text21->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label> لینک انگلیسی </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text21->link}}">
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>










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


@endsection