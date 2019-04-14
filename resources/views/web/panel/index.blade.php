@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/bootstrap/css/bootstrap.rtl.css'); ?>" />

    <style>
        div {
            direction: rtl;

        }


    </style>

    <section id="lts_sec " class="right" style="margin: 125px auto">

        <div class="container ">
            <div class="row ">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                    <div class="title_sec">
                        <h1>ارسال تیکت</h1>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                        <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                            <label>سایر موارد</label>
                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-info">تیکت های قبل</button>
                                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span
                                                class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">مشاهده نشده</a></li>
                                        <li><a href="#"> پاسخ داده شده</a></li>
                                        <li><a href="#"> بسته شده</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">همه تیکت ها</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                            <label>وضعیت</label>
                            <div><a class="btn btn-success btn-line"> بسته نشده</a></div>

                        </div>

                        <div class="form-group form-group col-lg-1 col-md-1 col-sm-12 col-xs12">
                            <label>تاریخ</label>
                            <div><a class="btn btn-default btn-line"> 22 دی ماه</a></div>
                        </div>

                        <div class="form-group form-group col-lg-1 col-md-1 col-sm-12 col-xs12">
                            <label>اولویت</label>
                            <div><a class="btn btn-default btn-line"> زیاد </a></div>

                        </div>
                        <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                            <label>بخش</label>
                            <div><a class="btn btn-default btn-line">روابط عمومی </a></div>

                        </div>
                        <div class="form-group form-group col-lg-4 col-md-4 col-sm-12 col-xs12">
                            <label>عنوان تیکت</label>
                            <div><a class="btn btn-default btn-line"> عنوان نمونه </a></div>
                        </div>
                        <br><br><br><br>

                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-user"></i>&nbsp;&nbsp; کاربر نمونه </div>
                            <div class="panel-body">متن نمونه </div>

                        </div>
                        <div class="panel panel-warning">
                            <div class="panel-heading"><i class="fa fa-archive"></i>&nbsp;&nbsp;پاسخ پرسنل  </div>
                            <div class="panel-body">متن نمونه </div>
                        </div>







                        <form name="_token" method="POST" enctype="multipart/form-data"
                              action="<?= Url('ticket/store'); ?>">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">


                            <div class="form-group">

                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a  class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">    پاسخ مجدد</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                <textarea class="form-control" rows="4" name="introtext"></textarea>
                                                <br>
                                                <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-warning">ارسال </button>

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


    </section>

    <!--PAGE CONTENT -->

    <script src="<?= Url('assets/admin/plugins/jquery-2.0.3.min.js'); ?>"></script>
    <script src="<?= Url('assets/admin/plugins/bootstrap/js/bootstrap.rtl.js'); ?>"></script>
    <script src="<?= Url('assets/admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>


@endsection