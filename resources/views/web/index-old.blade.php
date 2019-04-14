@extends('layouts.layout')


@section('content')
    <div class="view mt-5" style="top: -58px;height: 390px" >
        <div class="parallax2"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong" >
            <!--Carousel Wrapper-->
            <div id="carousel-example-2" class="carousel slide w-50  m-auto" style="height: 300px" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators" style="top: 370px">
                    @foreach($utility['slider'] as $key => $slide)
                        <li data-target="#carousel-example-2" data-slide-to="{{$key}}" @if($key == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner w-100 h-100" role="listbox">
                    @foreach($utility['slider'] as $key => $slide)
                        <div class="carousel-item w-100 h-100 @if($key == 0)active @endif">
                        <div class="carousel-caption" style="padding-top: 45px;">
                            <h1>
                                @if(App::getLocale() == 'en')
                                    {{$slide->data['title']}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$slide->data['title_fa']}}
                                @endif
                            </h1>
                            <p class="pt-4">
                                @if(App::getLocale() == 'en')
                                    {{$slide->data['description']}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$slide->data['description_fa']}}
                                @endif
                            </p>
                            <a href="@if(App::getLocale() == 'en')
                            {{$slide->data['link1']}}
                            @elseif(App::getLocale() == 'fa')
                            {{$slide->data['link1_fa']}}
                            @endif">
                                <button type="button" class="btn btn-outline-white waves-effect mt-4">@if(App::getLocale() == 'en')
                                        {{$slide->data['button1']}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$slide->data['button1_fa']}}
                                    @endif</button>
                            </a>
                            <a href="@if(App::getLocale() == 'en')
                            {{$slide->data['link2']}}
                            @elseif(App::getLocale() == 'fa')
                            {{$slide->data['link2_fa']}}
                            @endif">
                            <button type="button" class="btn btn-white mt-4">@if(App::getLocale() == 'en')
                                    {{$slide->data['button2']}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$slide->data['button2_fa']}}
                                @endif</button>
                            </a>
                            <div class="font-small"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <div id="carousel-example-3" class="carousel slide w-75 h-25 m-auto" data-ride="carousel">

                <!--Slides-->
                <div class="carousel-inner w-100 h-100" role="listbox">
                    <?php $is_open=false ?>
                    @foreach($utility['slider_2'] as $key => $slide)
                        @if($key %4 == 0)
                                <?php $is_open=true ?>
                        <div class="carousel-item w-100 h-100 @if($key == 0)active @endif">
                            <div class="carousel-caption" style="padding-top: 45px;">
                                <div class="row">
                        @endif

                                        <div class="col-md-3 text-center">
                                            <a href="@if(App::getLocale() == 'en')
                                            {{$slide->data['link']}}
                                            @elseif(App::getLocale() == 'fa')
                                            {{$slide->data['link_fa']}}
                                            @endif">
                                                <img src="{{asset($slide->data['image'])}}" height="50" width="135"/>
                                            </a>
                                        </div>

                        @if($key %4 == 3)
                                </div>
                            </div>
                        </div>
                        <?php $is_open=false ?>
                        @endif

                    @endforeach
                        @if($is_open)
                                </div>
                            </div>
                        </div>
                        <?php $is_open=false ?>
                        @endif
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>

    <div class="tab" style="margin-top:-40px">
        @foreach($productcats as $cat)
        <div class="tablinks animated " onmouseover="openCity(event, 'Cat{{ $cat->id }}')" id="defaultOpen">
                <div class="text-center" >
                    <img src="{{ $cat->image }}"  alt="@if(App::getLocale() == 'en')
                    {{$cat->title}}
                    @elseif(App::getLocale() == 'fa')
                    {{$cat->title_fa}}
                    @endif" style="height: 115px;margin-bottom: 20px">
                </div>
            <!--<div>Web and E-commerce Development</div>-->
        </div>
        @endforeach

    </div>

    @foreach($productcats as $cat)
    <div id="Cat{{ $cat->id }}" class="tabcontent white-text text-center">
        <h3  style="margin-top: -15px">
            @if(App::getLocale() == 'en')
                {{$cat->title}}
            @elseif(App::getLocale() == 'fa')
                {{$cat->title_fa}}
            @endif
        </h3>
        <p class="pb-5">@lang('home.Products')</p>
        <?php $is_open=false; ?>
        @foreach($cat->products(8) as $key => $product)
            @if($key % 4 ==0)
                <div class="row justify-content-md-center">
                    <?php $is_open=true; ?>
            @endif
            <div class="col-md-3 border-chin p-4">
                <a style="color: #fff" href="{{ route('product',['url' => $product->id]) }}">
                <img @if(isset($product->images[0])) src="{{ asset($product->images[0]) }}" @endif class="w-75p" style="max-width: 250px; max-height: 75px"/>
                <div>{{ $product->title[App::getLocale()] }}</div>
                </a>
            </div>
            @if($key % 4 ==3)
                </div>
                <?php $is_open=false; ?>
            @endif
        @endforeach

        @if($is_open)
            </div>
            <?php $is_open=false; ?>
        @endif

    </div>
    @endforeach

    <div class="container">
        <h4 class="font-weight-bold p-3 text-center">@lang('home.Services')</h4>
        <p class="text-center"></p>
        <div class="row mt-5">
            <div class="col-md-4">
                @foreach($utility['service2'] as $key => $value)
                    @if($key >= count($utility['service2'])/2)
                        @break
                    @endif
                    <div class="row animated-back p-3 parent-gros">
                        <div class="col-md-2 text-right gros"><img src="{{asset($value->data['image'])}}" style="max-height: 40px;max-width: 40px;margin: 1px;"></div>
                        <div class="col-md-10">
                            <div class="font-weight-bold">
                                @if(App::getLocale() == 'en')
                                    {{$value->data['title']}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$value->data['title_fa']}}
                                @endif
                            </div>
                            <div>
                                @if(App::getLocale() == 'en')
                                    {{$value->data['description']}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$value->data['description_fa']}}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <img src="/prismetric/img/iphone.gif"/></div>
            <div class="col-md-4">
                @foreach($utility['service2'] as $key => $value)
                    @if($key < count($utility['service2'])/2)
                        @continue
                    @endif
                    <div class="row animated-back p-3 parent-gros">
                        <div class="col-md-2 text-right gros"><img src="{{asset($value->data['image'])}}" style="max-height: 40px;max-width: 40px;margin: 1px;"></div>
                        <div class="col-md-10">
                                <div class="font-weight-bold">
                                    @if(App::getLocale() == 'en')
                                        {{$value->data['title']}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$value->data['title_fa']}}
                                    @endif
                                </div>
                                <div>
                                    @if(App::getLocale() == 'en')
                                        {{$value->data['description']}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$value->data['description_fa']}}
                                    @endif
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="view mt-5">
        <div class="parallax2"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong">
            <!--Carousel Wrapper-->
            <div id="carousel-example-2" class="carousel slide w-50 h-75 m-auto" data-ride="carousel">
                <!--&lt;!&ndash;Indicators&ndash;&gt;-->
                <!--<ol class="carousel-indicators">-->
                <!--<li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>-->
                <!--<li data-target="#carousel-example-2" data-slide-to="1"></li>-->
                <!--<li data-target="#carousel-example-2" data-slide-to="2"></li>-->
                <!--</ol>-->
                <!--&lt;!&ndash;/.Indicators&ndash;&gt;-->
                <!--Slides-->
                <div class="carousel-inner w-100 h-100" role="listbox">
                    @foreach($utility['faq'] as $key => $item)
                    <div class="carousel-item w-100 h-100 @if($key == 0) active @endif">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive"><i class="far fa-comment-dots"></i></h3>
                            <p>{{ $item->data['text'] }}</p>
                            <div class="font-small">{{ $item->data['subtitle'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>

    <section class="bg-img2 text-center p-5  " style="direction: ltr">
        <h4 class="font-weight-bold">@lang('home.About')</h4>
        <p></p>
        <!--<p>Our every case of successful project connotes our excellence</p>-->
        <div class="row">
            <div class="col-md-6 p-3">
                <img src="/prismetric/img/8.png" class="w-100"/>
            </div>
            <div class="col-md-6 p-3">
                <img src="{{$utility['about_us']->data['image']}}" height="175" width="175"/>
                <h4 class="font-weight-bold p-3">@if(App::getLocale() == 'en')
                        {{$utility['about_us']->data['title']}}
                    @elseif(App::getLocale() == 'fa')
                        {{$utility['about_us']->data['title_fa']}}
                    @endif</h4>
                <p style="color: #fff">
                    @if(App::getLocale() == 'en')
                        {{$utility['about_us']->data['description']}}
                    @elseif(App::getLocale() == 'fa')
                        {{$utility['about_us']->data['description_fa']}}
                    @endif
                </p>
                <a href="@if(App::getLocale() == 'en')
                {{$utility['about_us']->data['link']}}
                @elseif(App::getLocale() == 'fa')
                {{$utility['about_us']->data['link_fa']}}
                @endif">
                <button type="button" class="btn btn-white mt-4">@if(App::getLocale() == 'en')
                        {{$utility['about_us']->data['button']}}
                    @elseif(App::getLocale() == 'fa')
                        {{$utility['about_us']->data['button_fa']}}
                    @endif</button>
                </a>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row mt-5 mb-5 pb-5">
            <div class="col-md-12">
                <h4 class="font-weight-bold p-3 text-center">@lang('home.Projects')</h4>
                <p class="text-center"></p>
            </div>
        </div>
            @foreach($projects as $key => $project)
                @if($key % 2 ==0)
                    <div class="row" style="margin-top: 140px">
                        <?php $is_open=true; ?>
                        @endif
                <div class="col-md-6">
                    <div class="border position-relative text-center pt-50p shadowh">
                        <div class="img-card">
                            @if(isset($project->images))
                            <img src="{{asset($project->images)}}" height="200" width="200"/>
                            @endif
                        </div>
                        <div>
                            @if(App::getLocale() == 'en')
                                {{$project->introtext}}
                            @elseif(App::getLocale() == 'fa')
                                {{$project->introtext_fa}}
                            @endif
                        </div>
                        <div class="font-weight-bold mt-3">
                            @if(App::getLocale() == 'en')
                                {{$project->title}}
                            @elseif(App::getLocale() == 'fa')
                                {{$project->title_fa}}
                            @endif
                        </div>
                        <div class="grey-text mb-3">
                            @if(App::getLocale() == 'en')
                                <div></div>Client:<div><span>{{$project->author}}</span></div>
                            @elseif(App::getLocale() == 'fa')
                                <div>مشتری:<span>{{$project->author_fa}}</span></div>
                            @endif
                        </div>

                        <button type="button" class="btn btn-outline-yellow waves-effect rad-50 p-3"><i
                                    class="fas fa-envelope fa-lg"></i></button>
                        <a href="{{route('project',['url'=>$project->id])}}" class="btn btn-outline-cyan waves-effect rad-50 p-3"><i
                                    class="fas fa-eye fa-lg"></i></a>
                    </div>

                </div>
                        @if($key % 2 ==1)
                            </div>
                            <?php $is_open=false; ?>
                        @endif
            @endforeach
            @if($is_open)
                </div>
                <?php $is_open=false; ?>
            @endif




    </div>

    <div class="view mt-5">
        <div class="parallax3"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <!-- Card -->
                    <div class="card m-auto w-75 h-530p">
                        <div>
                            <!-- Default form contact -->
                            <form action="{{ route('send.contactus') }}" method="post" class="text-center p-5 w-75">

                                <p class="h4 mb-4">@lang('home.Contact')</p>

                                <!-- Name -->
                                <input type="text" name="name" id="defaultContactFormName" class="form-control mb-4" placeholder="@lang('home.Name')">

                                <!-- Email -->
                                <input type="email" name="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="@lang('home.Email')">
                                <input type="number" class="form-control mb-4" name="tell" placeholder="@lang('home.Tell')">

                                <!-- Subject -->
                                {{--<label>@lang('home.Subject')</label>--}}
                                {{--<select class="browser-default custom-select mb-4">--}}
                                    {{--<option value="" disabled>Choose option</option>--}}
                                    {{--<option value="1" selected>Request</option>--}}
                                    {{--<option value="2">Report</option>--}}
                                    {{--<option value="3">Feedback</option>--}}
                                    {{--<option value="4">Feature request</option>--}}
                                {{--</select>--}}
                                <input type="text" class="form-control mb-4" name="subject" class="form-control" placeholder="@lang('home.Subject')">

                                <!-- Message -->
                                <div class="form-group">
                                    <textarea name="contactMessage" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="@lang('home.Message')"></textarea>
                                </div>

                                <!-- Copy -->
                                {{--<div class="custom-control custom-checkbox mb-4">--}}
                                    {{--<input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">--}}
                                    {{--<label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>--}}
                                {{--</div>--}}

                                <!-- Send button -->
                                <button class="btn btn-info btn-block" type="submit">@lang('home.Submit')</button>

                            </form>
                            <!-- Default form contact -->
                        </div>
                        <div class="form-side ">
                            <p>
                                @if(App::getLocale() == 'en')
                                    {{ $utility['contact']->data['description'] }}
                                @elseif(App::getLocale() == 'fa')
                                    {{ $utility['contact']->data['description_fa'] }}
                                @endif
                            </p>

                        </div>

                    </div>
                    <!-- Card -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h4 class="font-weight-bold p-3 text-center">@lang('home.Blog')</h4>
                <!--<p class="text-center">We naturally excel in mobile app building, reflecting ace app qualities</p>-->
            </div>

        </div>
        <div class="row mt-5">
            @foreach($contents as $content)
                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card parent-gros overflow-h">

                        <!-- Card image -->
                        @if(isset($content->images))
                            <img class="card-img-top gros" src="{{ asset($content->images) }}"
                                 alt="@if(App::getLocale() == 'en')
                                 {{$content->title}}
                                 @elseif(App::getLocale() == 'fa')
                                 {{$content->title_fa}}
                                 @endif">
                    @endif

                    <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title"><a> @if(App::getLocale() == 'en')
                                        {{$content->title}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$content->title_fa}}
                                    @endif</a></h4>
                            <!-- Text -->
                            <p class="card-text">@if(App::getLocale() == 'en')
                                    {{$content->introtext}}
                                @elseif(App::getLocale() == 'fa')
                                    {{$content->introtext_fa}}
                                @endif</p>
                            <!-- Button -->
                            <a href="{{ route('content',['id' => $content->id]) }}" class="btn btn-outline-yellow">@lang('home.read')</a>

                        </div>

                    </div>
                    <!-- Card -->
                </div>
            @endforeach
        </div>
        <div class="row m-5 text-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-cyan rad-20">@lang('home.more')</button>
            </div>
        </div>
    </div>


    <!-- Footer -->


@endsection