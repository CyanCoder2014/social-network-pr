@extends('web.layouts.layout')


@section('content')


    <?php
    if ($content->images == null)
        $content->images = '001.jpg'
    ?>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-8 mt-5 mb-5">
                <div class="row ">
                    <div class="col-md-12">
                        <h3 class="font-weight-bold">
                            @if(App::getLocale() == 'en')
                                {{$content->title}}
                            @elseif(App::getLocale() == 'fa')
                                {{$content->title_fa}}
                            @endif</h3>
                        <div class="p-4">
                            <span><i class="fas fa-calendar-alt"></i></span>
                            <span>@if(App::getLocale() == 'en')
                                    {{ explode(' ',$content->created)[0] }}
                                @elseif(App::getLocale() == 'fa')
                                    {!! Jdate::to_date_jalali($content->created,'Y/d/m') !!}
                                @endif</span>
                            <span><i class="fas fa-user"></i></span>
                            <span></span>
                            <span><i class="fas fa-info"></i></span>
                            <span> <a href="{{ route('content.cat',['url' => $content->catid]) }}">@if(App::getLocale() == 'en')
                                        {{ $content->category->title }}
                                    @elseif(App::getLocale() == 'fa')
                                        {{ $content->category->title_fa }}
                                    @endif</a></span>
                        </div>
                        <div class="post_content" style="background:none repeat scroll 0% 0% #eeeeee; border:1px solid #cccccc; padding:5px 10px; text-align:justify;margin: 25px 0;">
                            @if(App::getLocale() == 'en')
                                {{$content->introtext}}
                            @elseif(App::getLocale() == 'fa')
                                {{$content->introtext_fa}}
                            @endif
                            <hr style="height: 3px;border: 10px">
                        </div>
                        @if(App::getLocale() == 'en')
                            {!!$content->fulltext_fa!!}
                        @elseif(App::getLocale() == 'fa')
                            {!!$content->fulltext_fa!!}
                   @endif

                   <div class="post-comments" style="margin-top: 150px">
                       <h2 class="post-comments-title">@lang('home.Comments')</h2>
                       <ul>
                           <li>

                               @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                           @endforeach
                                       </ul>
                                   </div>
                               @endif
                               <ul>


                                   @foreach($comments as $comment)
                                       @include('contents.comment', ['comment' => $comment])
                                   @endforeach


                               </ul>
                           </li>
                       </ul>
                   </div>
                   <div class="post-comment-form">
                       <!--<h2 class="post-comments-title">Leave a Reaply</h2>-->
                       <div class="post-comment-form-group">
                           <!-- Comment Form Start -->
                           <form enctype="multipart/form-data" action="<?= Url('/comment/send'); ?>" method="post" id="postCommentForm">
                               <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                               <input type="hidden" name="post_id" value="{{  $content->id }} ">
                               <div class="row">
                                   <div class="col-md-4">
                                       <input type="text" name="name" placeholder="@lang('home.Name')" class="form-control" />
                                   </div>
                                   <div class="col-md-4">
                                       <input type="email" name="email" placeholder="@lang('home.Email')" class="form-control" />
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <textarea cols="30" name="comment" rows="6" placeholder="@lang('home.Comment')" class="form-control"></textarea>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="form-group">
                                       {!! NoCaptcha::display() !!}
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="@lang('home.Submit')" class="form-control submit-btn" />
                                        </div>
                                    </div>
                                </form>
                                <!-- Comment Form End -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4 pl-5">
                <div class="row bg-24 rad-20 p-4 mt-5 mb-5" style="background: url('{{ asset($content->images) }}')">
                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row border rad-20 p-4 mt-5 mb-5">
                    <div class="col-md-12">
                        <h3>@lang('home.Articles')</h3>
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
                <div class="row border rad-20 p-4 mt-5 mb-5">
                    <div class="col-md-12">

                        <h3 class="widget-title">@lang('home.News')</h3>
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
