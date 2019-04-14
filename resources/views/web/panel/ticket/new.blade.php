@extends('layouts.layout')

@section('content')


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

                        <form name="_token" method="POST" enctype="multipart/form-data"
                              action="<?= Url('ticket/store') ?>">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                            <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                <label>سایر موارد</label>
                                <div>
                                    <div class="btn-group">
                                        <button href="<?= Url('/ticket' ); ?>" class="btn btn-info">تیکت های قبل</button>
                                        <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span
                                                    class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= Url('/ticket' ); ?>">مشاهده نشده</a></li>
                                            <li><a href="<?= Url('/ticket' ); ?>"> پاسخ داده شده</a></li>
                                            <li><a href="<?= Url('/ticket' ); ?>"> بسته شده</a></li>
                                            <li class="divider"></li>
                                            <li><a href="<?= Url('/ticket' ); ?>">همه تیکت ها</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group col-lg-1 col-md-1 col-sm-12 col-xs12">
                                <label>وضعیت</label>
                                <div><a class="btn btn-success btn-line"> بسته نشده</a></div>

                            </div>

                            <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                <label>تاریخ</label>
                                <div><a class="btn btn-default btn-line">   {!!  Jdate::to_jalali(date('m-d-Y H:i:s', time())) !!}</a></div>
                            </div>

                            <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                <label>اولویت</label>
                                <select class="form-control" name="priority">
                                    <option value="1">کم</option>
                                    <option value="2">متوسط</option>
                                    <option value="3">زیاد</option>

                                </select>
                            </div>
                            <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                <label>بخش</label>
                                <select class="form-control" name="section">
                                    <option value="gc"> روابط عمومی</option>
                                    <option value="fi">   بخش مالی</option>
                                    <option value="tr">  بخش ترجمه</option>
                                    <option value="at">  بخش محتوا</option>

                                </select>
                            </div>
                            <div class="form-group form-group col-lg-3 col-md-3 col-sm-12 col-xs12">
                                <label>موضوع تیکت</label>
                                <input class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>متن درخواست</label>
                                <textarea class="form-control" rows="7" name="message"></textarea>
                            </div>
                            <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">ارسال </button>
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