@extends('web.layouts.layout')


@section('content')


    <div class="wrapper">
        <div class="container">
            <div class="content_block row no-sidebar">
                <div class="fl-container">
                    <div class="posts-block">
                        <div class="contentarea">

                            <!-- Filter_block -->
                            <div class="filter_block container">
                                <div class="filter_navigation">
                                    <ul id="options" class="splitter">
                                        <li>
                                            <ul data-option-key="filter" class="optionset">
                                                <li class="selected"><a data-option-value="*" data-catname="all" href="#filter">
                                                        @if(App::getLocale() == 'en')
                                                        All
                                                        @elseif(App::getLocale() == 'fa')
همه موارد
                                                        @endif

                                                    </a></li>
                                                @foreach($categories as $category)
                                                    @if(App::getLocale() == 'en')

                                                    <li><a dta-option-value=".{{$category->id}}" data-catname="{{$category->id}}" href="#filter"> {{ $category->title  }}</a></li>
                                                    @elseif(App::getLocale() == 'fa')
                                                    <li><a data-option-value=".{{$category->id}}" data-catname="{{$category->id}}" href="#filter"> {{ $category->title_fa  }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- //Filter_block -->

                            <div class="row">
                                <div class="sorting_block image-grid featured_items column1" id="list">

                                    @foreach($contents as $content)
                                    <div class="col-sm-12 {{$content->catid}} element">
                                        <div class="portfolio_item">
                                            <div class="row">
                                                <div class="col-sm-6 pb7">
                                                    <div class="img_block wrapped_img" style="max-height: 400px; overflow: hidden">
                                                        <img class="img-responsive" src="<?= URL('images/' . $content->images); ?>" />
                                                        <span class="block_fade"></span>
                                                        <a href="<?= URL::to(App::getLocale()) . '/content/' . $content->id; ?>" class="featured_ico_link view_link"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    @if(App::getLocale() == 'en')

                                                    <h2 class="portf_title"><a href="<?= URL::to(App::getLocale()) . '/content/' . $content->id; ?>">{{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}</a></h2>
                                                    @elseif(App::getLocale() == 'fa')

                                                    <h2 class="portf_title"><a href="<?= URL::to(App::getLocale()) . '/content/' . $content->id; ?>">{{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}</a></h2>
                                                    @endif

                                                    <div class="listing_meta">
                                                        @if(App::getLocale() == 'en')
                                                        <span>{!! $content->created !!}</span>
                                                        @elseif(App::getLocale() == 'fa')
                                                        <span>{!! to_jalali($content->created) !!}</span>
                                                        @endif

                                                    </div>
                                                        @if(App::getLocale() == 'en')
                                                    <p>{!! \Illuminate\Support\Str::words($content->introtext, $words = 15, $end = '...') !!}<a class="read_more" href="<?= URL::to(App::getLocale()) . '/content/' . $content->id; ?>">Read More</a></p>
                                                        @elseif(App::getLocale() == 'fa')
                                                    <p>{!! \Illuminate\Support\Str::words($content->introtext_fa, $words = 15, $end = '...') !!}<a class="read_more" href="<?= URL::to(App::getLocale()) . '/content/' . $content->id; ?>">Read More</a></p>
                                                        @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                {{$contents->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
