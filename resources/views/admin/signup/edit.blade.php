@extends('layouts.admin')
@section('admin_content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                    <h1>ویرایش ثبت نام</h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <form class="form-horizontal" role="form" method="POST" action="">

                                        {{ csrf_field() }}

                                        <div class="form-group required {{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label for="status" class="col-md-3 right12">وضعیت</label>
                                            <select name="status" id="status" class="form-control">
                                                @foreach($signup->getStatuses() as $key => $status)
                                                    <option value="{{ $key }}" @if($key == $signup->status) selected @endif>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group required {{ $errors->has('active') ? ' has-error' : '' }}">
                                            <label for="active" class="col-md-3 right12">نوع پرداخت</label>
                                            <select name="active" id="status" class="form-control">
                                                    <option value="0" > اینترنتی (تایید نهایی نشده)</option>
                                                    <option value="1" @if(1 == $signup->active) selected @endif>تایید دستی پرداخت (تایید نهایی شده)</option>
                                            </select>
                                        </div>
                                        <div class="form-group required {{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">جنسیت</label>
                                                <div class="input-group right12">
                                                    <label for="male">مرد</label>
                                                    <input id="male" type="radio" class=""  name="gender" value="m"  autofocus>
                                                    <label for="female">زن</label>
                                                    <input id="female" type="radio" class=""  name="gender" value="f"  autofocus>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                            <label for="name" class="right12">نام شرکت </label>
                                                    <input id="name" type="text" class="form-control"  placeholder="نام شرکت" name="company" value="{{ $signup->company }}" autofocus>
                                                @if ($errors->has('company'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                                @endif
                                        </div>
                                        <div class="form-group legal-p{{ $errors->has('company_type') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">نوع شرکت </label>

                                                    <input id="name" type="text" class="form-control"  placeholder="نوع شرکت" name="company_type" value="{{ $signup->company_type }}" autofocus>
                                                @if ($errors->has('company_type'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('company_type') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12 real-p">نام و نام خانوادگی </label>
                                            <input id="name" type="text" class="form-control"  placeholder="نام" name="name" value="{{ $signup->name }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                                @endif
                                        </div>



                                        <div class="form-group{{ $errors->has('father') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">نام پدر</label>
                                            <input id="username" type="text"  placeholder="نام پدر" class="form-control" name="father" value="{{ $signup->father_name }}" required autofocus>
                                                @if ($errors->has('father'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('father') }}</strong>
                                </span>
                                                @endif
                                        </div>


                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-3 right12">ایمیل</label>
                                            <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email" value="{{ $signup->email }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                        </div>


                                        <div class="form-group{{ $errors->has('national_code') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">کد ملی</label>
                                            <input id="name" type="text" class="form-control"  placeholder="کد" name="national_code" value="{{ $signup->national_code }}" required autofocus>
                                                @if ($errors->has('national_code'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group required {{ $errors->has('post_code') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">کد پستی</label>
                                            <input id="name" type="text" class="form-control"  placeholder="کدپستی" name="post_code" value="{{ $signup->post_code }}" required autofocus>
                                                @if ($errors->has('national_code'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_code') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">تلفن همراه</label>
                                            <input id="name" type="text" class="form-control"  placeholder="۰۹*********" name="mobile" value="{{ $signup->mobile }}" required autofocus>
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('tell') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-3 right12">تلفن ثابت</label>
                                            <input id="name" type="text" class="form-control"  placeholder="۰**********" name="tell" value="{{ $signup->tell }}" required autofocus>
                                                @if ($errors->has('tell'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('tell') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-zone" class="col-sm-2 control-label right12">شهر / استان</label>
                                            <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                                    <option>استان را انتخاب کنید</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{$province->id}}" @if($province->id == $signup->city->province->id) selected @endif>{{$province->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-zone" class="col-sm-2 control-label right12">شهر</label>
                                            <select id="city" class="form-control" name="city_id" data-selected="{{$signup->city_id}}">
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-zone" class="col-sm-2 control-label right12">آدرس</label>
                                                <textarea name="address" id="" cols="30" rows="10" class="form-control">{{ $signup->address }}</textarea>
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
                                                            <option value="دیپلم" @if($signup->edu_major == 'دیپلم') selected @endif>دیپلم</option>
                                                            <option value="کاردانی" @if($signup->edu_major == 'کاردانی') selected @endif>کاردانی</option>
                                                            <option value="کارشناسی" @if($signup->edu_major == 'کارشناسی') selected @endif>کارشناسی</option>
                                                            <option value="کارشناسی ارشد" @if($signup->edu_major == 'کارشناسی ارشد') selected @endif>کارشناسی ارشد</option>
                                                            <option value="دکتری" @if($signup->edu_major == 'دکتری') selected @endif>دکتری</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="text" name="edu_major" class="form-control" value="{{ $signup->edu_major }}">
                                                    </td>
                                                    <td  colspan="2">
                                                        <input type="text" name="edu_ori" class="form-control" value="{{ $signup->edu_ori }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="edu_year" class="form-control" value="{{ $signup->edu_year }}">
                                                    </td>
                                                    <td  colspan="2">
                                                        <input type="text" name="edu_uni" class="form-control" value="{{ $signup->edu_uni }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="edu_gpa" class="form-control" value="{{ $signup->edu_gpa }}">
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
                                                        <input type="text" name="current_job_company" class="form-control" value="{{$signup->current_job_company}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="current_job_start" class="form-control" value="{{$signup->current_job_start}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="current_job_year" class="form-control" value="{{$signup->current_job_year}}">
                                                    </td>
                                                    <td  colspan="2">
                                                        <input type="text" name="current_job_position" class="form-control" value="{{$signup->current_job_position}}">
                                                    </td>

                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>



                                        <div class="form-group required">
                                            <label for="input-zone" class="col-sm-2 control-label right12">معرف</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="recommender" class="form-control" value="{{ $signup->recommender }}">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-zone" class="col-sm-2 control-label right12">پیشنهادات و نظرات</label>
                                            <div class="col-sm-10">
                                                <textarea name="suggestion" id="" cols="30" rows="10" class="form-control">{{ $signup->suggestion }}</textarea>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary">
                                                    ویرایش
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>
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

        $(document).ready(function() {

            $('#province').select2();
            $('#city').select2();
            getCities($('#province'));


        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });

    </script>
@endsection