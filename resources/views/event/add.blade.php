@extends('layouts.layout')
@section('content')




    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <a data-toggle="modal" data-target="#add-event" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> رویداد جدید    </a>

                                <div class="title_sec">
                                    <h1> مدیریت رویدادها</h1>
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
                                            <th style="text-align: center">&nbsp; عنوان</th>
                                            <th style="text-align: center">&nbsp; دسته بندی</th>
                                            <th style="text-align: center">&nbsp;  تاریخ و زمان شروع</th>
                                            <th style="text-align: center">تاریخ و زمان پایان</th>
                                            <th style="text-align: center">  مکان</th>
                                            <th style="text-align: center">ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $event)
                                            <tr class="odd gradeX">
                                                <th style="font-weight: 100;text-align: center">
                                                    &nbsp; <a target="_blank" href="#">{{\Illuminate\Support\Str::words($event->title, $words = 4, $end = '...') }}</a></th>
                                                <th style="text-align: center">&nbsp;


                                                    @if($event->cat !== null)
                                                    {{\Illuminate\Support\Str::words($event->cat->title, $words = 4, $end = '...') }}
                                                        @endif




                                                </th>
                                                <th style="font-weight: 100; text-align: center">&nbsp; {{\Illuminate\Support\Str::words($event->start, $words = 5, $end = '...') }} </th>
                                                <th style="text-align: center; font-weight: 100">{{\Illuminate\Support\Str::words($event->finish, $words = 5, $end = '...') }}</th>
                                                <th style="font-weight: 100;text-align: center">{{\Illuminate\Support\Str::words($event->place, $words = 3, $end = '...') }}</th>


                                                <th style="text-align: center">
                                                    <a data-toggle="modal" data-target="#{{$event->id}}"
                                                       class="btn btn-warning btn-line btn-sm"
                                                       href="#"><i
                                                                class="fa fa-edit"></i> </a>
                                                </th>

                                                <th style="text-align: center">
                                                    <a class="btn btn-danger btn-line btn-sm" onclick="return confirm('آیا از حذف این رویداد مطمئن هستید؟');"
                                                       href="<?= Url('home/event/delete/'.$event->id); ?>"><i
                                                                class="fa fa-remove"></i> </a>
                                                </th>

                                            </tr>

                                            <div class="modal fade" id="{{$event->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel"> ویرایش رویداد</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="_token" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="<?= Url('home/event/edit/'.$event->id); ?>">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">
                                                                <div class="row">
                                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label>  عنوان رویداد</label>
                                                                            <input required class="form-control" name="title"
                                                                                   value="{{$event->title}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>   دسته بندی</label>
                                                                            <select class="form-control" name="cat_id" >
                                                                                @foreach($eventCats as $eventCat)
                                                                                    <option value="{{$eventCat->id}}"
                                                                                            @if($event->cat !== null)
                                                                                            @if($eventCat->id == $event->cat->id)
                                                                                    selected
                                                                                            @endif
                                                                                            @endif
                                                                                    >{{$eventCat->title}}
                                                                                    </option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>  مکان رویداد</label>
                                                                            <input required class="form-control" name="place"
                                                                                   value="{{$event->place}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> تاریخ و زمان شروع</label>
                                                                            <input required  class="form-control" name="start"
                                                                                   value="{{$event->start}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> تاریخ و زمان پایان</label>
                                                                            <input required class="form-control" name="finish"
                                                                                   value="{{$event->finish}}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label> توضیحات </label>
                                                                            <textarea required name="description" title="description" class="form-control">{!!$event->description!!}</textarea>
                                                                        </div>

                                                                        <div>
                                                                            @if($event->image !== null)
                                                                                <img src="{{'../../../event-img/'.$event->image}}"
                                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                                <input type="hidden" name="image"
                                                                                       value="{{$event->image}}"><br><br>
                                                                            @else
                                                                                <input type="hidden" name="image"
                                                                                       value="null">
                                                                            @endif


                                                                            <div><input type="file"
                                                                                        name="image_u"
                                                                                        value="image_u"
                                                                                        accept="images/*"/>
                                                                            </div>

                                                                        </div>




                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="_token"
                                                                            value="{{ csrf_token() }}"
                                                                            class="btn btn-primary">ذخیره تغییرات
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




                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a data-toggle="modal" data-target="#add-event" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> رویداد جدید    </a>

                            </div>
                        </div>
                        {{$events->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>




    <div class="modal fade" id="add-event" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">   رویداد جدید </h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/event/add'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان رویداد</label>
                                    <input required class="form-control" name="title"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label>   دسته بندی</label>

                                    <select class="form-control" name="cat_id" >
                                        @foreach($eventCats as $eventCat)
                                            <option value="{{$eventCat->id}}" @if(2 == 3)
                                            selected
                                                    @endif
                                            >{{$eventCat->title}}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>  مکان رویداد</label>
                                    <input required class="form-control" name="place"
                                            value="">
                                </div>
                                <div class="form-group">
                                    <label> تاریخ و زمان شروع</label>
                                    <input required  class="form-control" name="start"
                                            value="">

                                </div>
                                <div class="form-group">
                                    <label> تاریخ و زمان پایان</label>
                                    <input required class="form-control" name="finish"
                                            value="">
                                </div>

                                <div class="form-group">
                                    <label> توضیحات </label>
                                    <textarea required name="description" title="description" class="form-control"></textarea>
                                </div>

                                <label>   تصویر</label>
                                <input required type="file" name="image" value="image"
                                       style=" margin-top: 5px; "
                                       accept="images/*" id="ImageBrowse" size="30"/>



                            </div>
                        </div><br><br>
                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
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

    <input type="text" name="start_date" class="form-control datepicker jalali-datepicker" />



@endsection