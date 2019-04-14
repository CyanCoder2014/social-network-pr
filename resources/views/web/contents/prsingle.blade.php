@extends('web.layouts.layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">
    <style>
        .slider {
            width: 50%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: .5;
        }

        .slick-current {
            opacity: 1;
        }
    </style>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

@endsection
@section('content')


    <?php
    if ($content->images == null)
        $content->images = '001.jpg'
    ?>
    <div class="view">
        <div class="parallax5"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong text-center white-text p-5">

            <h1 class="mt-5 pt-5">@if(App::getLocale() == 'en')
                    {{ $content->title }}
                @elseif(App::getLocale() == 'fa')
                    {{ $content->title_fa }}
                @endif</h1>
            <p></p>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 text-right">
                <img src="{{ asset($content->images) }}" class="w-75"/>
            </div>
            <div class="col-md-6">
                <div class="border-bottom mb-4">
                    <h3 class="border-bottom-cyan w-50 m-0 font-weight-bold">@if(App::getLocale() == 'en')
                            {{ $content->title }}
                        @elseif(App::getLocale() == 'fa')
                            {{ $content->title_fa }}
                        @endif</h3>
                </div>
                <div class="date" style="color: #000">
                    @lang('home.Category'):<a class="category-link" href="{{ route('project.cat',['url' => $content->catid]) }}">@if(App::getLocale() == 'en')
                            {{ $content->category->title }}
                        @elseif(App::getLocale() == 'fa')
                            {{ $content->category->title_fa }}
                        @endif</a>
                </div>
                <div class="comments">
                    @if(App::getLocale() == 'en')
                        {{ $content->author }}
                    @elseif(App::getLocale() == 'fa')
                        {{ $content->author_fa }}
                    @endif
                </div>
                {{--<p class="font-weight-bold">To meet our Clients' intentions flawlessly as scheduled for improved business</p>--}}
                {{--<p>We always treat our clients dreams as ours while we invest our knowledge, resource and technology for--}}
                    {{--fulfilling their aim glitch-free so as to aid them in the development. We believe our solutions will--}}
                    {{--support the organizations to meet any impeding business scenarios with confidence. This we do by clearly--}}
                    {{--analyzing every necessity of our clients business and their competency. Our thorough research after--}}
                    {{--knowing the requirements and reading the technical business trend help us balancing all the project--}}
                    {{--aspects and articulating business values more efficiently before commencing the project.</p>--}}
                <div class="post_content" style="background:none repeat scroll 0% 0% #eeeeee; border:1px solid #cccccc; padding:5px 10px; text-align:justify;margin: 25px 0;">
                    @if(App::getLocale() == 'en')
                        {{$content->introtext}}
                    @elseif(App::getLocale() == 'fa')
                        {{$content->introtext_fa}}
                    @endif
                    <hr style="height: 3px;border: 10px">
                </div>
                @if(App::getLocale() == 'en')
                    {!! $content->fulltext !!}
                @elseif(App::getLocale() == 'fa')
                    {!! $content->fulltext_fa !!}
                @endif
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-6 text-left">
                <section class="swqslider" style="direction: ltr">
                    @if($content->pimages)
                        @foreach($content->pimages as $image)
                            <div><img src="{{$image}}"></div>
                        @endforeach
                    @endif
                </section>
            </div>
            <div class="col-md-6">
                <video controls style="width: 100%">
                    <source type="video/mp4" src="{{$content->video}}">
                </video>
            </div>

        </div>
    </div>


@endsection
@section('end')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{asset('slick/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).on('ready', function() {
            $('.swqslider').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });

        });

    </script>
@endsection
