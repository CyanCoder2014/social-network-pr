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

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover"
                                                       id="dataTables-example">
                                                    <thead>
                                                    <tr>

                                                        <th>&nbsp; نام کاربر</th>
                                                        <th style="text-align: center">&nbsp;  انتخاب</th>
                                                        <th style="text-align: center">&nbsp; نحوه ثبت نام</th>
                                                        <th style="text-align: center">&nbsp;ایمیل</th>
                                                        <th style="text-align: center">تاریخ ثبت</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($notifacations as $notif)
                                                        <tr class="odd gradeX">
                                                            <th>
                                                                &nbsp; {{\Illuminate\Support\Str::words($users->name, $words = 6, $end = '...') }}</th>
                                                            <th>
                                                                <input title="email" type="checkbox" class="form-control" name="id[]" value="{{$users->id}}" style="height: 20px">
                                                            </th>
                                                            <th style="text-align: center">&nbsp;
                                                                @if($users->usertype == 'Admin')
                                                                    <a class="btn btn-success btn-line btn-sm "> مدیریت </a>
                                                                @elseif($users->usertype == 'Author')
                                                                    <a class="btn btn-primary btn-line btn-sm">بخش محتوا </a>
                                                                @elseif($users->usertype == 'Finance')
                                                                    <a class="btn btn-primary btn-line btn-sm"> بخش مالی </a>
                                                                @elseif($users->usertype == 'General')
                                                                    <a class="btn btn-primary btn-line btn-sm"> روابط عمومی</a>
                                                                @elseif($users->usertype == 'Translate')
                                                                    <a class="btn btn-primary btn-line btn-sm"> بخش ترجمه </a>
                                                                @elseif($users->usertype == 'Registered')
                                                                    <a class="btn btn-default btn-line btn-sm"> ثبت نام شده </a>
                                                                @endif
                                                            </th>
                                                            <th style="text-align: center">
                                                                &nbsp; {{$users->email}}

                                                            </th>

                                                            <th> {!!  Jdate::to_jalali($users->created_at) !!}</th>

                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php var_dump($notifications); ?>


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