@extends('layouts.layout')

@section('content')

    <style>
        .right12{
            float: right;
            text-align: left;
            margin-top: 10px;

        }
        .margin-12{

            direction: rtl ;
            margin-top: 42px;
            margin-bottom: 39px;
        }

    </style>


    <div class="container">
        <div class="row margin-12">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">لطفا اطلاعات زیر را جهت ثبت نام وارد نمایید. </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 right12">نام و نام خانوادگی </label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-user"></div>
                                        <input id="name" type="text" class="form-control"  placeholder="نام" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 right12">نام کاربری</label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-user"></div>
                                        <input id="name" type="text"  placeholder="نام خانوادگی" class="form-control" name="username" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 right12">ایمیل</label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-mail"></div>
                                        <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 right12">پسورد</label>

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
                                <label for="password-confirm" class="col-md-3 right12">تکرار پسورد </label>

                                <div class="col-md-6 right12">
                                    <div class="input-group">
                                        <div class="input-group-addon icon-lock"></div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت نام
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
