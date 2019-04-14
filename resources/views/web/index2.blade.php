@extends('layouts.layout2')


@section('content')
		<div class="row-fluid static-header" >
			
			<div class="container">
				<div class="slide-content clearfix">
					<div class="left-line"></div>
					<div class="mid-text">{{$setting->data['typename']}}</div>
					<div class="right-line"></div><br>
					<div class="big-text">{{$setting->data['name']}}</div>
				</div>
			</div>
		</div>
		
		<!--===========================================COUNTER================================-->

		<div class="row-fluid main-counter-wrap">
			<div class="container clearfix">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="event-countdown" style="max-height: 300px">
							<ul id="countdown" class="list-inline countdown clearfix"><!-- countdown start   HERE -->
								<?php $array=['one','two','three','four'] ?>
								@foreach($utility['service1'] as $key => $value)
								<li class="time {{$array[$key]}}"><!-- DAYS START  HERE -->
									<p style="color: #fff" class="desc">{{$value->data['description']}}</p>
									<a href="{{$value->data['link']}}">
										<h5 style="color:white" class="days">{{$value->data['title']}}</h5>
									</a>
								</li> <!-- DAYS END  HERE -->
								@endforeach
							</ul> <!-- COUNTDOWN END  HERE -->
						</div>
					</div>
					<div style="position: absolute" class="col-xs-12 col-sm-6 col-md-6">
						<div class="events-calltoaction" style="height: 300px">
							<h5>{{$setting->data['title_']}}</h5>
							<p>{{$setting->data['description']}}</p>
							<a href="{{$setting->data['link']}}">اطلاعات بیشتر</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--================================ABOUT===========================================-->
		<section id="about-us" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">    
			<div class="container">  
				<div class="row about-block-main clearfix"><!--about us features block -->

					@foreach($utility['service2'] as $value)
					<div class="col-xs-12 col-sm-3 col-md-3"><!--about us feature 1st -->
						<div class="about-block clearfix">
							
							<div class='circle'>
								<img src="{{$value->data['image']}}" style="max-height: 57px;max-width: 57px;">
							</div>
								
							<div class="heading">
									<a href="{{$value->data['link']}}"><h6>{{$value->data['title']}}</h6></a>

								<p>{{$value->data['description']}}</p>
						</div>
					</div>
					</div><!--about us feature 1st closed -->
					@endforeach

					
				</div><!--about us features block closed -->
			</div><!--about container closed closed -->
		</section>
		<!--=============================TESTIMONIAL section==================================-->

		<section  id="testimonial" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
			<article>
				<div class="container">
					<div class="span12">
						<div class="">
							<h5>درباره ما</h5>

						</div>
						<div class="heading-bottom">
							<div class="line"></div>
							<div class="box-small"></div>
							<div class="big"></div>
							<div class="box-small"></div>
							<div class="line"></div>
						</div>
						<div  id="owl-demo-testimonial" class="testimonials-ct" style="direction:  initial;">
							@foreach($utility['about_us'] as $value)
								<div class="item">
									<div class="testi-content">{{ $value->data['title']}}<br>

									</div>
									<div class="testi-cap">{{ $value->data['description']}}</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</article>
		</section>

		<!--=============================GALLARY SECTION ==================================-->

		<section id="gallary" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s"><!-- gallary section -->
			<div class="container-fluid">
				<div class="section-title"><!--section header-->
					<h5>پروژه ها</h5>
					<div class="heading-bottom">
						<div class="line"></div>
						<div class="box-small"></div>
						<div class="big"></div>
						<div class="box-small"></div>
						<div class="line"></div>
					</div>
					<p></p>
				</div><!--section header closed-->

				<div id="filters">

					<ul class="porfolio-nav">
						<li class="active">
							<a data-filter="*" href="#">همه</a>
						</li>
						@foreach($prcategories as $prcategory)
							<li class=""><a href="#" data-filter=".{{$prcategory->id}}">

									@if(App::getLocale() == 'en')
										{{$prcategory->title}}
									@elseif(App::getLocale() == 'fa')
										{{$prcategory->title_fa}}
									@endif

								</a></li>
						@endforeach


					</ul>
				</div>
				<div class="row">
					<div style="position: relative; overflow: hidden; height: 423px;" class="row isotope" id="container-isotope">
						<!--1st portfolio-->
						@foreach($projects as $project)
						<div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;" class="col-xs-12 col-sm-4 col-md-4 isotope-item {{$project->catid}}">
							<div class="portfolio">
								<div class="gallary-content">
									<img  src="{{asset('images/' . $project->images)}}" alt="gallary"/>
									<div class="gallary-overlay">
										<div class="gallary-title">
											<h5>@if(App::getLocale() == 'en')
													{{$project->title}}
												@elseif(App::getLocale() == 'fa')
													{{$project->title_fa}}
												@endif</h5>
										</div>
										<div class="gallary-links">
											<a class="group1" href="{{route('project',['url'=>$project->id])}}"><i class="fa fa-search"></i></a>
											<a class="" href="#"><i class="fa fa-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div><!--1st portfolio end-->
						@endforeach
						

					</div><!-- gallary main div end-->
				</div><!-- row end-->
				{{--<div style="align-items: center">--}}
					{{--<a class="bluebutton" href="{{route('all_project')}}">پروژه ها بیشتر</a>--}}
				{{--</div>--}}
			</div><!-- row-fluid end-->
		</section><!-- gallary section end-->

		<!--=============================NEWS  SECTION ==================================-->

		<section  id="blog-news" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
			<div class="container  clearfix">
				<div class="section-title"><!--section header-->
					<h5>اخرین اخبار</h5>
					<div class="heading-bottom">
						<div class="line"></div>
						<div class="box-small"></div>
						<div class="big"></div>
						<div class="box-small"></div>
						<div class="line"></div>
					</div>
					<p></p>
				</div><!--section header closed-->
				<div class="row  clearfix">
					@foreach($contents as $content)
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="blog-news-wrap">
							<div class="blog-news-img">
								<img src="{{asset($content->images)}}" alt="blog post one"/>
								<div class="blog-news-overlay"></div>
							</div>

							<div class="blog-news-title">
								<h6>@if(App::getLocale() == 'en')
										{{$content->title}}
									@elseif(App::getLocale() == 'fa')
										{{$content->title_fa}}
									@endif</h6>
							</div>
							<div class="blog-news-disc">
								<p>@if(App::getLocale() == 'en')
										{{$content->introtext}}
									@elseif(App::getLocale() == 'fa')
										{{$content->introtext_fa}}
									@endif</p>
							</div>
							<div class="blog-news-btn">
								<a href="{{route('content',['url'=>$content->id])}}">اطلاعت بیشتر</a>
							</div>
						</div>
					</div>
					@endforeach

				</div>
				{{--<div style="align-items: center">--}}
					{{--<a class="bluebutton" href="{{route('all_content')}}">خبرهای بیشتر</a>--}}
				{{--</div>--}}
			</div>
		</section>

		<!--=============================FUNFACTS section==================================-->

		<section  id="funfact" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
			<div class="container clearfix">
				<div class="row counter-main clearfix"><!-- FUN FACTS COUNTER START-->

					@foreach($utility['skill'] as $item)
					<div class="col-xs-12 col-sm-3 col-md-3 margin-bottom-30"><!-- fun fact counter 1-->
						<div class="fun-wrap">
							<div class="count" id="projects" data-to="{{$item->data['number']}}" data-speed="4000"></div>
							<div class="funfact"><p>{{$item->data['title']}}</p></div>
						</div>
					</div><!-- fun fact counter 1 end-->
					@endforeach
				</div><!-- FUN FACTS COUNTER main end-->
			</div><!--2nd parallax container closed -->
		</section><!--2nd parallax section closed -->
		<!--=============================OUR TEAM SECTION==================================-->
		<section id="team" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
			<div class="container  clearfix">
				<div class="section-title"><!--section header-->
					<h5>گروه ما</h5>
					<div class="heading-bottom">
						<div class="line"></div>
						<div class="box-small"></div>
						<div class="big"></div>
						<div class="box-small"></div>
						<div class="line"></div>
					</div>
					<p></p>
				</div><!--section header closed-->
				<div class="row">
					@foreach($utility['team'] as $item)
					<div class="col-xs-12 col-sm-3 col-md-3 margin-bottom-30">
						<div class="team-main-wrap">
							<div class="team-wrapper">
								<div class="team">
									<img class="img" src="{{asset($item->data['image'])}}" alt="team2"/>
									<div class="overlay"></div>
								</div>
								<div class="title">
									<h6>{{$item->data['name']}}</h6>
									<p class="team-subheading">{{$item->data['position']}}</p>
								</div>
								<div class="social-wrap">
									<div class="social">
										<a href="{{$item->data['twitter_link']}}"><i class="fa fa-twitter"></i></a>
									</div>
									<div class="social">
										<a href="{{$item->data['linkedin_link']}}"><i class="fa fa-linkedin"></i></a>
									</div>
									<div class="social">
										<a href="{{$item->data['instagram_link']}}"><i class="fa fa-instagram"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach


				</div>
			</div><!--team container closed-->
		</section><!--team section closed-->
		<!--=============================subscription ==================================-->
		<section class="subsciption-page-9 padding-top-150 padding-bottom-150 bg-fixed" id="subsciption-page-9">
			<div class="container">
				<div class=""><!--.row -->
					<div class="subscription-page-9-main col-md-7 col-sm-12 col-xs-12 clearfix  tx-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
						<h5>@lang('home.Contact')</h5>
						<p style="color:#ffffff">

						</p>
						<div class="">
							<div class="subscription-form-2">
								<!-- SIMPLE CONTACT FORM -->
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<form name="_token" method="POST" enctype="multipart/form-data"
									  action="{{ route('send.message') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }} ">

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1"> </label>
												<input type="email" name="email" class="form-control" id="exampleInputEmail1"
													   placeholder="@lang('home.Email')">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1"></label>
												<input class="form-control" name="name" id="exampleInputPassword1"
													   placeholder="@lang('home.Name')">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1"> </label>
												<input type="number" class="form-control" name="tell" id="exampleInputEmail1"
													   placeholder="@lang('home.Tell')">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1"></label>
												<input class="form-control" name="subject" id="exampleInputPassword1"
													   placeholder="@lang('home.Subject')">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1"></label>
										<textarea class="form-control" name="message" rows="3" placeholder="@lang('home.Message')"></textarea>
									</div>
									{!! NoCaptcha::display() !!}
									<button type="submit" name="_token" value="{{ csrf_token() }}" class="bluebutton"
											style="margin-right: -30px" onsubmit="return alert('ok')">@lang('home.Send')
									</button>
								</form>
								@if(session()->has('message'))
									<div class="alert alert-success">
										{{ session()->get('message') }}
									</div>
								@endif
							</div>
						</div>
					</div>
				</div><!-- /.row -->
			</div>
		</section>

		{{--<section id="about-us-intro" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container">--}}
				{{--<div class="row about-intro-main clearfix">--}}
					{{--<div class="col-xs-12 col-sm-6 col-md-6 margin-bottom-30 doright">--}}
						{{--<div class="about-text">--}}
							{{--<div class="section-title">--}}
								{{--<h4><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;--}}
									{{--@if(App::getLocale() == 'en')--}}
										{{--{{$text3->title}}--}}
									{{--@elseif(App::getLocale() == 'fa')--}}
										{{--{{$text3->title_fa}}--}}
									{{--@endif--}}
									{{--&nbsp;</h4>--}}

								{{--<div class="clearfix"></div>--}}
							{{--</div>--}}
							{{--@if(App::getLocale() == 'en')--}}
								{{--<p class="intro">  {!!$text3->description!!}</p>--}}
								{{--<br><div class="about-btn"><a href="{{$text3->link}}" class="btn tf-btn btn-default">{{$text3->subtitle}}</a></div>--}}
							{{--@elseif(App::getLocale() == 'fa')--}}
								{{--<p class="intro">  {!!$text3->description_fa!!}</p>--}}
								{{--<br><div class="about-btn"><a href="{{$text3->link_fa}}" class="btn tf-btn btn-default">{{$text3->subtitle_fa}}</a></div>--}}
							{{--@endif--}}
							{{--<br><br>--}}
							{{--<hr>--}}

							{{--<div class="section-title">--}}
								{{--<h4><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;--}}
									{{--@if(App::getLocale() == 'en')--}}
										{{--{{$text4->title}}--}}
									{{--@elseif(App::getLocale() == 'fa')--}}
										{{--{{$text4->title_fa}}--}}
									{{--@endif--}}
									{{--&nbsp;</h4>--}}
								{{--<div class="clearfix"></div>--}}
							{{--</div>--}}

							{{--@if(App::getLocale() == 'en')--}}
								{{--<p class="intro">  {!!$text4->description!!}</p>--}}
								{{--<br><div class="about-btn"><a href="{{$text4->link}}" class="btn tf-btn btn-default">{{$text4->subtitle}}</a></div>--}}
							{{--@elseif(App::getLocale() == 'fa')--}}
								{{--<p class="intro">  {!!$text4->description_fa!!}</p>--}}
								{{--<br><div class="about-btn"><a href="{{$text4->link_fa}}" class="btn tf-btn btn-default">{{$text4->subtitle_fa}}</a></div>--}}
							{{--@endif--}}
						{{--</div>--}}
						{{--<div class="about-intro-text">--}}
							{{--<h5>AWESOME TEMPLATE</h5>--}}
							{{--<p>Phasellus facilisis mauris vel velit molestie pellentesque. Donec rutrum, tortor ut elementum venenatis, purus magna bibendum nisl, ut accumsan ipsum erat eu sapien Phasellus facilisis mauris vel velit molestie pellentesque. Donec rutrum, tortor ut elementum venenatis, purus magna bibendum nisl, ut accumsan ipsum erat eu sapien Phasellus facilisis mauris vel velit molestie pellentesque. Donec rutrum, tortor ut elementum venenatis, purus magna bibendum nisl, ut accumsan--}}
{{--ipsum erat eu sapien. </p>--}}
						{{--</div>--}}
						{{--<div class="about-btn">--}}
							{{--<a href="#">BUY NOW</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="col-xs-12 col-sm-6 col-md-6 margin-bottom-30">--}}
						{{--<div id="video">--}}
							{{--<div class="video">--}}
								{{--<img src="img/02.png" class="img-responsive">--}}
								{{--<img class="video-banner" src="{{asset('index/images/video.jpg')}}" alt="video">--}}
								{{--<div class="video-btn">--}}
									{{--<a href="https://player.vimeo.com/video/102732914?title=0&amp;byline=0&amp;portrait=0&amp;color=11b1c2&amp;wmode=opaque" class="html5lightbox content-vbtn-color-orange" data-width="570" data-height="320" title="title here "><i class="fa fa-play-circle"></i></a>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}

			{{--</div><!--about container closed closed -->--}}
		{{--</section>--}}
		{{--<!--=============================LATEST CAUSES SECTION ==================================-->--}}

		{{--<section  id="latest-causes" class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container  clearfix">--}}
				{{--<div class="section-title"><!--section header-->--}}
					{{--<h5>LATEST CAUSES</h5>--}}
					{{--<div class="heading-bottom">--}}
						{{--<div class="line"></div>--}}
						{{--<div class="box-small"></div>--}}
						{{--<div class="big"></div>--}}
						{{--<div class="box-small"></div>--}}
						{{--<div class="line"></div>--}}
					{{--</div>--}}
					{{--<p>There is no exercise better for the heart than reaching down and lifting people up.</p>--}}
				{{--</div><!--section header closed-->--}}


				{{--<div id="causes" class="content">--}}
					{{--<div class="row owl-item">--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4">--}}
							{{--<div class="latest-cause-wrap">--}}
								{{--<div class="cause-img">--}}
									{{--<img src="{{asset('index/images/causes/home2/01.jpg')}}" alt="cause one"/>--}}
									{{--<div class="cause-overlay">--}}
										{{--<div class="cause-donate-btn">--}}
											{{--<a href="#">DONATE NOW</a>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="cause-content">--}}
									{{--<div class="cause-title">--}}
										{{--<h6>Change a Life Through Education</h6>--}}
									{{--</div>--}}
									{{--<div class="cause-disc">--}}
										{{--<p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte </p>--}}
									{{--</div>--}}
									{{--<div class="skills-progress">--}}

										{{--<div class="progress_bar" data-value="79">--}}
											{{--<div class="progress-label">Loading...</div>--}}
										{{--</div><!-- Progress Bar 2 end-->--}}
										{{--<div class="bar-heading"><!-- Progress Bar2-->--}}
											{{--<p>Donate: <span>$78,354</span>/$126,500</p>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}

							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4">--}}
							{{--<div class="latest-cause-wrap">--}}
								{{--<div class="cause-img">--}}
									{{--<img src="{{asset('index/images/causes/home2/02.jpg')}}" alt="cause one"/>--}}
									{{--<div class="cause-overlay">--}}
										{{--<div class="cause-donate-btn">--}}
											{{--<a href="#">DONATE NOW</a>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="cause-content">--}}
									{{--<div class="cause-title">--}}
										{{--<h6>Change a Life Through Education</h6>--}}
									{{--</div>--}}
									{{--<div class="cause-disc">--}}
										{{--<p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte </p>--}}
									{{--</div>--}}
									{{--<div class="skills-progress">--}}

										{{--<div class="progress_bar" data-value="79">--}}
											{{--<div class="progress-label">Loading...</div>--}}
										{{--</div><!-- Progress Bar 2 end-->--}}
										{{--<div class="bar-heading"><!-- Progress Bar2-->--}}
											{{--<p>Donate: <span>$78,354</span>/$126,500</p>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}

							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4">--}}
							{{--<div class="latest-cause-wrap">--}}
								{{--<div class="cause-img">--}}
									{{--<img src="{{asset('index/images/causes/home2/03.jpg')}}" alt="cause one"/>--}}
									{{--<div class="cause-overlay">--}}
										{{--<div class="cause-donate-btn">--}}
											{{--<a href="#">DONATE NOW</a>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="cause-content">--}}
									{{--<div class="cause-title">--}}
										{{--<h6>Change a Life Through Education</h6>--}}
									{{--</div>--}}
									{{--<div class="cause-disc">--}}
										{{--<p>Lorem ipsum dolor sit amet consecte tur adipiscisl at dui tempus,dolor sit amet consecte </p>--}}
									{{--</div>--}}
									{{--<div class="skills-progress">--}}

										{{--<div class="progress_bar" data-value="79">--}}
											{{--<div class="progress-label">Loading...</div>--}}
										{{--</div><!-- Progress Bar 2 end-->--}}
										{{--<div class="bar-heading"><!-- Progress Bar2-->--}}
											{{--<p>Donate: <span>$78,354</span>/$126,500</p>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}

							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</section>--}}


		{{--<!--=============================UPCOMING EVENTS SECTION ==================================-->--}}

		{{--<section  id="upcoming-events" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container  clearfix">--}}
				{{--<div class="section-title"><!--section header-->--}}
					{{--<h5>UPCOMING EVENTS</h5>--}}
					{{--<div class="heading-bottom">--}}
						{{--<div class="line"></div>--}}
						{{--<div class="box-small"></div>--}}
						{{--<div class="big"></div>--}}
						{{--<div class="box-small"></div>--}}
						{{--<div class="line"></div>--}}
					{{--</div>--}}
					{{--<p>There is no exercise better for the heart than reaching down and lifting people up.</p>--}}
				{{--</div><!--section header closed-->--}}


				{{--<div id="events" class="content">--}}
					{{--<div class="row owl-item"><!--upcoming events item 3-->--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!--upcoming event 1-->--}}
							{{--<div class="upcoming-events-wrap clearfix">--}}
								{{--<div class="event-img">--}}
									{{--<img src="{{asset('index/images/events/home/01.jpg')}}" alt="event one"/>--}}
									{{--<div class="event-overlay"></div>--}}
								{{--</div>--}}
								{{--<div class="event-date">--}}
									{{--<h1>20</h1>--}}
									{{--<p>January<br/>2015</p>--}}
								{{--</div>--}}
								{{--<div class="event-content">--}}
									{{--<div class="event-title">--}}
										{{--<h6>WordCamp Paris</h6>--}}
									{{--</div>--}}
									{{--<div class="event-disc">--}}
										{{--<p>ComTrade, Savski nasip 7 <br>8:30 am - 4:30 pm</p>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div> <!--upcoming event 1 end-->--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!--upcoming event 2-->--}}
							{{--<div class="upcoming-events-wrap clearfix">--}}
								{{--<div class="event-img">--}}
									{{--<img src="{{asset('index/images/events/home/02.jpg')}}" alt="event one"/>--}}
									{{--<div class="event-overlay"></div>--}}
								{{--</div>--}}
								{{--<div class="event-date">--}}
									{{--<h1>20</h1>--}}
									{{--<p>January<br/>2015</p>--}}
								{{--</div>--}}
								{{--<div class="event-content">--}}
									{{--<div class="event-title">--}}
										{{--<h6>WordCamp Paris</h6>--}}
									{{--</div>--}}
									{{--<div class="event-disc">--}}
										{{--<p>ComTrade, Savski nasip 7 <br>8:30 am - 4:30 pm</p>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div> <!--upcoming event 2 end-->--}}
						{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!--upcoming event 3-->--}}
							{{--<div class="upcoming-events-wrap clearfix">--}}
								{{--<div class="event-img">--}}
									{{--<img src="{{asset('index/images/events/home/03.jpg')}}" alt="event one"/>--}}
									{{--<div class="event-overlay"></div>--}}
								{{--</div>--}}
								{{--<div class="event-date">--}}
									{{--<h1>20</h1>--}}
									{{--<p>January<br/>2015</p>--}}
								{{--</div>--}}
								{{--<div class="event-content">--}}
									{{--<div class="event-title">--}}
										{{--<h6>WordCamp Paris</h6>--}}
									{{--</div>--}}
									{{--<div class="event-disc">--}}
										{{--<p>ComTrade, Savski nasip 7 <br>8:30 am - 4:30 pm</p>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div> <!--upcoming event 3 end-->--}}
					{{--</div><!--upcoming events item end-->--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</section>--}}




		{{--<!--=============================Shop SECTION ==================================-->--}}

		{{--<section  id="our-shop" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container  clearfix"><!-- shop container-->--}}
				{{--<div class="row main-shop clearfix"><!-- shop main-->--}}

					{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!-- shop item 1-->--}}
						{{--<div class="shop-item">--}}
							{{--<div class="shop-img">--}}
								{{--<img src="{{asset('index/images/shop/shop-1/01.jpg')}}" alt="shop item"/>--}}
								{{--<div class="shop-overlay">--}}
									{{--<div class="shop-detail-button">--}}
										{{--<a href="shop-detail.html">View Detail</a>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="shop-content">--}}
								{{--<div class="shop-title">--}}
									{{--<h6>Product Title Here</h6>--}}
								{{--</div>--}}
								{{--<div class="shop-price">--}}
									{{--<h6><del>$199</del></h6>--}}
								{{--</div>--}}
								{{--<div class="shop-sale-price">--}}
									{{--<h6>$160</h6>--}}
								{{--</div>--}}

							{{--</div>--}}
							{{--<div class="shop-bottom clearfix">--}}
								{{--<div class="star-rating"><!-- rating-->--}}
									{{--<div class="score-callback" data-score="1"></div>--}}
								{{--</div><!-- rating end-->--}}
								{{--<div class="shop-cart-fav">--}}
									{{--<div class="shop-cart"><i class="fa fa-shopping-cart"></i></div>--}}
									{{--<div class="shop-fav"><i class="fa fa-heart-o"></i></div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div><!-- shop item 1 end-->--}}
					{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!-- shop item 2-->--}}
						{{--<div class="shop-item">--}}
							{{--<div class="shop-img">--}}
								{{--<img src="{{asset('index/images/shop/shop-1/01.jpg')}}" alt="shop item"/>--}}
								{{--<div class="shop-overlay">--}}
									{{--<div class="shop-detail-button">--}}
										{{--<a href="shop-detail.html">View Detail</a>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="shop-content">--}}
								{{--<div class="shop-title">--}}
									{{--<h6>Product Title Here</h6>--}}
								{{--</div>--}}
								{{--<div class="shop-price">--}}
									{{--<h6><del>$199</del></h6>--}}
								{{--</div>--}}
								{{--<div class="shop-sale-price">--}}
									{{--<h6>$160</h6>--}}
								{{--</div>--}}

							{{--</div>--}}
							{{--<div class="shop-bottom clearfix">--}}
								{{--<div class="star-rating"><!-- rating-->--}}
									{{--<div class="score-callback" data-score="1"></div>--}}
								{{--</div><!-- rating end-->--}}
								{{--<div class="shop-cart-fav">--}}
									{{--<div class="shop-cart"><i class="fa fa-shopping-cart"></i></div>--}}
									{{--<div class="shop-fav"><i class="fa fa-heart-o"></i></div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div><!-- shop item 2 end-->--}}
					{{--<div class="col-xs-12 col-sm-4 col-md-4 margin-bottom-30"><!-- shop item 3-->--}}
						{{--<div class="shop-item">--}}
							{{--<div class="shop-img">--}}
								{{--<img src="{{asset('index/images/shop/shop-1/01.jpg')}}" alt="shop item"/>--}}
								{{--<div class="shop-overlay">--}}
									{{--<div class="shop-detail-button">--}}
										{{--<a href="shop-detail.html">View Detail</a>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="shop-content">--}}
								{{--<div class="shop-title">--}}
									{{--<h6>Product Title Here</h6>--}}
								{{--</div>--}}
								{{--<div class="shop-price">--}}
									{{--<h6><del>$199</del></h6>--}}
								{{--</div>--}}
								{{--<div class="shop-sale-price">--}}
									{{--<h6>$160</h6>--}}
								{{--</div>--}}

							{{--</div>--}}
							{{--<div class="shop-bottom clearfix">--}}
								{{--<div class="star-rating"><!-- rating-->--}}
									{{--<div class="score-callback" data-score="1"></div>--}}
								{{--</div><!-- rating end-->--}}
								{{--<div class="shop-cart-fav">--}}
									{{--<div class="shop-cart"><i class="fa fa-shopping-cart"></i></div>--}}
									{{--<div class="shop-fav"><i class="fa fa-heart-o"></i></div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div><!-- shop item 3 end-->--}}

				{{--</div><!-- shop main div end-->--}}
			{{--</div>--}}
		{{--</section>--}}




		{{--<!--================================CLIENTS===========================================-->--}}

		{{--<section id="clients" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container clearfix">--}}

				{{--<div class="client">--}}
					{{--<a href="#"><img src="{{asset('index/images/clients/01.jpg')}}" alt="client"></a>--}}
				{{--</div>--}}
				{{--<div class="client">--}}
					{{--<a href="#"><img src="{{asset('index/images/clients/01.jpg')}}" alt="client"></a>--}}
				{{--</div>--}}
				{{--<div class="client">--}}
					{{--<a href="#"><img src="{{asset('index/images/clients/01.jpg')}}" alt="client"></a>--}}
				{{--</div>--}}
				{{--<div class="client">--}}
					{{--<a href="#"><img src="{{asset('index/images/clients/01.jpg')}}" alt="client"></a>--}}
				{{--</div>--}}
				{{--<div class="client">--}}
					{{--<a href="#"><img src="{{asset('index/images/clients/01.jpg')}}" alt="client"></a>--}}
				{{--</div>--}}

			{{--</div>--}}
		{{--</section>--}}
		{{--<!--=============================CALL-OUT SECTION ==================================-->--}}
		{{--<section id="call-out-msg" class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">--}}
			{{--<div class="container clearfix">--}}
				{{--<div class="call-out-msg pull-right">--}}
					{{--<h3>Help a Child Volunteer Now</h3>--}}
				{{--</div>--}}
				{{--<div class="call-out-msg-btn pull-left">--}}
					{{--<a href="#">Donate Now</a>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</section>--}}

@endsection