@extends('web.layouts.layout')


@section('content')




    <!-- Page Content Slider -->
    <div class="page_content_main_slider" id="home">
        <div class="swiper-container main_slider">
            <div class="swiper-wrapper">
                @foreach($utility['slider_2'] as $key => $slide)

                <div class="swiper-slide" style="background: transparent">
                    <div class="container page_content_slider">
                        <div class="row text_center_row">
                            <div class="col-md-6 col-sm-5 before_column_insert col-md-push-6 col-sm-push-7" >
                                <img src="{{asset($slide->data['image'])}}" alt="Mobile-Iphone" class="mobile_slider_img sh" >
                            </div>
                            <div class="col-md-6 col-sm-7 before_column_insert_1 col-md-pull-6 col-sm-pull-5">
                                <div class="page_content_slider_1 dr ">
                                    <h1 class="yekan" style="font-size: 30px">{{$slide->data['intro1']}}</h1>
                                    <p class="sahel">{{$slide->data['intro2']}}</p>
                                    <div class="btn_div_inline">
                                        <a class="btn_1 scroll yekan" href="/home/forum/category">تالار های گفتمان انرژی</a>
                                        <a class="btn_2 scroll yekan" href="/home/intro"> شبکه اجتماعی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
    <!-- /Page Content Slider -->
    <!-- Page Content Facts -->
    <div class="page_content_facts">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="facts_information facts_information_4">
                        <h5 class="count">14</h5>
                        <p>سمینار های برگزار شده </p>
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="facts_information facts_information_1">
                        <h5><span class="count">21</span></h5>
                        <p>اعضای رسمی باشگاه</p>
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="facts_information facts_information_5">
                        <h5>
                            <i class="fa fa-users" aria-hidden="true"></i>

                        </h5>
                        <a href="/home/intro" class="btn btn-danger yekan"  style="padding: 15px;border-radius: 30px;box-shadow: 1px 1px 6px rgba(0,0,0,0.3)">شبکه اجتماعی</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="facts_information facts_information_3">
                        <h5 class="count">839</h5>
                        <p>اعضای شبکه اجتماعی</p>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12">
                    <div class="facts_information facts_information_2">
                        <h5><span class="count">52</span></h5>
                        <p>تالار  گفتمان</p>
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content Facts-->
    <!-- Page Content Features -->
    <div class="page_content_features page_content_headings" id="page_content_features">
        <div class="container">
            <h2 class="text-center yekan">خدمات </h2>
            <img src="/new/images/divider.png" alt="Heading-Divider">
            <p>باشگاه صاحب نظران انرژی ایرانیان</p>
            <div class="row dr">


                @foreach($utility['service3'] as $key => $value)

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="app_information_bullet">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12">
                                <div class="app_feature_bullets app_feature_bullets_1" style="overflow: hidden">
                                    <img src="{{asset($value->data['image'])}}">
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <div class="app_feature_information dr">
                                    <h3>
                                        @if(App::getLocale() == 'en')
                                            {{$value->data['title']}}
                                        @elseif(App::getLocale() == 'fa')
                                            {{$value->data['title_fa']}}
                                        @endif
                                    </h3>
                                    <p>
                                        @if(App::getLocale() == 'en')
                                            {{\Illuminate\Support\Str::words($value->data['description'] , $words=8 , $end= '...')}}
                                        @elseif(App::getLocale() == 'fa')
                                            {{\Illuminate\Support\Str::words($value->data['description_fa'], $words=8 , $end= '...')}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach





            </div>
        </div>
    </div>
    <!-- /Page Content Features -->
    <!-- Page Content BlogSpot -->
    <div class="page_content_recent_blogspot" id="page_content_news">
        <div class="container">
            <h2>  درباره باشگاه صاحبنظران انرژی ایرانیان </h2>
            <img src="/new/images/divider_cyan.png" alt="divider_cyan">
            <p> </p>
            <div class="recent_blogspot">
                <div class="row">


                    @foreach($contents as $key =>$content)

                    <div class="col-sm-4">
                        <div class="blog_main">
                            <div class="blog_img" style="height: 250px;overflow: hidden">
                                <img src="{{asset($content->images)}}" class="img-responsive" alt="blog_img">
                            </div>
                            <div class="blog_name_designation
@if($key%2 == 0)
blog_name_designation_2
@endif
">
                                <h2>
                                    @if(App::getLocale() == 'en')
                                        <span style="font-size: 25px">
                                        {!!  \Illuminate\Support\Str::words($content->title , $words = 6, $end = '...') !!}</span>
                                    @elseif(App::getLocale() == 'fa')
                                        <span style="font-size: 25px">
                                        {!!  \Illuminate\Support\Str::words($content->title_fa , $words = 6, $end = '...') !!}</span>
                                    @endif
                                </h2>
                            </div>
                            <div class="blog_information
@if($key%2 == 0)
                                    blog_information_2
                                    @endif
                                    ">
                                <p>
                                    @if(App::getLocale() == 'en')
                                        <span style="font-size: 14px;font-family: 'Sahel' , sans-serif">  {!!  \Illuminate\Support\Str::words($content->introtext , $words = 12, $end = '...') !!}</span>
                                    @elseif(App::getLocale() == 'fa')
                                        <span style="font-size: 14px;font-family: 'Sahel' , sans-serif">  {!!  \Illuminate\Support\Str::words($content->introtext_fa , $words = 12, $end = '...') !!}</span>
                                    @endif
                                </p>
                                <a href="<?= Url('/content/'.$content->id); ?>">ادامه مطلب </a>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content BlogSpot -->
    <!-- Page Content Get App -->
    <div class="page_content_getapp page_content_headings " id="page_content_getapp">
        <div class="container">
            <h2 class="text-center yekan">اهداف باشگاه </h2>
            <img src="/new/images/divider.png" alt="img_divider">
            <p> </p>
            <div class="row">
                <div class="col-md-9 col-md-offset-1 yekan " >
                    <div class="row">

                        @foreach($utility['service2'] as $key => $value)

                        <div class="col-sm-6">

                            <div class="app_download_box clearfix text-center"  >
                                <img src="/{{asset($value->data['image'])}}" class="sh" style="height: 45px;margin-top: 20px">
                                <br>
                                <p >
                                    @if(App::getLocale() == 'en')
                                        {{$value->data['title']}}
                                    @elseif(App::getLocale() == 'fa')
                                        {{$value->data['title_fa']}}
                                    @endif
                                </p>
                            </div>
                        </div>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content Get App-->
    <!-- Page Content Pricing Plans
        <div class="page_content_pricing_plan page_content_headings" id="page_content_prices">
            <div class="container">
                <h2 class="text-center">Pricing</h2>
                <img src="/new/images/divider_cyan.png" alt="Heading-Divider">
                <p>We Design app for Android, iOS, and Windows Phone platform. Lorem ipsum dolor sit amet consectetur
                adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim.</p>
                <div class="row">
                    <div class="pricing_tables clearfix">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="pricing_tables_1">
                                <div class="pricing_tables_1_upper">
                                    <p>Standard</p>
                                    <h3>$10</h3>
                                    <p>Per Month</p>
                                </div>
                                <div class="pricing_tables_1_lower">
                                    <p>Lorem ipsum dolor sit amet con sectetur adipiscing elit sed.</p>
                                    <a href="#.">Sign Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="pricing_tables_1 pricing_tables_2">
                                <div class="pricing_tables_1_upper pricing_tables_2_upper">
                                    <p>Popular</p>
                                    <h3>$30</h3>
                                    <p>Per Month</p>
                                </div>
                                <div class="pricing_tables_1_lower pricing_tables_2_lower">
                                    <p>Lorem ipsum dolor sit amet con sectetur adipiscing elit sed.</p>
                                    <a href="#.">Sign Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="pricing_tables_1 pricing_tables_3">
                                <div class="pricing_tables_1_upper pricing_tables_3_upper">
                                    <p>Premium</p>
                                    <h3>$80</h3>
                                    <p>Per Month</p>
                                </div>
                                <div class="pricing_tables_1_lower pricing_tables_3_lower">
                                    <p>Lorem ipsum dolor sit amet con sectetur adipiscing elit sed.</p>
                                    <a href="#.">Sign Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class=" pricing_tables_1 pricing_tables_4">
                                <div class="pricing_tables_1_upper pricing_tables_4_upper">
                                    <p>Professional</p>
                                    <h3>$140</h3>
                                    <p>Per Year</p>
                                </div>
                                <div class="pricing_tables_1_lower pricing_tables_4_lower">
                                    <p>Lorem ipsum dolor sit amet con sectetur adipiscing elit sed.</p>
                                    <a href="#.">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /Page Content Pricing Plans -->
    <!-- Page Content Team-->
    <div class="page_content_team">
        <div class="container">
            <h2 class="yekan">  اعضای رسمی باشگاه</h2>
            <img src="/new/images/divider_cyan.png" alt="divider_cyan" class="for_separate_img">
            <p class="page_content_headings_team"></p>
            <div class="team_slider">
                <div class="team-slider">
                    <div id="owl-demo1">

                        @foreach($utility['slider_3'] as $key => $slide)
                        <div class="item item_employee">
                            <div class="image-scale" style="height: 160px;overflow: hidden">
                                <img src="{{asset($slide->data['image'])}}" alt="Image">
                            </div>

                            <div class="team_member_detail

                                    @if($key%2 == 0)
                                    team_member_detail_4
                                    @endif">
                                <p style="font-size: 12px">   {{$slide->data['link_fa']}} </p>
                                <ul class="social">

                                    <li>
                                        {{$slide->data['link']}}
                                    </li>

                                </ul>
                            </div>
                        </div>

                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content Team-->
    <!-- Page Content User Reviews-->
    <!--
    <div class="page_content_user_reviews page_content_headings">
        <div class="container ">
            <h2 class="yekan">آخرین  فروم های شبکه اجتماعی </h2>
            <img src="/new/images/divider_cyan.png" alt="divider_cyan">
            <p>We Design app for Android, iOS, and Windows Phone platform. Lorem ipsum dolor sit amet consectetur
                adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim.</p>
            <div class="row dr sahel">
                <div class="client_reviews_list">
                    <div class="col-sm-4">
                        <div class="client_review">
                            <p>He is really talented man. Work very fiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                        <div class="client_name_details clearfix">
                            <img src="/new/images/team2.jpg" alt="client_google" class="img-circle">
                            <div class="client-info dr">
                                <p style="text-align: right">Jenny Smith</p>
                                <a href="#">نمایش تالار</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="client_review client_review_2">
                            <p>He is really talented man. Work very fast. Lorem ipsum dolor sit amet consectetur adipiscing ee et dolore.</p>
                        </div>
                        <div class="client_name_details clearfix">
                            <img src="/new/images/team2.jpg" alt="client_google" class="img-circle">
                            <div class="client-info client_info_2">
                                <p style="text-align: right">Jenny Smith</p>
                                <a href="#">google.com</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="client_review client_review_3">
                            <p>He is really talented man. Work very fast. Ling elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                        <div class="client_name_details clearfix">
                            <img src="/new/images/team2.jpg" alt="client_google" class="img-circle">
                            <div class="client-info client_info_3">
                                <p style="text-align: right">Jenny Smith</p>
                                <a href="#">google.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content User Reviews-->
    <!-- Page Content Quote Section -->
    <div  id="page_content_aboutus" class="page_content_quote_section big-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="section">
                        <h3 style="font-size: 35px" class="yekan" ><i class="fa fa-quote-left" aria-hidden="true"></i>
                            درباره ما <i class="fa fa-quote-right" aria-hidden="true"></i>
                        </h3>
                        <p style="font-size: 14px">
                            @if(App::getLocale() == 'en')
                                {{ $setting->data['about_us'] }}
                            @elseif(App::getLocale() == 'fa')
                                {{ $setting->data['about_us_fa'] }}
                            @endif
                        </p>
                        <br><br>
                        <a href="/signup" class="contact_form_button yekan" style="padding: 15px;padding-right: 35px;padding-left: 35px">عضویت در باشگاه</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content Quote Section -->






    <!-- Page Content Contact Form -->
    <div class="page_content_contact_form page_content_headings" id="page_content_contactus">
        <div class="container">
            <h2 class="yekan">تماس با ما</h2>
            <img src="/new/images/divider_cyan.png" alt="divider_cyan">
            <p>انتقادات و پیشنهادات خود را با ما درمیان بگذارید</p>

            <form name="_token" method="POST" enctype="multipart/form-data"
                  action="{{ route('send.message') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                <div class="row ">
                <div class="contact_form yekan ">
                    <form>
                        <div class="col-md-4 ">
                            <input name="tell" type="text" placeholder="شماره تلفن" class="form_textboxes form_textboxes_1">
                        </div>
                        <div class="col-md-4 ">
                            <input name="email" type="email" placeholder="ایمیل" class="form_textboxes form_textboxes_1">
                        </div>
                        <div class="col-md-4 dr">
                            <input  name="name" type="text" placeholder="نام و نام خانوادگی" class="form_textboxes form_textboxes_1">
                        </div>
                        <div class="col-xs-12 dr">
                            <textarea name="message" placeholder="پیام شما ..." class="form_textboxes form_textboxes_2"></textarea>
                        </div>
                        <button type="submit" name="_token" value="{{ csrf_token() }}"  class="contact_form_button "> ارسال پیام</button>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /Page Content Contact Form -->
    <!-- Google Map -->


















@endsection
