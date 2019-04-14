@extends('layouts.layout')

@section('content')
    <style>
        .right12{
            float: right;
            text-align: left
        }
        .margin-12{

            direction: rtl ;
            margin-top: 100px;
            margin-bottom: 177px;
        }

    </style>



    <div class="container">
        <div class="row margin-12" >


            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">لطفا برای ادامه وارد شوید و یا&ensp;<a href="<?= Url('/register' ); ?>" class="btn btn-success" style="margin-top: 10px" >ثبت نام</a>&ensp;نمایید.</div>
                    <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                                <label for="email" class="col-md-3 right12"  >ایمیل</label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-mail"></div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                                <label for="password" class="col-md-3 right12">کلمه عبور</label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-lock"></div>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا بخاطر بسپار
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 ">
                                    <button type="submit" class="btn btn-primary">
                                        ورود
                                    </button>


                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <small>فراموشی کلمه عبور</small>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
