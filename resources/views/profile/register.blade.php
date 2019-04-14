@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-12" style="min-height: 583px">

            <div class="widget with-padding" >
                <div>
                    <form  id="postForm" name="_token" method="POST" enctype="multipart/form-data"
                           action="<?= Url('/home/profile/profileComplete/'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <div>
                            <h2 class="StepTitle"> اطلاعات عمومی</h2>
                            <div class="col-md-6">
                                <div class="inline-form">
                                    <label class="c-label">نام خانوادگی</label><input required class="input-style" type="text" placeholder="" name="family" value="{{$user->family}} " />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inline-form">
                                    <label class="c-label"> نام</label><input required class="input-style" type="text" placeholder=""  name="name" value="{{$user->name}} "/>
                                </div>
                            </div>



                            @if($user->profile !== null)
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> عنوان شغلی </label><input required  type="text" placeholder="" name="job" value="{{$user->profile->job}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">رشته و تحصیلات</label><input required type="text" placeholder="" name="education" value="{{$user->profile->education}}" />
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> عنوان شغلی </label><input required  type="text" placeholder="" name="job" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">رشته و تحصیلات</label><input required type="text" placeholder="" name="education" value="" />
                                    </div>
                                </div>
                            @endif

                        </div>
                        @if($user->profile !== null)
                            <div>
                                <h2 style="margin-top: 40px !important;" class="StepTitle">اطلاعات شخصی  </h2>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">تلفن ثابت  </label><input required type="text" placeholder="" name="tell" value="{{$user->profile->tell}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> تلفن همراه</label><input  type="text" placeholder="" name="mobile" value="{{$user->profile->mobile}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> طریقه آشنایی با سایت</label><input  type="text" placeholder="" name="introduce" value="{{$user->profile->introduce}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">سایت</label><input  type="text" placeholder="" name="site" value="{{$user->profile->site}}"/>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div>
                                <h2 style="margin-top: 40px !important;" class="StepTitle">اطلاعات شخصی  </h2>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">تلفن ثابت  </label><input required type="text" placeholder="" name="tell" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> تلفن همراه</label><input  type="text" placeholder="" name="mobile" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label"> طریقه آشنایی با سایت</label><input  type="text" placeholder="" name="introduce" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inline-form">
                                        <label class="c-label">سایت</label><input  type="text" placeholder="" name="site" value=""/>
                                    </div>
                                </div>
                            </div>
                        @endif




                        <div class="col-md-12" style="margin-top: 40px !important;">
                            <div >
                                <button name="_token" value="{{ csrf_token() }}" class="btn green-bg">ثبت و تکمیل پروفایل </button>
                                <!-- <a href="<?= Url('home/profile/edit'); ?>" class="btn skyblue-bg"><i class="fa fa-check"></i>  ثبت   </a>  -->
                                <a href="<?= Url('home/profile/show/137-'.Auth::id().'-42-'.Auth::user()->username); ?>" class="btn red-bg">تکمیل در زمانی دیگر </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      </div>

@endsection