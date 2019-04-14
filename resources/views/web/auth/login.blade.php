@extends('layouts.layout')

@section('content')

    <!-- Navigation Area End -->
    <!-- Page Header Start -->
    <div id="pageHeader" data-bg-img="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title">
                        <h2>ورود کاربر</h2>
                    </div>
                    <div class="breadcrumb-holder">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">صفحه اصلی</a></li>
                            <li class="active">ورود</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Login Area Start -->
    <div id="login">
        <div class="container">
            <form action="{{ url('/login') }}" method="post" id="loginForm">
                {{ csrf_field() }}
                <div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
                    <label for="loginEmail">ایمیل*</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="ایمیل">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="loginPassword">رمز عبور</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" placeholder="رمز عبور">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                مرا بخاطر بسپار&nbsp;<input type="checkbox" name="remember">
                            </label>
                        </div>
                    </div>
                </div>
                <p class="help-block clearfix">
                    <a href="{{ url('/password/reset') }}" class="pull-left"><i class="fa fa-fw fa-key"></i>فراموشی رمز عبور</a>
                </p>
                <button type="submit" class="btn btn-block submit-button">ورود</button>
            </form>
        </div>
    </div>
    <!-- Login Area End -->





@endsection
