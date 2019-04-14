@extends('layouts.layout')
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <a href="<?= Url('/home/course/create/'); ?>" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن دوره </a>

                                    <h1>مدیریت دوره ها </h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp; نام دوره</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center">   اسلاید ها</th>
                                            <th style="text-align: center"> پادکست ها</th>
                                            <th style="text-align: center"> جزئیات</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr class="odd gradeX">

                                                <th style="text-align: center"> &nbsp; <a target="_blank" href="<?= Url('/home/course/show/'.$course->id); ?>">{{$course->title}} </a></th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($course->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/slide/manage/'.$course->id); ?>" class="btn btn-default red-bg"><i class="fa fa-image"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/podcast/manage/'.$course->id); ?>" class="btn btn-default blue-bg" ><i class="fa fa-music"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/course/edit/'.$course->id); ?>" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a onclick="return confirm('آیا از حذف این دسته تالار مطمئن هستید؟');" href="<?= Url('/home/course/delete/'.$course->id); ?>" class="btn btn-default"><i class="fa fa-remove"></i></a></th>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$courses->links()}}
                        <br><br>






                        @can('admin', \App\Contents\Post::class)
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h2>لیست تمامی دوره ها </h2>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp; نام دوره</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center">   اسلاید ها</th>
                                            <th style="text-align: center"> پادکست ها</th>
                                            <th style="text-align: center"> جزئیات</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses_ as $course_)
                                            <tr class="odd gradeX">

                                                <th style="text-align: center"> &nbsp; <a target="_blank" href="<?= Url('/home/course/show/'.$course_->id); ?>">{{$course_->title}} </a></th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($course_->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/slide/manage/'.$course_->id); ?>" class="btn btn-default red-bg"><i class="fa fa-image"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/podcast/manage/'.$course_->id); ?>" class="btn btn-default blue-bg" ><i class="fa fa-music"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a href="<?= Url('/home/course/edit/'.$course_->id); ?>" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100"><a onclick="return confirm('آیا از حذف این دسته تالار مطمئن هستید؟');" href="<?= Url('/home/course/delete/'.$course_->id); ?>" class="btn btn-default"><i class="fa fa-remove"></i></a></th>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$courses_->links()}}
                        @endcan

                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection