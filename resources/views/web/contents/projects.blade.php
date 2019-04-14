@extends('web.layouts.layout')


@section('content')
    <div class="view">
        <div class="parallax5"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong text-center white-text p-5">

            <h1 class="mt-5 pt-5">@lang('home.Projects')</h1>
            <p></p>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="selected"><a class="nav-link active black-text lineheight-50p" id="home-tab" data-toggle="tab" href="#all"
                                            role="tab"
                                            aria-controls="home" aria-selected="true">
                            @if(App::getLocale() == 'en')

                                All
                            @elseif(App::getLocale() == 'fa')
                                همه موارد
                            @endif
                        </a></li>
                    @foreach($categories as $category)
                        <li class="nav-item tab-width">
                            <a class="nav-link black-text lineheight-50p" data-toggle="tab" href="#cat{{$category->id}}"
                               role="tab"
                               aria-controls="profile" aria-selected="false">
                        @if(App::getLocale() == 'en')
                             {{ $category->title  }}
                        @elseif(App::getLocale() == 'fa')
                            {{ $category->title_fa  }}
                        @endif
                            </a></li>

                    @endforeach
                    <li class="nav-item tab-width">
                        <a class="nav-link active black-text lineheight-50p" id="home-tab" data-toggle="tab" href="#home"
                           role="tab"
                           aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item tab-width">
                        <a class="nav-link black-text lineheight-50p" id="profile-tab" data-toggle="tab" href="#profile"
                           role="tab"
                           aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item tab-width">
                        <a class="nav-link black-text lineheight-50p" id="contact-tab" data-toggle="tab" href="#contact"
                           role="tab"
                           aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content " id="myTabContent">
                    <div class="tab-pane fade show active p-4 " id="all" role="tabpanel"
                         aria-labelledby="home-tab">
                        <div class="row">
                            @foreach($contents as $content)
                                <div class="col-md-3 h-260p mt-4">
                                    <div class="view overlay zoom parent-moving">
                                        <img src="<?= URL('images/' . $content->images); ?>" class="img-fluid "/>
                                        <div class="mask flex-center rgba-blue-light"></div>
                                        <a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">
                                            <div class="moving-text">
                                                <div class="font-weight-bold">
                                                    @if(App::getLocale() == 'en')
                                                        <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}</a></h5>
                                                    @elseif(App::getLocale() == 'fa')
                                                        <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}</a></h5>
                                                    @endif
                                                </div>
                                                <div class="grey-text text-center">
                                                    @if(App::getLocale() == 'en')
                                                        <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext, $words = 15, $end = '...') !!}</a></div>
                                                    @elseif(App::getLocale() == 'fa')
                                                        <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext_fa, $words = 15, $end = '...') !!}</a></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    @foreach($categories as $category)
                        <div class="tab-pane fade " id="cat{{$category->id}}" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                @foreach($contents as $content)
                                    @if($content->cat == $category->id)
                                    <div class="col-md-3 h-260p mt-4">
                                        <div class="view overlay zoom parent-moving">
                                            <img src="<?= URL('images/' . $content->images); ?>" class="img-fluid "/>
                                            <div class="mask flex-center rgba-blue-light"></div>
                                            <a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">
                                                <div class="moving-text">
                                                    <div class="font-weight-bold">
                                                        @if(App::getLocale() == 'en')
                                                            <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}</a></h5>
                                                        @elseif(App::getLocale() == 'fa')
                                                            <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}</a></h5>
                                                        @endif
                                                    </div>
                                                    <div class="grey-text text-center">
                                                        @if(App::getLocale() == 'en')
                                                            <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext, $words = 15, $end = '...') !!}</a></div>
                                                        @elseif(App::getLocale() == 'fa')
                                                            <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext_fa, $words = 15, $end = '...') !!}</a></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                    <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div><div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 h-260p mt-4">
                                <div class="view overlay zoom parent-moving">
                                    <img src="img/11.png" class="img-fluid "/>
                                    <div class="mask flex-center rgba-blue-light"></div>
                                    <div class="moving-text">
                                        <div class="font-weight-bold">dfrhfrth</div>
                                        <div class="grey-text text-center">dfrhfrth</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="view ">
        <div class="parallax3"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <!-- Card -->
                    <div class="card m-auto w-75 h-530p">
                        <div class="dir-r">
                            <!-- Default form contact -->
                            <form class="text-center p-5 w-75">

                                <p class="h4 mb-4">Contact us</p>

                                <!-- Name -->
                                <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

                                <!-- Email -->
                                <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">

                                <!-- Subject -->
                                <label>Subject</label>
                                <select class="browser-default custom-select mb-4">
                                    <option value="" disabled>Choose option</option>
                                    <option value="1" selected>Feedback</option>
                                    <option value="2">Report a bug</option>
                                    <option value="3">Feature request</option>
                                    <option value="4">Feature request</option>
                                </select>

                                <!-- Message -->
                                <div class="form-group">
                                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
                                </div>

                                <!-- Copy -->
                                <div class="custom-control custom-checkbox mb-4">
                                    <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
                                    <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                                </div>

                                <!-- Send button -->
                                <button class="btn btn-info btn-block" type="submit">Send</button>

                            </form>
                            <!-- Default form contact -->
                        </div>
                        <div class="form-side ">
                            <p>
                                " you have to be burning with an idea, or a problem, or a wrong that you want to right. if you're not passionate enough from the start, you'll never stick it out. "

                            </p>

                        </div>

                    </div>
                    <!-- Card -->
                </div>
            </div>
        </div>
    </div>


    <div class="wrapper">
        <div class="container">
            <div class="page_title_block">
                <div class="bg_title">
                    <h2>@lang('home.Projects')</h2>
                </div>

            </div>
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
                                                    <li><a data-option-value=".{{$category->id}}" data-catname="{{$category->id}}" href="#filter"> {{ $category->title  }}</a></li>
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

                            <div class="fw_block bg_start wall_wrap pb70">
                                <div class="sorting_block image-grid featured_items" id="list">



                                    @foreach($contents as $content)
                                    <div class="{{$content->cat}} element">
                                        <div class="item">
                                            <div class="item_wrapper">
                                                <div class="img_block wrapped_img" style="height: 200px; overflow: hidden">
                                                    <img src="<?= URL('images/' . $content->images); ?>" alt="">
                                                    <span class="block_fade"></span>
                                                    <a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>" class="featured_ico_link view_link"><i class="icon-link"></i></a>
                                                </div>
                                                <div class="featured_items_body">
                                                    <div class="featured_items_title">
                                                        @if(App::getLocale() == 'en')
                                                        <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}</a></h5>
                                                        @elseif(App::getLocale() == 'fa')
                                                        <h5><a href="<?= URL::to(App::getLocale()) . '/project/' . $content->id; ?>">@lang('home.client'):  {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}</a></h5>
                                                        @endif

                                                    </div>
                                                    @if(App::getLocale() == 'en')
                                                    <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext, $words = 15, $end = '...') !!}</a></div>
                                                    @elseif(App::getLocale() == 'fa')
                                                    <div class="featured_meta"><a href="<?= URL::to(App::getLocale()).'/project/'.$content->id; ?>">{!! \Illuminate\Support\Str::words($content->introtext_fa, $words = 15, $end = '...') !!}</a></div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
