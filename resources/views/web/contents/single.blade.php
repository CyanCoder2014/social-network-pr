@extends('web.layouts.layout')


@section('content')



    <section class="innerpage-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="yekan" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.4)">
                        @if(App::getLocale() == 'en')
                            {{$content->title}}
                        @elseif(App::getLocale() == 'fa')
                            {{$content->title_fa}}
                        @endif
                    </h2>
                    <p class="tagline"></p>
                </div>
            </div>
        </div>
    </section>



    <section id="area-main" class="padding-one dr">
        <h5 class="hidden">hidden</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="blog-item"><img src="{{ $content->images  }}" class="img-responsive" alt="Blog From Author">
                        <div class="blog-content">
                            <h3>
                                @if(App::getLocale() == 'en')
                                    {{$content->title}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$content->title_fa}}
                                @endif
                            </h3>
                            <ul class="blog-author">
                                <!--<li><a href="#."><i class="fa fa-user"></i>By Victor</a></li>
                                -->
                                <li><a href="#.">
                                        @if(App::getLocale() == 'en')
                                            {{ $content->category->title }}
                                        @elseif(App::getLocale() == 'fa')
                                            {{ $content->category->title_fa }}
                                        @endif
                                    </a></li>
                                <li><a href="#."><i class="fa fa-clock-o"></i>April 3, 2017</a></li>
                            </ul>

                           <blockquote>
                               @if(App::getLocale() == 'en')
                                   {{$content->introtext}}
                               @elseif(App::getLocale() == 'fa')
                                   {{$content->introtext_fa}}
                               @endif

                           </blockquote>
                            <br>
                            @if(App::getLocale() == 'en')
                                {!!$content->fulltext_fa!!}
                            @elseif(App::getLocale() == 'fa')
                                {!!$content->fulltext_fa!!}
                            @endif

                        </div>
                        <div class="post-tag clearfix">
                           <!-- <ul class="tag-cloud pull-left">
                                <li><a href="#.">ANALYSIS</a></li>
                                <li><a href="#.">BOARD</a></li>
                                <li><a href="#."> CAREERS</a></li>
                            </ul>
                            <ul class="social-link pull-right">
                                <li><a href="#." class="text-center"><i class="fa fa-facebook"></i><span></span></a></li>
                                <li><a href="#." class="text-center"><i class="fa fa-twitter"></i><span></span></a></li>
                                <li><a href="#." class="text-center"><i class="fa fa-dribbble"></i><span></span></a></li>
                                <li><a href="#." class="text-center"><i class="fa fa-flickr"></i><span></span></a></li>
                            </ul>
                            -->
                        </div>
                        <h3>نظرات</h3>

                        @foreach($comments as $comment)

                        <div class="media blog-reply">
                            <div class="pull-left">
                                <a href="#."><img src="images/blog-commenter1.jpg" alt="Bianca Reid"/></a>
                            </div>
                            <div class="media-body">
                                <h4>
                                    @if($comment->userid != 0){{$comment->user['name']}}@else{{ $comment->name }}@endif

                                </h4>
                                <p>{{ $comment->comment  }} </p> <a href="#."

                                @if($comment->reply->count() > 0)
                                    @foreach($comment->reply as $reply)
                                        <div class="child admin-comment clearfix">
                                            <div class="thumb">
                                                <img src="/images/user.png" alt="#">
                                                {{--<div class="reply"><a href="#"><i class="icon-reply first-i"></i>Reply</a></div>--}}
                                            </div>
                                            <h4 class="entry-title"><a href="#" class="title">@if($reply->userid != 0){{$reply->user['name']}}@else{{ $reply->name }}@endif</a><i> &nbsp; &nbsp;  گفته: </i>
                                                {{--<span class="date">31 September, 2013</span>--}}
                                            </h4>
                                            <p> {{ $reply->comment  }} </p>
                                        </div>
                                    @endforeach
                                @endif
                               </div>
                        </div>
                        @endforeach


                        <div class="post-comment">
                            <h3>ثبت نظر  </h3>


                                <form class="form-inline"  id="commentform" name="_token" method="POST" enctype="multipart/form-data"
                                      action="<?= Url('/comment/send'); ?>">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                    <input type="hidden" name="post_id" value="{{  $content->id }} ">


                                    <div class="row">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <input name="name" type="text" class="form-control" placeholder="نام شما"></div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email"  class="form-control" placeholder="ایمیل"></div>
                                </div>
                                    <textarea placeholder="نظر شما... "></textarea>


                                    <button class="btn btn-primary hvr-bounce-to-bottom yekan" type="submit" name="_token" value="{{ csrf_token() }}"
                                            onsubmit="return alert('ok')" style="padding: 15px;border-radius: 20px"> ارسال نظر
                                    </button>
                                </form>




                        </div>
                    </div>
                </div>
                <aside class="col-md-4 col-sm-4">
                    <!--<div class="widget search_box">
                        <form>
                            <input type="search" placeholder="Search"> <i class="fa fa-search"></i></form>
                    </div>-->

                    <div class="widget wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms">
                        <h4>آخرین  مطالب</h4>
                        <ul class="category">
                            <!--<li><a href="#.">Benny Parker<span class="date">January 16, 2017</span></a></li>
                            <li><a href="#.">James Pattinson<span class="date">October 19, 2017</span></a></li>
                            <li><a href="#.">Charles Coventry<span class="date">October 09, 2017</span></a></li>
                            <li><a href="#.">Collin De GrandeHomme<span class="date">October 30, 2017</span></a></li>
                        -->
                        </ul>
                    </div>
                    <!--<div class="widget">
                        <h4></h4>
                        <ul class="category">
                            <li><a href="#.">Destination (6)</a></li>
                            <li><a href="#.">Food (2)</a></li>
                            <li><a href="#.">Landscape (4)</a></li>
                            <li><a href="#.">NAature (4)</a></li>
                            <li><a href="#.">Photogrohy (4)</a></li>
                            <li><a href="#.">Travel (4)</a></li>
                        </ul>
                    </div>-->
                    <div class="widget">
                        <h4>دسته بندی ها</h4>
                        <ul class="tag-cloud">
                            @foreach($categories as $value)

                            <li><a href="#{{ route('content.cat',['url' => $content->catid]) }}">{{ $value->title_fa }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- blog end -->














@endsection