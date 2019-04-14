
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
					@if(!isset($catid))
					<li class="nav-item tab-width"><a class="nav-link active black-text lineheight-50p" id="home-tab" data-toggle="tab" href="#all"
											role="tab"
											aria-controls="home" aria-selected="true">
							@if(App::getLocale() == 'en')

								All
							@elseif(App::getLocale() == 'fa')
								همه موارد
							@endif
						</a></li>
					@endif
					@foreach($prcategories as $category)
						<li class="nav-item tab-width">
							<a class="nav-link black-text lineheight-50p" id="cat{{$category->id}}-tab" data-toggle="tab" href="#cat{{$category->id}}"
							   role="tab"
							   aria-controls="profile" aria-selected="@if(isset($catid) && $catid == $category->id)true @else fasle @endif">
								@if(App::getLocale() == 'en')
									{{ $category->title  }}
								@elseif(App::getLocale() == 'fa')
									{{ $category->title_fa  }}
								@endif
							</a></li>

					@endforeach
				</ul>
				<div class="tab-content " id="myTabContent">
					<div class="tab-pane fade show active p-4 " id="all" role="tabpanel"
						 aria-labelledby="all-tab">
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
					@foreach($prcategories as $category)
						<div class="tab-pane fade " id="cat{{$category->id}}" role="tabpanel" aria-labelledby="cat{{$category->id}}-tab">
							<div class="row">
								@foreach($contents as $content)
									@if($content->catid == $category->id)
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
	<div class="view">
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


@endsection
