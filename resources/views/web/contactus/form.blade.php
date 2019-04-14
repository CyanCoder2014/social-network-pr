@extends('layouts.layout')

@section('content')
    <!-- Page Header Start -->
    <div id="pageHeader" data-bg-img="img/background-img/page-header-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title">
                        <h2>@lang('home.Contact')</h2>
                    </div>
                    <div class="breadcrumb-holder">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/'.App::getLocale()) }}">@lang('home.home')</a></li>
                            <li class="active">@lang('home.Contact')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Contact Area Start -->
    <!-- Contact Area Start -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <!-- Contact Address Area Start -->
                    <div class="contact-address">
                        <h2>get in touch</h2>
                        <!-- Contact Address Area Start -->
                        <address>
                            <p><i class="fa fa-home"></i> <span>@if(App::getLocale() == 'en')
                                        {{ $contact->data['adress'] }}
                                    @elseif(App::getLocale() == 'fa')
                                        {{ $contact->data['adress_fa'] }}
                                    @endif</span></p>
                            <p><i class="fa fa-envelope"></i> <span>{{ $contact->data['email'] }}</span></p>
                            <p><i class="fa fa-phone"></i> <span>{{ $contact->data['phone'] }}</span></p>
                            <p><i class="fa fa-fax"></i> <span>{{ $contact->data['phone'] }}</span></p>
                        </address>
                        <!-- Contact Address Area End -->
                        <!-- Contact Social Links Start -->
                        <div class="contact-social-links">
                            <ul>
                                <li><a href="{{$contact->data['twitter_link']}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$contact->data['linkedin_link']}}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{$contact->data['instagram_link']}}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Contact Social Links End -->
                    </div>
                    <!-- Contact Address Area End -->
                </div>
                <div class="col-sm-8 contact-form">
                    <form action="{{ route('send.contactus') }}" method="post" id="contactForm">
                        <div class="contact-form-status"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="@lang('home.Name')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="@lang('home.Email')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" name="tell" class="form-control" placeholder="@lang('home.Tell')">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="@lang('home.Subject')">
                        </div>
                        <div class="form-group">
                            <textarea name="contactMessage" class="form-control" cols="30" rows="10" placeholder="@lang('home.Message')"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom-reverse submit-button">@lang('home.Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->
    <!-- MAP Area Start -->
    <div id="map"></div>
    <!-- MAP Area End -->

@endsection