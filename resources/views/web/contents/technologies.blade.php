@extends('web.layouts.layout')


@section('content')


    <div class="wrapper">
        <div class="container">
            <div class="content_block row no-sidebar">
                <div class="fl-container">
                    <div class="posts-block">
                        <div class="contentarea">
                            <!-- Countdown -->

                            <div class="row">
                                <div class="col-sm-12 module_cont pb5">
                                    <div class="bg_title">
                                        <h2> @lang('home.Technologies')</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 module_cont module_feature_posts pb40">
                                    <div class="featured_items">
                                        <div class="items4 featured_posts">
                                            <ul class="item_list">

                                                @foreach($contents as $content)
                                                    <li>
                                                        <div class="item ">
                                                            <div class="item_wrapper">
                                                                <div class="img_block wrapped_img" style="max-height: 200px; overflow: hidden">

                                                                    @if($content->images !== null)
                                                                        <img alt=""
                                                                             src="<?= URL('images/' . $content->images); ?>"/>
                                                                    @endif
                                                                    <span class="block_fade"></span>
                                                                    <a class="featured_ico_link view_link"
                                                                       href="<?= URL::to(App::getLocale()).'/technology/'.$content->id; ?>"><i
                                                                                class="icon-link"></i></a>
                                                                </div>
                                                                <div class="featured_items_body">
                                                                    <div class="featured_items_title"><h5>

                                                                            @if(App::getLocale() == 'en')
                                                                                <a href="<?= URL::to(App::getLocale()).'/technology/'.$content->id; ?>"> {{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...')}}</a>
                                                                            @elseif(App::getLocale() == 'fa')
                                                                                <a href="<?= URL::to(App::getLocale()).'/technology/'.$content->id; ?>"> {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...')}}</a>
                                                                            @endif
                                                                        </h5>
                                                                    </div>
                                                                    @if(App::getLocale() == 'en')
                                                                        <div class="featured_item_content"> {!! \Illuminate\Support\Str::words($content->introtext, $words = 12, $end = '...') !!}</div>
                                                                    @elseif(App::getLocale() == 'fa')
                                                                        <div class="featured_item_content"> {!! \Illuminate\Support\Str::words($content->introtext_fa, $words = 12, $end = '...') !!}</div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
