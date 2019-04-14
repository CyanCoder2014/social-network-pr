@extends('layouts.layout')

@section('content')



    <ul class="breadcrumbs" style="padding-top: 8px;padding-bottom: 6px">
        <li><a href="javascript:void(0)" title="">عنوان دسته بندی </a></li>

                <li style="float: left"><a  class="bnt btn-sm btn-default  hover-shadow" href="<?= Url('/home/course/create/'); ?>" title=""><i class="fa fa-plus"></i>    افزودن دوره جدید  </a></li>

    </ul>


    <div class="main-content-area">
        <div class="row" style="min-height: 550px"><br><br>
            <div class="col-md-12">
                <div class="blog-sec">
                    <div class="row" id="dylay" >


                        @foreach($courses as $course)
                        <div class="col-md-3" style="float: right">
                            <div class="blog-post">
                                <div style="max-height: 180px; overflow: hidden" class="blog-post-thumb">
                                    <img src="<?= Url('/course-img/'.$course->image); ?>" alt="" />
                                    <a href="<?= Url('/home/course/show/'.$course->id); ?>" title=""><i class="fa fa-book"></i></a>
                                </div>
                                <div class="blog-post-info">
                                    <h3><a href="<?= Url('/home/course/show/'.$course->id); ?>" title="{{$course->title}}">  {!! \Illuminate\Support\Str::words($course->title , $words = 6, $end = '...') !!}  </a></h3>
                                    <a href="<?= Url('/home/course/show/'.$course->id); ?>" class="date-post"><i class="fa fa-calendar-o"></i> {!! until_time($course->created_at) !!} </a>
                                    <span class="margin-12" id="popoverthree" rel="popover" data-placement="top"
                                          data-original-title="{{$course->user->name.' '.$course->user->family}}" data-trigger="hover"
                                          data-content="
                                         @if($course->user->profile !== null)
                                          {{$course->user->profile->education}}
                                          @endif
                                                  ">

                                            @if($course->user->profile == null)
                                            <img style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px" src="<?= Url('/images/3-sm.jpg'); ?>" alt="" />
                                        @else
                                            <img style="height: 30px;width: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"  src="<?= Url('/user-img/'.$course->user->profile->image_b); ?>" alt="" />
                                        @endif
                                        {{$course->user->username}}

                            </span>

                                </div>
                            </div><!-- Blog Post -->
                        </div>
                        @endforeach



                        </div>
                        <div class="col-md-12">
                            <div class="pagination">
                               {{$courses->links()}}
                            </div><!-- Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection