@extends('layouts.admin')

@section('admin_content')


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
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h1>ارسال تیکت</h1>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">

                                    <form name="_token" method="POST" enctype="multipart/form-data"
                                          action="<?= Url('admin/ticket/store'); ?>">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                                        <div class="form-group form-group col-lg-4 col-md-4 col-sm-12 col-xs12">
                                            <label>موضوع تیکت</label>
                                            <input class="form-control" name="title">
                                        </div>

                                        <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                            <label>وضعیت</label>
                                            <div><a class="btn btn-success btn-line"> مشاهده نشده</a></div>

                                        </div>

                                        <div class="form-group form-group col-lg-2 col-md-2 col-sm-12 col-xs12">
                                            <label>تاریخ</label>
                                            <div><a class="btn btn-default btn-line"> {!!  Jdate::to_jalali(date('m-d-Y H:i:s', time())) !!}</a></div>
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
                                                <option value="fi"> بخش مالی</option>
                                                <option value="tr"> بخش ترجمه</option>
                                                <option value="at"> بخش محتوا</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>متن درخواست</label>
                                            <textarea class="form-control" rows="7" name="message"></textarea>
                                        </div>
                                        <button type="submit" name="_token" value="{{ csrf_token() }}"
                                                class="btn btn-primary">ارسال
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <br><br>


                    </div>


                </section>
            </div>
        </div>
    </div>


    <!--PAGE CONTENT -->




@endsection