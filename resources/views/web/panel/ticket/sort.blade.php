@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>"/>

    <style>
        div {
            direction: rtl;

        }

        th {
            text-align: right;
        }


    </style>

    <section id="lts_sec " class="right" style="margin: 125px auto">

        <div class="container ">
            <div class="row ">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                    <div class="title_sec">
                        <h1>تیکت های اخیر</h1>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th >&nbsp; موضوع</th>
                                <th style="text-align: center">&nbsp; بخش</th>
                                <th style="text-align: center">&nbsp;اولویت</th>
                                <th style="text-align: center">&nbsp;وضعیت تیکت</th>
                                <th>تاریخ ارسال</th>
                                <th>تاریخ آخرین پاسخ</th>
                                <th style="text-align: center">مشاهده</th>
                                <th style="text-align: center">حذف</th>


                            </tr>
                            </thead>
                            <tbody>


                            @foreach($tickets as $ticket)
                                <tr class="odd gradeX">

                                    <th >&nbsp;  {{\Illuminate\Support\Str::words($ticket->title, $words = 6, $end = '...') }}</th>
                                    <th style="text-align: center">&nbsp;
                                        @if($ticket->section == 'fi')
                                            <a class="btn btn-default btn-line btn-sm " > بخش مالی </a>
                                        @elseif($ticket->section == 'gc')
                                            <a class="btn btn-default btn-line btn-sm"> روابط عمومی </a>
                                        @elseif($ticket->section == 'tr')
                                            <a class="btn btn-default btn-line btn-sm"> بخش ترجمه </a>
                                        @elseif($ticket->section == 'at')
                                            <a class="btn btn-default btn-line btn-sm"> بخش محتوا </a>
                                        @endif
                                    </th>
                                    <th style="text-align: center">
                                        @if($ticket->priority == 1)
                                            <a class="btn btn-default btn-line btn-sm"> کم </a>
                                        @elseif($ticket->priority == 2)
                                            <a class="btn btn-default btn-line btn-sm"> متوسط </a>
                                        @elseif($ticket->priority == 3)
                                            <a class="btn btn-default btn-line btn-sm"> زیاد </a>
                                        @endif
                                    </th >
                                    <th style="text-align: center">
                                        @if($ticket->state == 0)
                                            <a class="btn btn-success btn-line btn-sm"> مشاهده نشده</a>
                                        @elseif($ticket->state == 2)
                                            <a class="btn btn-primary btn-line btn-sm"> پاسخ داده شده</a>
                                        @elseif($ticket->state == 3)
                                            <a class="btn btn-warning btn-line btn-sm"> بررسی مجدد</a>
                                        @elseif($ticket->state == 4)
                                            <a class="btn btn-default btn-line btn-sm"> بسته شده</a>
                                        @endif
                                    </th>
                                    <th>{!!  Jdate::to_jalali($ticket->datetime) !!}</th>
                                    <th>{!!  Jdate::to_jalali($ticket->last_loin) !!}</th>
                                    <th style="text-align: center"><a class="btn btn-warning btn-line btn-sm" href="<?= Url('/ticket/ticket/'.$ticket->id ); ?>"><i class="fa fa-ticket"></i> </a> </th>
                                    <th style="text-align: center" onclick=""> <a onclick="return confirm('آیا از حذف این تیکت مطمئن هستید؟');" href="<?= Url('/ticket/destroy/'.$ticket->id ); ?>" ><i class="fa fa-remove"></i> </a></th>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <a class="btn btn-danger btn-line " href="<?= Url('/ticket/create' ); ?>"><i class="fa fa-ticket"></i> &nbsp;&nbsp; تیکت جدید</a>

            <br><br>
        </div>


    </section>

    <!--PAGE CONTENT -->


    <script src="<?= Url('assets/admin/plugins/jquery-2.0.3.min.js'); ?>"></script>
    <script src="<?= Url('assets/admin/plugins/bootstrap/js/bootstrap.rtl.js'); ?>"></script>
    <script src="<?= Url('assets/admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>


@endsection