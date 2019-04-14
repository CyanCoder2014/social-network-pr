
@extends('web.layouts.layout')


@section('content')



	<div class="view ">
		<div class="parallax7"></div>
		{{--<div class="mask  waves-effect waves-light rgba-teal-strong text-center white-text p-5">--}}

			{{--<h1 class="mt-5 pt-5 pb-3 font-weight-bold">@if(App::getLocale() == 'en')--}}
					{{--{{\Illuminate\Support\Str::words($cat->title, $words = 6, $end = '...') }}--}}
				{{--@elseif(App::getLocale() == 'fa')--}}
					{{--{{\Illuminate\Support\Str::words($cat->title_fa, $words = 6, $end = '...') }}--}}
				{{--@endif</h1>--}}
			{{--<p></p>--}}
		{{--</div>--}}
	</div>
	<div class="container">
		<div class="row ">
			<div class="col-md-8">
				<div class="row">
					@foreach($contents as $content)
                        <?php
                        if ($content->images == null)
                            $content->images = '/images/001.jpg'
                        ?>
							<div class="col-md-6 mt-5">
								<div class="card parent-gros overflow-h">

									<!-- Card image -->
									<img class="card-img-top gros" src="{{asset($content->images)}}"
										 alt="@if(App::getLocale() == 'en')
													{{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}
										 @elseif(App::getLocale() == 'fa')
										 {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}
										 @endif">

									<!-- Card content -->
									<div class="card-body">

										<!-- Title -->
										<div class="font-weight-bold"><a class="hover-cyan">@if(App::getLocale() == 'en')
													{{\Illuminate\Support\Str::words($content->title, $words = 6, $end = '...') }}
												@elseif(App::getLocale() == 'fa')
													{{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }}
												@endif
											</a></div>
										<div class="grey-text font-small font-weight-bold">@if(App::getLocale() == 'en')
												{{ explode(' ',$content->created)[0] }}
											@elseif(App::getLocale() == 'fa')
												{!! Jdate::to_date_jalali($content->created,'Y/d/m') !!}
											@endif</div>
										<!-- Text -->
										<p class="card-text mt-3">@if(App::getLocale() == 'en')
												{!! $content->introtext  !!}
											@elseif(App::getLocale() == 'fa')
												{!! $content->introtext_fa  !!}
											@endif</p>
										<!-- Button -->
										<a href="<?= URL::to(App::getLocale()) . '/content/'.$content->id; ?>" class="btn btn-primary rad-20">@lang('home.read')</a>

									</div>

								</div>
							</div>
					@endforeach

				</div>

			</div>
			<div class="col-md-4 pl-5">
				<div class="row border rad-20 p-4 mt-5 mb-5">
					<div class="col-md-12">
						<h5 style="">اخبار   </h5>
						<div class="title_br"></div>
						<ul>
							@foreach($content_11 as $content_11)
								<li><a href="<?= Url('/content/'.$content_11->id); ?>">
										@if(App::getLocale() == 'en')
											{{$content_11->title}}
										@elseif(App::getLocale() == 'fa')
											{{$content_11->title_fa}}
										@endif</a></li>
							@endforeach
							@foreach($content_22 as $content_22)
								<li><a href="<?= Url('/content/'.$content_22->id); ?>">
										@if(App::getLocale() == 'en')
											{{$content_22->title}}
										@elseif(App::getLocale() == 'fa')
											{{$content_22->title_fa}}
										@endif</a></li>
							@endforeach

						</ul>

					</div>
				</div>
				<div class="row border rad-20 p-4 mt-5 mb-5">
					<div class="col-md-12">
						<h5>  مقالات</h5>
						<div class="title_br"></div>
						<ul>
							@foreach($content_19 as $content_19)
								<li><a href="<?= Url('/content/'.$content_19->id); ?>">@if(App::getLocale() == 'en')
											{{$content_19->title}}
										@elseif(App::getLocale() == 'fa')
											{{$content_19->title_fa}}
										@endif</a></li>
							@endforeach
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>




	{{--<div class="page-content">--}}
		{{--<div class="row clearfix">--}}
			{{--<div class="grid_9">--}}
				{{--<div class="post clearfix">--}}
					{{--<div id="jquery_jplayer_1" class="jp-jplayer"></div>--}}
					{{--<div id="jp_container_1" class="jp-audio">--}}
						{{--<div class="jp-type-single">--}}
							{{--<div class="jp-gui jp-interface">--}}
								{{--<ul class="jp-controls">--}}
									{{--<li><a href="javascript:;" class="jp-play" tabindex="1"><i class="icon-play"></i></a></li>--}}
									{{--<li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="icon-pause"></i></a></li>--}}
									{{--<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute"><i class="icon-volume-up"></i></a></li>--}}
									{{--<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"><i class="icon-volume-down"></i></a></li>--}}
								{{--</ul>--}}
								{{--<div class="jp-progress">--}}
									{{--<div class="jp-seek-bar">--}}
										{{--<div class="jp-play-bar"></div>--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div>--}}
								{{--<div class="jp-time-holder">--}}
									{{--<div class="jp-current-time"></div>--}}
									{{--<div class="jp-duration"></div>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div><!-- end player -->--}}

					{{--<div class="post-title-row clearfix">--}}
						{{--<div class="meta-date">--}}
							{{--<span class="day">17</span>--}}
							{{--<span class="month">SEP</span>--}}
						{{--</div><!-- meta date -->--}}

						{{--<h3 class="post-title"><a href="blog-single.html">Audiojungle Best Fl Studio Projects September</a></h3>--}}
						{{--<div class="meta-more">--}}
							{{--<span><i class="icon-user"></i> <a href="#">behzad</a></span>--}}
							{{--<span><i class="icon-comments"></i> <a href="#">13 Comments</a></span>--}}
							{{--<span><i class="icon-link"></i> in <a href="#">Audio</a>, <a href="#">Player</a>, <a href="#">Audiojungle</a></span>--}}
						{{--</div><!-- meta date -->--}}
					{{--</div><!-- title -->--}}

					{{--<div class="post-content">--}}
						{{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi ...</p>--}}
					{{--</div><!-- post content -->--}}
					{{--<a href="blog-single.html" class="btn btn-1 btn-1e read-more">Read More</a>--}}
				{{--</div><!-- post -->--}}

				{{--<div class="post clearfix">--}}
					{{--<div class="thumbnail"><img src="images/assets/post-1.jpg"></div>--}}
					{{--<div class="post-title-row clearfix">--}}
						{{--<div class="meta-date">--}}
							{{--<span class="day">22</span>--}}
							{{--<span class="month">SEP</span>--}}
						{{--</div><!-- meta date -->--}}

						{{--<h3 class="post-title"><a href="blog-single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a></h3>--}}

						{{--<div class="meta-more">--}}
							{{--<span><i class="icon-user"></i> <a href="#">Alexander</a></span>--}}
							{{--<span><i class="icon-comments"></i> <a href="#">7 Comments</a></span>--}}
							{{--<span><i class="icon-link"></i> in <a href="#">News</a>, <a href="#">Posts</a></span>--}}
						{{--</div><!-- meta date -->--}}
					{{--</div><!-- title -->--}}

					{{--<div class="post-content">--}}
						{{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi ...</p>--}}
					{{--</div><!-- post content -->--}}
					{{--<a href="blog-single.html" class="btn btn-1 btn-1e read-more">Read More</a>--}}
				{{--</div><!-- post -->--}}

				{{--<div class="post clearfix">--}}
					{{--<div class="post-content">--}}
						{{--<div class="blockquote-post">--}}
							{{--<i class="icon-quote-left icon-4x pull-left icon-muted"></i>--}}
							{{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
							{{--<span> - Alexander Yani</span>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div><!-- post -->--}}

				{{--<div class="post clearfix">--}}
					{{--<div class="thumbnail">--}}
						{{--<div class="postslider clearfix flexslider">--}}
							{{--<ul class="slides">--}}
								{{--<li><img src="images/slides/flex1.jpg" alt="#"></li>--}}
								{{--<li><img src="images/slides/flex2.jpg" alt="#"></li>--}}
								{{--<li><img src="images/slides/flex3.jpg" alt="#"></li>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="post-title-row clearfix">--}}
						{{--<div class="meta-date">--}}
							{{--<span class="day">19</span>--}}
							{{--<span class="month">SEP</span>--}}
						{{--</div><!-- meta date -->--}}

						{{--<h3 class="post-title"><a href="blog-single.html">Awesome Gallery With Post FlexSlider</a></h3>--}}

						{{--<div class="meta-more">--}}
							{{--<span><i class="icon-user"></i> <a href="#">behzad</a></span>--}}
							{{--<span><i class="icon-comments"></i> <a href="#">3 Comments</a></span>--}}
							{{--<span><i class="icon-link"></i> in <a href="#">Gallery</a>, <a href="#">Shots</a></span>--}}
						{{--</div><!-- meta date -->--}}
					{{--</div><!-- title -->--}}

					{{--<div class="post-content">--}}
						{{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi ...</p>--}}
					{{--</div><!-- post content -->--}}
					{{--<a href="blog-single.html" class="btn btn-1 btn-1e read-more">Read More</a>--}}
				{{--</div><!-- post -->--}}

				{{--<div class="post clearfix">--}}
					{{--<div class="thumbnail">--}}
						{{--<iframe src="http://player.vimeo.com/video/4749536?title=1&amp;byline=1&amp;portrait=1" width="100%" height="360"></iframe>--}}
					{{--</div>--}}
					{{--<div class="post-title-row clearfix">--}}
						{{--<div class="meta-date">--}}
							{{--<span class="day">19</span>--}}
							{{--<span class="month">SEP</span>--}}
						{{--</div><!-- meta date -->--}}

						{{--<h3 class="post-title"><a href="blog-single.html">External Video Post from Vimeo and Youtube</a></h3>--}}

						{{--<div class="meta-more">--}}
							{{--<span><i class="icon-user"></i> <a href="#">behzadg</a></span>--}}
							{{--<span><i class="icon-comments"></i> <a href="#">4 Comments</a></span>--}}
							{{--<span><i class="icon-link"></i> in <a href="#">Video</a>, <a href="#">Flash</a></span>--}}
						{{--</div><!-- meta date -->--}}
					{{--</div><!-- title -->--}}

					{{--<div class="post-content">--}}
						{{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi ...</p>--}}
					{{--</div><!-- post content -->--}}
					{{--<a href="blog-single.html" class="btn btn-1 btn-1e read-more">Read More</a>--}}
				{{--</div><!-- post -->--}}

				{{--<div class="pagination mbs">--}}
					{{--<a class="current"> 1 </a>--}}
					{{--<a href="#"> 2 </a>--}}
					{{--<a href="#"> 3 </a>--}}
					{{--<a href="#"> 4 </a>--}}
					{{--<a class="current"> ... </a>--}}
					{{--<a href="#"> 21 </a>--}}
				{{--</div>--}}
			{{--</div><!-- grid 9 posts -->--}}

			{{--<!-- start sidebar -->--}}
			{{--<div class="grid_3">--}}
				{{--<div class="widget meta-links">--}}
					{{--<div class="widget-title mb clearfix">--}}
						{{--<img src="images/cats.png"><h4> Categories <small> Archive By Category </small></h4>--}}
					{{--</div>--}}

					{{--<div class="widget-content">--}}
						{{--<ul>--}}
							{{--<li><a href="#">Photoshop</a><span> (10) </span></li>--}}
							{{--<li><a href="#">Wordpress</a><span> (4) </span></li>--}}
							{{--<li><a href="#">HTML</a><span> (8) </span></li>--}}
							{{--<li><a href="#">Javascript</a><span> (12) </span></li>--}}
							{{--<li><a href="#">Modern Design</a><span> (31) </span></li>--}}
						{{--</ul>--}}
					{{--</div>--}}
				{{--</div><!-- end widget cats -->--}}

				{{--<div class="widget tags">--}}
					{{--<div class="widget-title mb clearfix">--}}
						{{--<img src="images/floppy.png"><h4> Tags <small> Popular Keywords </small></h4>--}}
					{{--</div>--}}

					{{--<div class="widget-content">--}}
						{{--<a href="#" title="1 Topic"><i class="icon-tag"></i>css</a>--}}
						{{--<a href="#" title="4 Topic"><i class="icon-tag"></i>html5</a>--}}
						{{--<a href="#" title="9 Topic"><i class="icon-tag"></i>business</a>--}}
						{{--<a href="#" title="2 Topic"><i class="icon-tag"></i>personal</a>--}}
						{{--<a href="#" title="1 Topic"><i class="icon-tag"></i>themeforest</a>--}}
						{{--<a href="#" title="10 Topic"><i class="icon-tag"></i>graphic</a>--}}
						{{--<a href="#" title="21 Topic"><i class="icon-tag"></i>seo</a>--}}
						{{--<a href="#" title="11 Topic"><i class="icon-tag"></i>themes</a>--}}
						{{--<a href="#" title="40 Topic"><i class="icon-tag"></i>wordpress</a>--}}
						{{--<a href="#" title="8 Topic"><i class="icon-tag"></i>framework</a>--}}
						{{--<a href="#" title="2 Topic"><i class="icon-tag"></i>lorem</a>--}}
					{{--</div>--}}
				{{--</div><!-- end widget tags -->--}}

				{{--<div class="widget">--}}
					{{--<div class="widget-title mb clearfix">--}}
						{{--<img src="images/text-widget.png"><h4> Text Widget <small> Little About Our Wrks </small></h4>--}}
					{{--</div>--}}

					{{--<div class="widget-content">--}}
						{{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.</p>--}}
					{{--</div>--}}
				{{--</div><!-- end widget text -->--}}

				{{--<div class="widget">--}}
					{{--<div class="widget-title mb clearfix">--}}
						{{--<img src="images/subscription.png"><h4> Subscription <small> By Google Feedburner </small></h4>--}}
					{{--</div>--}}

					{{--<div class="widget-content">--}}
						{{--<form method="post" id="subscriptionform" action="http://feedburner.google.com/fb/a/mailverify" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=sevenpsd', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">--}}
							{{--<input type="email" name="Email" id="inputer" placeholder="Type Your Email" required>--}}
							{{--<input type="hidden" value="sevenpsd" name="uri"/>--}}
							{{--<input type="hidden" name="loc" value="en_US"/>--}}
							{{--<input type="submit" id="subscribe-button" class="buttonanim" name="submit" value="subscribe Now">--}}
						{{--</form>--}}
					{{--</div>--}}
				{{--</div><!-- end widget subscription -->--}}

				{{--<div class="widget">--}}
					{{--<div class="widget-title mb clearfix">--}}
						{{--<img src="images/testimonials.png"><h4> Testimonials <small> Happy Clients </small></h4>--}}
					{{--</div>--}}

					{{--<div class="widget-content">--}}
						{{--<div id="testimonials" class="testimonial-wrapper clearfix flexslider tst">--}}
							{{--<ul class="slides">--}}
								{{--<li class="testimonial-s">--}}
									{{--<div class="testimonial">--}}
										{{--<i class="icon-quote-left icon-4x pull-left icon-muted"></i>--}}
										{{--<p> Awesome Team, I’m thrilled with the website Nice & Ripe designed for me.</p>--}}
										{{--<img class="img-testimonials" src="images/testimonial1.png" alt="#">--}}
										{{--<div class="testimonial-arrow"></div>--}}
									{{--</div>--}}
									{{--<p><span class="testimonial-details"><strong class="testimonial-name">Frank Martino</strong><br> - Crown Affair Hair</span></p>--}}
								{{--</li><!-- end testimonial -->--}}

								{{--<li class="testimonial-s">--}}
									{{--<div class="testimonial">--}}
										{{--<i class="icon-quote-left icon-4x pull-left icon-muted"></i>--}}
										{{--<p> Statistics suggest that when customers complain, business owners and managers ought to get excited about it. </p>--}}
										{{--<img class="img-testimonials" src="images/testimonial1.png" alt="#">--}}
										{{--<div class="testimonial-arrow"></div>--}}
									{{--</div>--}}
									{{--<p><span class="testimonial-details"><strong class="testimonial-name">Zig Ziglar</strong><br> - company Inc</span></p>--}}
								{{--</li><!-- end testimonial -->--}}
							{{--</ul>--}}
						{{--</div><!-- end testimonial slides -->--}}
					{{--</div>--}}
				{{--</div><!-- end widget subscription -->--}}

			{{--</div><!-- grid 3 Sidebar -->--}}

		{{--</div><!-- row -->--}}


	{{--</div><!-- end page content -->--}}
@endsection
