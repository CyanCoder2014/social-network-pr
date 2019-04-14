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
                                         فوتر
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">









                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text->id}}">
                                                            @if($text->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; تماس با ما</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;  تماس با ما</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  تلفن فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  تلفن انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text->title}}">
                                                            </div>

                                                            <div class=" form-group">
                                                                <label> آدرس فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> آدرس انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text->description}}</textarea>
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
                                                           href="#collapse{{$text2->id}}">
                                                            @if($text2->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text2->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text2->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text2->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text2->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text2->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text2->title}}">
                                                            </div>

                                                            <div class=" form-group">
                                                                <label> توضیحات فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text2->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text2->description}}</textarea>
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
                                                           href="#collapse{{$text3->id}}">
                                                            @if($text3->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text3->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text3->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text3->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text3->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text3->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text3->title}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text3->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text3->description}}</textarea>
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
                                                           href="#collapse{{$text4->id}}">
                                                            @if($text4->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;شبکه اجتماعی</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;شبکه اجتماعی</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text4->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text4->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class=" form-group">
                                                                <label>  لینک  اینستاگرام </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text4->description}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label>  لینک  تلگرام </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text4->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label>  لینک  گوگل پلاس </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text4->link_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label>  لینک  فیسبوک </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text4->link}}</textarea>
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