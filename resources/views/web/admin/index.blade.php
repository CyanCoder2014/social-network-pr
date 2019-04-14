@extends('web.layouts.admin',['count_user' =>$count_user,'count_comment' =>$count_comment, 'count_message' =>$count_message ,'count_ticket' =>$count_ticket])

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> پنل مدیریت </h1>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <hr/>
            <!--BLOCK SECTION -->
            <div class="row">

                <div class="">
                    <div class="row">

                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service" >
                                <i class="icon-edit"></i>
                                <h2>ثبت مطلب جدید </h2>
                                <a href="<?= Url('admin/content/create'); ?>">
                                    <div class="service_hoverly">
                                        <i class="icon-edit"></i>
                                        <h2>ثبت مطلب جدید</h2>
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service">
                                <i class="icon-file-text-alt"></i>
                                <h2>مدیریت مطالب</h2>
                                <a href="<?= Url('admin/content'); ?>">
                                <div class="service_hoverly">
                                    <i class="icon-file-text-alt"></i>
                                    <h2>مدیریت مطالب</h2>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service">
                                <i class="icon-comment"></i>
                                <h2>مدیریت نظرات  </h2>
                                <a href="<?= Url('admin/comment'); ?>">
                                <div class="service_hoverly">
                                    <i class="icon-comment"></i>
                                    <h2>مدیریت  نظرات </h2>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service">
                                <i class="fa fa-users"></i>
                                <h2> مدیریت کاربران</h2>
                                <a href="#">
                                <div class="service_hoverly">
                                    <i class="fa fa-users"></i>
                                    <h2>مدیریت کاربران</h2>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service">
                                <i class="icon-book"></i>
                                <h2>راهنمای پنل</h2>
                                <a href="#">
                                <div class="service_hoverly">
                                    <i class="icon-book"></i>
                                    <h2>راهنمای پنل</h2>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                            <div class="service">
                                <i class="fa fa-ticket"></i>
                                <h2> پیام ها</h2>
                                <a href="#">
                                <div class="service_hoverly">
                                    <i class="fa fa-ticket"></i>
                                    <h2>   پروژه ها</h2>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--END BLOCK SECTION -->
            <hr/>


            <!--TABLE, PANEL, ACCORDION AND MODAL  -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading ">
                           پیام های اخیر (تماس با ما)
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                                @foreach($messages as $message)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$message->id}}">
                                                <i class="icon-comment"></i>&nbsp;{{$message->name}}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$message->id}}" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                         {{$message->message}}
                                        </div>
                                    </div>
                                </div>
@endforeach





                            </div>
                        </div>
                    </div>


                    <!--
                    <div class="box">
                        <header>
                            <h5 style="color: #e0e0e0">تیکت‌ های اخیر</h5>
                            <div class="toolbar">
                                <div class="btn-group">
                                    <a href="#sortableTable" data-toggle="collapse"
                                       class="btn btn-default btn-sm accordion-toggle minimize-box">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                        </header>
                        <div id="sortableTable" class="body collapse">
                            <table class="table table-bordered sortableTable responsive-table">
                                <thead>
                                <tr>
                                    <th>بخش<i class="icon-sort"></i><i class="icon-sort-down"></i> <i
                                                class="icon-sort-up"></i></th>
                                    <th>وضعیت <i class="icon-sort"></i><i class="icon-sort-down"></i> <i
                                                class="icon-sort-up"></i></th>
                                    <th>موضوع<i class="icon-sort"></i><i class="icon-sort-down"></i> <i
                                                class="icon-sort-up"></i></th>
                                    <th>اولویت<i class="icon-sort"></i><i class="icon-sort-down"></i> <i
                                                class="icon-sort-up"></i></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tickets as $ticket)
                                <tr>
                                    <td>
                                        @if($ticket->section == 'fi')
                                            <a class="btn btn-default btn-line btn-sm "> بخش مالی </a>
                                        @elseif($ticket->section == 'gc')
                                            <a class="btn btn-default btn-line btn-sm"> روابط عمومی </a>
                                        @elseif($ticket->section == 'tr')
                                            <a class="btn btn-default btn-line btn-sm"> بخش ترجمه </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($ticket->state == 0)
                                            <a class="btn btn-success  btn-sm"> مشاهده نشده</a>
                                        @elseif($ticket->state == 2)
                                            <a class="btn btn-primary  btn-sm"> پاسخ داده شده</a>
                                        @elseif($ticket->state == 3)
                                            <a class="btn btn-warning  btn-sm"> بررسی مجدد</a>
                                        @elseif($ticket->state == 4)
                                            <a class="btn btn-default  btn-sm"> بسته شده</a>
                                        @endif
                                    </td>
                                    <td>{{\Illuminate\Support\Str::words($ticket->title, $words = 6, $end = '...') }}</td>
                                    <td>
                                        @if($ticket->priority == 1)
                                            <a class="btn btn-default btn-line btn-sm"> کم </a>
                                        @elseif($ticket->priority == 2)
                                            <a class="btn btn-default btn-line btn-sm"> متوسط </a>
                                        @elseif($ticket->priority == 3)
                                            <a class="btn btn-default btn-line btn-sm"> زیاد </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
-->

                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                              مطالب ثبت شده اخیر
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ویرایش</th>
                                        <th>عنوان</th>
                                        <th>دسته بندی </th>
                                        <th>تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contents as $contents)
                                        <?php
                                        if($contents->catid == 48){
                                            $contents->catid = 42;
                                        }
                                        if($contents->catid == 31){
                                            $contents->catid = 24;
                                        }
                                        if($contents->catid == 10){
                                            $contents->catid = 42;
                                        }
                                        if($contents->catid == 46){
                                            $contents->catid = 42;
                                        }
                                        if($contents->catid == 25){
                                            $contents->catid = 42;
                                        }
                                        if($contents->catid == 45){
                                            $contents->catid = 42;
                                        }
                                        if($contents->catid == 36){
                                            $contents->catid = 42;
                                        }
                                        ?>
                                    <tr class="info">
                                        <td style="text-align: center"><a href="<?= Url('/admin/content/edit/'.$contents->id ); ?>"><i class="icon-edit-sign"></i></a></td>
                                        <td>{{\Illuminate\Support\Str::words($contents->title, $words = 3, $end = '...') }} </td>
                                        <td>{{ \Illuminate\Support\Str::words($categories->keyBy('id')[$contents->catid]->title, $words = 3, $end = '...')}}</td>
                                        <td>{!!\Illuminate\Support\Str::words( until_time($contents->alias), $words = 1, $end = '    ')   !!}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer" style="margin-top: -30px"><a href="<?= Url('admin/content' ); ?>"> مطالب منتشر شده اخیر</a>

                        </div>
                    </div>

                </div>

            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->


        </div>

    </div>
    <!--END PAGE CONTENT -->

    <!-- RIGHT STRIP  SECTION -->




    <!--END MAIN WRAPPER -->


@endsection