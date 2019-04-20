@extends('layouts.layout')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
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
        .control-group.required label:after{
            content: "*";
            color: red;
        }

    </style>


    <div class="container">
        <div class="row margin-12">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">لطفا اطلاعات زیر را جهت ثبت نام وارد نمایید. </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="">

                            {{ csrf_field() }}
                         <div class="form-group required {{ $errors->has('personality') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">شخصیت</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group right12">
                                     <label for="person">حقیقی</label>
                                     <input id="person" type="radio" class=""  name="personality" value="real"  autofocus @if(old('personality') != 'legal') checked @endif>
                                     <label for="company">حقوقی</label>
                                     <input id="company" type="radio" class=""  name="personality" value="legal"  autofocus @if(old('personality') == 'legal') checked @endif>
                                 </div>
                                 @if ($errors->has('personality'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('personality') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group required {{ $errors->has('gender') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">جنسیت</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group right12">
                                     <label for="male">مرد</label>
                                     <input id="male" type="radio" class=""  name="gender" value="m"  autofocus>
                                     <label for="female">زن</label>
                                     <input id="female" type="radio" class=""  name="gender" value="f"  autofocus>
                                 </div>
                                 @if ($errors->has('gender'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>

                         <div class="form-group legal-p{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 right12">نام شرکت </label>

                            <div class="col-md-6 right12">
                                <div class="input-group">
                                    <div class="input-group-addon icon-user"></div>
                                    <input id="name" type="text" class="form-control"  placeholder="نام شرکت" name="company" value="{{ old('company') }}" autofocus>
                                </div>
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group legal-p{{ $errors->has('company_type') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 right12">نوع شرکت </label>

                            <div class="col-md-6 right12">
                                <div class="input-group">
                                    <div class="input-group-addon icon-user"></div>
                                    <input id="name" type="text" class="form-control"  placeholder="نوع شرکت" name="company_type" value="{{ old('company_type') }}" autofocus>
                                </div>
                                @if ($errors->has('company_type'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('company_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 right12 legal-p">نام و نام خانوادگی نماینده </label>
                             <label for="name" class="col-md-3 right12 real-p">نام و نام خانوادگی </label>

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
                         


                         <div class="form-group{{ $errors->has('father') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 right12">نام پدر</label>

                            <div class="col-md-6 right12">
                                <div class="input-group">
                                    <div class="input-group-addon icon-user"></div>
                                    <input id="username" type="text"  placeholder="نام پدر" class="form-control" name="father" value="{{ old('father') }}" required autofocus>
                                </div>
                                @if ($errors->has('father'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('father') }}</strong>
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

                         <div class="form-group{{ $errors->has('national_code') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">کد ملی</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group">
                                     <div class="input-group-addon icon-user"></div>
                                     <input id="name" type="text" class="form-control"  placeholder="کد" name="national_code" value="{{ old('national_code') }}" required autofocus>
                                 </div>
                                 @if ($errors->has('national_code'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group required {{ $errors->has('post_code') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">کد پستی</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group">
                                     <div class="input-group-addon icon-user"></div>
                                     <input id="name" type="text" class="form-control"  placeholder="کدپستی" name="post_code" value="{{ old('post_code') }}" required autofocus>
                                 </div>
                                 @if ($errors->has('national_code'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">تلفن همراه</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group">
                                     <div class="input-group-addon icon-user"></div>
                                     <input id="name" type="text" class="form-control"  placeholder="۰۹*********" name="mobile" value="{{ old('mobile') }}" required autofocus>
                                 </div>
                                 @if ($errors->has('mobile'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group{{ $errors->has('tell') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-3 right12">تلفن ثابت</label>

                             <div class="col-md-6 right12">
                                 <div class="input-group">
                                     <div class="input-group-addon icon-user"></div>
                                     <input id="name" type="text" class="form-control"  placeholder="۰**********" name="tell" value="{{ old('tell') }}" required autofocus>
                                 </div>
                                 @if ($errors->has('tell'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('tell') }}</strong>
                                    </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-2 control-label right12">شهر / استان</label>
                             <div class="col-sm-10">
                                 <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                     <option>استان را انتخاب کنید</option>
                                     @foreach($provinces as $province)
                                         <option value="{{$province->id}}" @if($province->id == old('province_id')) selected @endif>{{$province->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-2 control-label right12">شهر</label>
                             <div class="col-sm-10">
                                 <select id="city" class="form-control" name="city_id" data-selected="{{old('city_id')}}">
                                 </select>
                             </div>
                         </div>
                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-2 control-label right12">آدرس</label>
                             <div class="col-sm-10">
                                 <textarea name="address" id="" cols="30" rows="10" class="form-control">{{ old('address') }}</textarea>
                             </div>
                         </div>

                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-12 control-label right12">سوابق تحصیلی</label>
                             <br>
                             <table  class="right12">
                                 <thead>
                                 <tr>
                                     <th>آخرین مقطع تحصیلی</th>
                                     <th colspan="2">رشته تحصیلی</th>
                                     <th colspan="2">گرایش</th>
                                     <th>سال فارغ التحصیلی</th>
                                     <th colspan="2">دانشگاه</th>
                                     <th>معدل</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                     <td>
                                         <select name="edu_grade" id="" class="form-control">
                                             <option value="دیپلم" @if(old('edu_major') == 'دیپلم') selected @endif>دیپلم</option>
                                             <option value="کاردانی" @if(old('edu_major') == 'کاردانی') selected @endif>کاردانی</option>
                                             <option value="کارشناسی" @if(old('edu_major') == 'کارشناسی') selected @endif>کارشناسی</option>
                                             <option value="کارشناسی ارشد" @if(old('edu_major') == 'کارشناسی ارشد') selected @endif>کارشناسی ارشد</option>
                                             <option value="دکتری" @if(old('edu_major') == 'دکتری') selected @endif>دکتری</option>
                                         </select>
                                     </td>
                                     <td colspan="2">
                                         <input type="text" name="edu_major" class="form-control" value="{{ old('edu_major') }}">
                                     </td>
                                     <td  colspan="2">
                                         <input type="text" name="edu_ori" class="form-control" value="{{ old('edu_ori') }}">
                                     </td>
                                     <td>
                                         <input type="text" name="edu_year" class="form-control" value="{{ old('edu_year') }}">
                                     </td>
                                     <td  colspan="2">
                                         <input type="text" name="edu_uni" class="form-control" value="{{ old('edu_uni') }}">
                                     </td>
                                     <td>
                                         <input type="text" name="edu_gpa" class="form-control" value="{{ old('edu_gpa') }}">
                                     </td>
                                 </tr>
                                 </tbody>
                             </table>
                         </div>

                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-12 control-label">سوابق کاری و حرفه ای</label>
                             <br>
                             <table>
                                 <thead>
                                 <tr>
                                     <th colspan="2">نام سازمان / شرکت</th>
                                     <th>سال شروع فعالیت</th>
                                     <th>مدت فعالیت (سال)	</th>
                                     <th colspan="3">سمت</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                     <td colspan="2">
                                         <input type="text" name="current_job_company" class="form-control" value="{{old('current_job_company')}}">
                                     </td>
                                     <td>
                                         <input type="text" name="current_job_start" class="form-control" value="{{old('current_job_start')}}">
                                     </td>
                                     <td>
                                         <input type="text" name="current_job_year" class="form-control" value="{{old('current_job_year')}}">
                                     </td>
                                     <td  colspan="2">
                                         <input type="text" name="current_job_position" class="form-control" value="{{old('current_job_position')}}">
                                     </td>

                                 </tr>


                                 </tbody>
                             </table>
                         </div>

                         <div class="legal-p">
                             <h4 class="legal-p">نفر دوم</h4>
                             <div class="form-group required {{ $errors->has('gender_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">جنسیت</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <label for="male">مرد</label>
                                         <input id="male" type="radio" class=""  name="gender_2" value="m"  autofocus>
                                         <label for="female">زن</label>
                                         <input id="female" type="radio" class=""  name="gender_2" value="f"  autofocus>
                                     </div>
                                     @if ($errors->has('gender_2'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('gender_2') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>


                             <div class="form-group {{ $errors->has('name_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">نام و نام خانوادگی </label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="name" type="text" class="form-control"  placeholder="نام" name="name_2" value="{{ old('name_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('name_2'))
                                         <span class="help-block">
                                    <strong>{{ $errors->first('name_2') }}</strong>
                                </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group{{ $errors->has('email_2') ? ' has-error' : '' }}">
                                 <label for="email" class="col-md-3 right12">ایمیل</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-mail"></div>
                                         <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email_2" value="{{ old('email_2') }}">
                                     </div>
                                     @if ($errors->has('email_2'))
                                         <span class="help-block">
                                    <strong>{{ $errors->first('email_2') }}</strong>
                                </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group{{ $errors->has('father_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">نام پدر</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="username" type="text"  placeholder="نام پدر" class="form-control" name="father_2" value="{{ old('father_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('father_2'))
                                         <span class="help-block">
                                    <strong>{{ $errors->first('father_2') }}</strong>
                                </span>
                                     @endif
                                 </div>
                             </div>


                             <div class="form-group{{ $errors->has('national_code_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">کد ملی</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="name" type="text" class="form-control"  placeholder="کد" name="national_code_2" value="{{ old('national_code_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('national_code_2'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('national_code_2') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group required {{ $errors->has('post_code_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">کد پستی</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="name" type="text" class="form-control"  placeholder="کدپستی" name="post_code_2" value="{{ old('post_code_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('post_code_2'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('post_code_2') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group{{ $errors->has('mobile_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">تلفن همراه</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="name" type="text" class="form-control"  placeholder="۰۹*********" name="mobile_2" value="{{ old('mobile_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('mobile_2'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('mobile_2') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group{{ $errors->has('tell_2') ? ' has-error' : '' }}">
                                 <label for="name" class="col-md-3 right12">تلفن ثابت</label>

                                 <div class="col-md-6 right12">
                                     <div class="input-group">
                                         <div class="input-group-addon icon-user"></div>
                                         <input id="name" type="text" class="form-control"  placeholder="۰**********" name="tell_2" value="{{ old('tell_2') }}"  autofocus>
                                     </div>
                                     @if ($errors->has('tell_2'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('tell_2') }}</strong>
                                    </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group required">
                                 <label for="input-zone" class="col-sm-2 control-label right12">شهر / استان</label>
                                 <div class="col-sm-10">
                                     <select id="province_2" class="form-control" name="province_id_2" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                         <option>استان را انتخاب کنید</option>
                                         @foreach($provinces as $province)
                                             <option value="{{$province->id}}" @if($province->id == old('province_id_2')) selected @endif>{{$province->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group required">
                                 <label for="input-zone" class="col-sm-2 control-label right12">شهر</label>
                                 <div class="col-sm-10">
                                     <select id="city_2" class="form-control" name="city_id_2" data-selected="{{old('city_id_2')}}">
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group required">
                                 <label for="input-zone" class="col-sm-2 control-label right12">آدرس</label>
                                 <div class="col-sm-10">
                                     <textarea name="address_2" id="" cols="30" rows="10" class="form-control">{{ old('address_2') }}</textarea>
                                 </div>
                             </div>

                             <div class="form-group required">
                                 <label for="input-zone" class="col-sm-12 control-label right12">سوابق تحصیلی</label>
                                 <br>
                                 <table  class="right12">
                                     <thead>
                                     <tr>
                                         <th>آخرین مقطع تحصیلی</th>
                                         <th colspan="2">رشته تحصیلی</th>
                                         <th colspan="2">گرایش</th>
                                         <th>سال فارغ التحصیلی</th>
                                         <th colspan="2">دانشگاه</th>
                                         <th>معدل</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr>
                                         <td>
                                             <select name="edu_major_2" id="" class="form-control">
                                                 <option value="دیپلم" @if(old('edu_major_2') == 'دیپلم') selected @endif>دیپلم</option>
                                                 <option value="کاردانی" @if(old('edu_major_2') == 'کاردانی') selected @endif>کاردانی</option>
                                                 <option value="کارشناسی" @if(old('edu_major_2') == 'کارشناسی') selected @endif>کارشناسی</option>
                                                 <option value="کارشناسی ارشد" @if(old('edu_major_2') == 'کارشناسی ارشد') selected @endif>کارشناسی ارشد</option>
                                                 <option value="دکتری" @if(old('edu_major_2') == 'دکتری') selected @endif>دکتری</option>
                                             </select>
                                         </td>
                                         <td colspan="2">
                                             <input type="text" name="edu_major_2" class="form-control" value="{{ old('edu_major_2') }}">
                                         </td>
                                         <td  colspan="2">
                                             <input type="text" name="edu_ori_2" class="form-control" value="{{ old('edu_ori_2') }}">
                                         </td>
                                         <td>
                                             <input type="text" name="edu_year_2" class="form-control" value="{{ old('edu_year_2') }}">
                                         </td>
                                         <td  colspan="2">
                                             <input type="text" name="edu_uni_2" class="form-control" value="{{ old('edu_uni_2') }}">
                                         </td>
                                         <td>
                                             <input type="text" name="edu_gpa_2" class="form-control" value="{{ old('edu_gpa_2') }}">
                                         </td>
                                     </tr>
                                     </tbody>
                                 </table>
                             </div>

                             <div class="form-group required">
                                 <label for="input-zone" class="col-sm-12 control-label">سوابق کاری و حرفه ای</label>
                                 <br>
                                 <table>
                                     <thead>
                                     <tr>
                                         <th colspan="2">نام سازمان / شرکت</th>
                                         <th>سال شروع فعالیت</th>
                                         <th>مدت فعالیت (سال)	</th>
                                         <th colspan="3">سمت</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr>
                                         <td colspan="2">
                                             <input type="text" name="current_job_company_2" class="form-control" value="{{old('current_job_company_2')}}">
                                         </td>
                                         <td>
                                             <input type="text" name="current_job_start_2" class="form-control" value="{{old('current_job_start_2')}}">
                                         </td>
                                         <td>
                                             <input type="text" name="current_job_year_2" class="form-control" value="{{old('current_job_year_2')}}">
                                         </td>
                                         <td  colspan="2">
                                             <input type="text" name="current_job_position_2" class="form-control" value="{{old('current_job_position_2')}}">
                                         </td>

                                     </tr>


                                     </tbody>
                                 </table>
                             </div>
                         </div>

                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-2 control-label right12">معرف</label>
                             <div class="col-sm-10">
                                 <input type="text" name="recommender" class="form-control" value="{{ old('recommender') }}">
                             </div>
                         </div>
                         <div class="form-group required">
                             <label for="input-zone" class="col-sm-2 control-label right12">پیشنهادات و نظرات</label>
                             <div class="col-sm-10">
                                 <textarea name="suggestion" id="" cols="30" rows="10" class="form-control">{{ old('suggestion') }}</textarea>
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



    <!-- Gateway Verify Logo -->
    <script language="javascript" type="text/javascript"  src="http://www.arianpal.com/xContext/Component/Verify/?UI=fc334fded9694ba387e152daf1c055e8&GID=527340012&MID=BBBF07847C12D585BBF16E2FC099CDEAA53DC7D6&Mode=7" >
    </script>
    <noscript><a title="درگاه پرداخت"  href="http://www.arianpal.com" >درگاه پرداخت آرین پال</a></noscript>
    <!-- Gateway Verify Logo -->

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function getCities(th)
        {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        function getCities_2(th)
        {

            selected_city = $('#city_2').attr('data-selected') || null;


            $('#city_2').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city_2').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city_2').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city_2').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        $(document).ready(function() {

            $('#province').select2();
            $('#city').select2();
            @if(old('province_id'))
            getCities($('#province'));
            @endif
            $('#province_2').select2();
            $('#city_2').select2();
            @if(old('province_id_2'))
            getCities_2($('#province_2'));
            @endif
            switch ($("input[name='personality']:checked").val()) {
                case 'legal':
                    $('.real-p').hide();
                    $('.legal-p').show();
                    break;
                case 'real':
                    $('.real-p').show();
                    $('.legal-p').hide();
                    break;
            }

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });
        $(document).on('change', '#province_2', function (e) {
            getCities_2(this);
//            $(this).siblings('.city').select2();

        });
        $("input[name='personality']").on('change', function (e) {
            switch ($(this).val()) {
                case 'legal':
                    $('.real-p').hide();
                    $('.legal-p').show();
                    break;
                case 'real':
                    $('.real-p').show();
                    $('.legal-p').hide();
                    break;
            }

        });
    </script>
@endsection