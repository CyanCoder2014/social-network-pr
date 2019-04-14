@extends('layouts.layout')
@section('content')
    <div id="" class="note" style="display: none">پست شما با موفقیت ارسال گردید <a id="close">[close]</a></div>
    <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">خطا در ارسال پست! <a id="close">[close]</a></div>
    <style type="text/css">
        .ajax-load {
            width: 100%;}
    </style>


    <div class="row">
        <div class="col-md-4">
            <div class="widget blank">
                <div class="birthday blue-bg">
                    <h3>&nbsp;<i class="ti-user"></i>{{$user->username}}<span> {{$user->roleLabel[0]->label}}  سایت    &nbsp;</span> &nbsp;<a href="<?= Url('home/password/reset'); ?>" style="margin-top: -8px" class="btn btn-primary"> &nbsp;تغییر پسورد&nbsp; </a></h3>
                </div>
            </div>
            <div class="widget with-padding">
                <div class="collapse-sec">
                    <div id="accordian2" class="c-collapse">

                        <h2><i class="ti-book blue-bg"></i> فیلدهای تحصیلی</h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll">
                                    <li>
                                        <span><i class="fa fa-plus red-bg"></i></span>
                                        <p>  <a data-toggle="modal" data-target="#add-education"  href="#" title=""><i class="fa fa-plus"></i> اضافه کردن فیلد جدید </a></p>
                                    </li>
                                    @foreach($user->educations as $education)
                                        <li>
                                            <span><i class="fa fa-info green-bg"></i></span>
                                            <h3 >{{$education->title}} </h3>
                                            <p>  <a  data-toggle="modal" data-target="#{{$education->id}}" href="#" title="">ویرایش </a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                    @if(2==2)
                        <h2><i class="ti-comments blue-bg"></i> حوزه های کاری</h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll1">
                                    <li>
                                        <span><i class="fa fa-plus red-bg"></i></span>
                                        <p>  <a data-toggle="modal" data-target="#add-work"  href="#" title=""><i class="fa fa-plus"></i> اضافه کردن فیلد جدید </a></p>
                                    </li>
                                    @foreach($user->works as $work)
                                    <li>
                                        <span><i class="fa fa-file green-bg"></i></span>
                                        <h3>{{$work->title.$work->major}} </h3>
                                        <p>  <a  data-toggle="modal" data-target="#work-{{$work->id}}" href="#" title="">ویرایش </a></p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <h2><i class="ti-bolt blue-bg"></i>مقالات منتشر شده </h2>
                        <div class="content">
                            <div class="our-clients-sec">
                                <ul id="people-list" class="client-list">
                                    <li>
                                        <span class="user-status red-bg"><i class="fa fa-plus red-bg-bg"></i></span>
                                        <div class="client-info">
                                            <h3><a href="#" data-toggle="modal" data-target="#add-article"  title="">افزودن مقاله جدید </a></h3>
                                        </div>
                                    </li>
                                    @foreach($user->articles as $article)
                                    <li>
                                        <span class="user-status online blue-bg"><i class="fa fa-info red-bg-bg"></i></span>
                                        <div class="client-info">
                                            <h3><a href="#" title="">{{$article->title}} </a></h3>
                                            <p>  <a  data-toggle="modal" data-target="#article-{{$article->id}}" href="#" title="">ویرایش </a></p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <h2><i class="ti-palette blue-bg"></i>تخصص های کاری و علمی</h2>
                        <div class="content">
                                <div class="full-report">
                                    <ul>
                                        <li><a href="#" data-toggle="modal" data-target="#add-skill"><span class="fa fa-plus"></span></a>اضافه کردن فیلد جدید <i></i></li>
                                    @foreach($user->skills as $skill)
                                        <li><a onclick="return confirm('آیا از حذف این مهارت مطمئن هستید؟');" href="<?= Url('home/profile/deleteSkill/'.$skill->id); ?>" ><span class="fa fa-trash"></span></a>{{$skill->title}} <i>{{$skill->score}}</i></li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                        <h2><i class="ti-info blue-bg"></i>درباره من</h2>
                        <div class="content">
                            @if($user->profile !== null)
                            <p>  {!! \Illuminate\Support\Str::words($user->profile->intro, $words = 51, $end = '...') !!} </p>
                            @endif
                                <a  data-toggle="modal" data-target="#edit-about" href="#" title="">ویرایش </a>
                        </div>

                        <h2><i class="ti-comments blue-bg"></i>   تالارهای عضو</h2>
                        <div class="content">
                            <div class="activity-feed">
                                <ul id="activity-scroll1">
                                    @foreach($user->forums as $forum)
                                        <li>
                                            <span><i class="fa fa-file green-bg"></i></span>
                                            <h3>{{$forum->title}} </h3>
                                            <p>  <a href="#" title="">حذف </a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                            <h2><i class="ti-heart blue-bg"></i>  همراهان من</h2>
                            <div class="content">
                                <div class="activity-feed">
                                    <ul id="activity-scroll">
                                        @foreach($user->connections as $connection_)
                                            @if($connection_->followers_id !== '0' && ! empty($connection_->following($connection_->followers_id)->username))

                                                <li>
                                                    <span><i class="fa fa-user green-bg"></i></span>
                                                    <h3><a target="_blank" href="<?= Url('home/profile/show/137-'.$connection_->following($connection_->followers_id)->id.'-42-'.$connection_->following($connection_->followers_id)->username); ?>">{{$connection_->following($connection_->followers_id)->username}} </a></h3>
                                                    <p>  <!--<a href="<?= Url('/home/profile/deleteFollower/134-'.$connection_->following($connection_->followers_id)->id); ?>" title="">حذف </a>-->  </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <h2><i class="ti-heart blue-bg"></i>  کاربرانی که همراهی کردم</h2>
                            <div class="content">
                                <div class="activity-feed">
                                    <ul id="activity-scroll">
                                        @foreach($user->connections as $connection)
                                            @if($connection->followings_id !== '0' && ! empty($connection->following($connection->followings_id)->username))
                                                <li>
                                                    <span><i class="fa fa-user green-bg"></i></span>
                                                    <h3><a target="_blank" href="<?= Url('home/profile/show/137-'.$connection->following($connection->followings_id)->id.'-42-'.$connection->following($connection->followings_id)->username); ?>">{{$connection->follower($connection->followings_id)->username}} </a></h3>
                                                    <p>  <a href="<?= Url('/home/profile/deleteFollowing/134-'.$connection->follower($connection->followings_id)->id); ?>" title="">حذف </a></p>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                        @endif
                    </div>
                </div><!-- Accordian -->
            </div>

        </div>


                    <div class="col-md-8">



                        <div class="widget with-padding" >
                            <div>
                                <form  id="postForm" name="_token" method="POST" enctype="multipart/form-data"
                                       action="<?= Url('/home/profile/profileStore/'); ?>">
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




                                    <div class="col-md-12" style="margin-top: 10px">
                                        <div class="widget ">
                                            <div class="welcome-message " >
                                                <p>برای افزدون صفحه شخصی خود در شبکه های اجتماعی، لینک کامل صفحه پروفایل خود در شبکه اجتماعی مورد نظر را کپی و در جایگاه مربوط جایگزین عبارت # نمایید.</p>
                                                <span class="close-message delete-cart"><i class="fa fa-close"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    @if($user->social !== null)
                                    <div>
                                        <h2 style="margin-top: 40px !important;" class="StepTitle">لینک شبکه های اجتماعی   </h2>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label"> لینکداین  </label><input  type="text" placeholder="" name="linkedin" value="{{$user->social->linkedin}} " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label">  اینستاگرام</label><input  type="text" placeholder="" name="instagram" value="{{$user->social->instagram}} "/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label">    فیسبوک</label><input  type="text" placeholder="" name="facebook" value="{{$user->social->facebook}} "/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label">توییتر</label><input  type="text" placeholder="" name="tweeter" value="{{$user->social->tweeter}} "/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label">گوگل پلاس</label><input  type="text" placeholder="" name="google" value="{{$user->social->google}} "/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label">کارا</label><input  type="text" placeholder="" name="karamun" value="{{$user->social->karamun}} "/>
                                            </div>
                                        </div>
                                    </div>
                                       @else
                                        <div>
                                            <h2 style="margin-top: 40px !important;" class="StepTitle">لینک شبکه های اجتماعی   </h2>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label"> لینکداین  </label><input  type="text" placeholder="" name="linkedin" value="#" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label">  اینستاگرام</label><input  type="text" placeholder="" name="instagram" value="#"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label">    فیسبوک</label><input  type="text" placeholder="" name="facebook" value="#"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label">توییتر</label><input  type="text" placeholder="" name="tweeter" value="#"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label">گوگل پلاس</label><input  type="text" placeholder="" name="google" value="#"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="inline-form">
                                                    <label class="c-label">کارا</label><input  type="text" placeholder="" name="karamun" value="#"/>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div>
                                        <h2 style="margin-top: 40px !important;" class="StepTitle"> تصاویر پروفایل  </h2>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label"> بنر پروفایل </label>

                                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 "><br>

                                                    @if($user->profile !== null)
                                                    <img src="{{'../../../user-img/'.$user->profile->image}}"
                                                         alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                    <input type="hidden" name="image"
                                                           value="{{$user->profile->image}}">
                                                    @else
                                                        <input type="hidden" name="image"
                                                               value="null">
                                                    @endif

                                                    <div><input type="file"
                                                                name="image_u"
                                                                value="image_u"
                                                                accept="images/*"/>
                                                    </div>

                                                </div>
                                                @if($user->profile !== null )
                                                    @if($user->profile->image !== "" || $user->profile->image !== "null" )
                                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 "><br>

                                                    <label>  حذف تصویر بنر</label>
                                                    <input title="remove_image" type="checkbox" name="remove_image" value="1">
                                                </div>
                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="inline-form">
                                                <label class="c-label"> تصویر آواتار  </label>


                                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 "><br>
                                                    @if($user->profile !== null)
                                                    <img src="{{'../../../user-img/'.$user->profile->image_b}}"
                                                         alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                    <input type="hidden" name="image_b"
                                                           value="{{$user->profile->image_b}}">
                                                        @else
                                                        <input type="hidden" name="image_b"
                                                               value="null">
                                                    @endif


                                                    <div><input type="file"
                                                                name="image_ub"
                                                                value="image_ub"
                                                                accept="images/*"/>
                                                    </div>

                                                </div>
                                                @if($user->profile !== null )
                                                @if($user->profile->image_b !== ""  || $user->profile->image_b !== "null" )
                                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 "><br>

                                                    <label>  حذف تصویر آواتار</label>
                                                <input title="remove_image_b" type="checkbox" name="remove_image_b" value="1">
                                                    @endif
                                                    @endif
                                                </div>



                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-12" style="margin-top: 40px !important;">
                                        <div >
                                            <button name="_token" value="{{ csrf_token() }}" class="btn green-bg">ثبت اطلاعات</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




                    </div>

            </div>










    <div id="ww" class="modal fade modal1" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="add-education" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> افزودن فیلد تحصیلی</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/addEducation'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان </label>
                                    <input required type="text" class="form-control" name="title"
                                            value="">
                                </div>

                                <div class="form-group">
                                    <label> رشته </label>
                                    <input required type="text" class="form-control"
                                            name="major" value="">
                                </div>

                                <div class="form-group">
                                    <label> دانشگاه </label>
                                    <input required type="text" class="form-control"
                                            name="place" value="">
                                </div>


                                <div class="form-group">
                                    <label> تاریخ شروع </label>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="start_month">
                                        <option

                                                value="1">فروردین</option>
                                        <option

                                                value="2">اردیبهشت</option>
                                        <option

                                                value="3">خرداد</option>
                                        <option

                                                value="4">تیر</option>
                                        <option

                                                value="5">مرداد</option>
                                        <option

                                                value="6">شهریور</option>
                                        <option

                                                value="7">مهر</option>
                                        <option

                                                value="8">آبان</option>
                                        <option

                                                value="9">آذر</option>
                                        <option

                                                value="10">دی</option>
                                        <option

                                                value="11">بهمن</option>
                                        <option

                                                value="12">اسفند</option>

                                    </select>

                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label>  سال </label>
                                    <input required type="text" class="form-control "
                                            name="start_year" value="">
                                </div>



                                <div class="form-group">
                                    <label> تاریخ پایان </label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="finish_month">
                                        <option

                                                value="13">هم اکنون</option>
                                        <option

                                                value="1">فروردین</option>
                                        <option

                                                value="2">اردیبهشت</option>
                                        <option

                                                value="3">خرداد</option>
                                        <option

                                                value="4">تیر</option>
                                        <option

                                                value="5">مرداد</option>
                                        <option

                                                value="6">شهریور</option>
                                        <option

                                                value="7">مهر</option>
                                        <option

                                                value="8">آبان</option>
                                        <option

                                                value="9">آذر</option>
                                        <option

                                                value="10">دی</option>
                                        <option

                                                value="11">بهمن</option>
                                        <option

                                                value="12">اسفند</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label >  سال </label>
                                    <input required type="text" class="form-control "
                                            name="finish_year" value="">
                                </div>

                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($user->educations as $education)
    <div class="modal fade" id="{{$education->id}}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> ویرایش فیلد تحصیلی</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/editEducation/'.$education->id); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان </label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{$education->title}}">
                                </div>

                                <div class="form-group">
                                    <label> رشته </label>
                                    <input  type="text" class="form-control"
                                           name="major" value="{{$education->major}}">
                                </div>

                                <div class="form-group">
                                    <label> دانشگاه </label>
                                    <input  type="text" class="form-control"
                                            name="place" value="{{$education->place}}">
                                </div>


                                <div class="form-group">
                                    <label> تاریخ شروع </label>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="start_month">
                                        <option
                                                @if($education->start_month == '1')
                                                selected
                                                @endif
                                                value="1">فروردین</option>
                                        <option
                                                @if($education->start_month == '2')
                                                selected
                                                @endif
                                                value="2">اردیبهشت</option>
                                        <option
                                                @if($education->start_month == '3')
                                                selected
                                                @endif
                                                value="3">خرداد</option>
                                        <option
                                                @if($education->start_month == '4')
                                                selected
                                                @endif
                                                value="4">تیر</option>
                                        <option
                                                @if($education->start_month == '5')
                                                selected
                                                @endif
                                                value="5">مرداد</option>
                                        <option
                                                @if($education->start_month == '6')
                                                selected
                                                @endif
                                                value="6">شهریور</option>
                                        <option
                                                @if($education->start_month == '7')
                                                selected
                                                @endif
                                                value="7">مهر</option>
                                        <option
                                                @if($education->start_month == '8')
                                                selected
                                                @endif
                                                value="8">آبان</option>
                                        <option
                                                @if($education->start_month == '9')
                                                selected
                                                @endif
                                                value="9">آذر</option>
                                        <option
                                                @if($education->start_month == '10')
                                                selected
                                                @endif
                                                value="10">دی</option>
                                        <option
                                                @if($education->start_month == '11')
                                                selected
                                                @endif
                                                value="11">بهمن</option>
                                        <option
                                                @if($education->start_month == '12')
                                                selected
                                                @endif
                                                value="12">اسفند</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label>  سال </label>
                                    <input  type="text" class="form-control "
                                            name="start_year" value="{{$education->start_year}}">
                                </div>



                                <div class="form-group">
                                    <label> تاریخ پایان </label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="finish_month">
                                        <option
                                                @if($education->finish_month == '13')
                                                selected
                                                @endif
                                                value="13">هم اکنون</option>
                                        <option
                                                @if($education->finish_month == '1')
                                                        selected
                                                @endif
                                                value="1">فروردین</option>
                                        <option
                                                @if($education->finish_month == '2')
                                                selected
                                                @endif
                                                value="2">اردیبهشت</option>
                                        <option
                                                @if($education->finish_month == '3')
                                                selected
                                                @endif
                                                value="3">خرداد</option>
                                        <option
                                                @if($education->finish_month == '4')
                                                selected
                                                @endif
                                                value="4">تیر</option>
                                        <option
                                                @if($education->finish_month == '5')
                                                selected
                                                @endif
                                                value="5">مرداد</option>
                                        <option
                                                @if($education->finish_month == '6')
                                                selected
                                                @endif
                                                value="6">شهریور</option>
                                        <option
                                                @if($education->finish_month == '7')
                                                selected
                                                @endif
                                                value="7">مهر</option>
                                        <option
                                                @if($education->finish_month == '8')
                                                selected
                                                @endif
                                                value="8">آبان</option>
                                        <option
                                                @if($education->finish_month == '9')
                                                selected
                                                @endif
                                                value="9">آذر</option>
                                        <option
                                                @if($education->finish_month == '10')
                                                selected
                                                @endif
                                                value="10">دی</option>
                                        <option
                                                @if($education->finish_month == '11')
                                                selected
                                                @endif
                                                value="11">بهمن</option>
                                        <option
                                                @if($education->finish_month == '12')
                                                selected
                                                @endif
                                                value="12">اسفند</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label >  سال </label>
                                    <input  type="text" class="form-control "
                                            name="finish_year" value="{{$education->finish_year}}">
                                </div>

                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach







    <div class="modal fade" id="add-work" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> افزودن فیلد کاری</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/addWork'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان </label>
                                    <input required type="text" class="form-control" name="title"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label> سمت </label>
                                    <input required type="text" class="form-control"
                                           name="major" value="">
                                </div>

                                <div class="form-group">
                                    <label> محل کار </label>
                                    <input required type="text" class="form-control"
                                           name="place" value="">
                                </div>


                                <div class="form-group">
                                    <label> تاریخ شروع </label>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="start_month">
                                        <option

                                                value="1">فروردین</option>
                                        <option

                                                value="2">اردیبهشت</option>
                                        <option

                                                value="3">خرداد</option>
                                        <option

                                                value="4">تیر</option>
                                        <option

                                                value="5">مرداد</option>
                                        <option

                                                value="6">شهریور</option>
                                        <option

                                                value="7">مهر</option>
                                        <option

                                                value="8">آبان</option>
                                        <option

                                                value="9">آذر</option>
                                        <option

                                                value="10">دی</option>
                                        <option

                                                value="11">بهمن</option>
                                        <option

                                                value="12">اسفند</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label>  سال </label>
                                    <input required type="text" class="form-control "
                                           name="start_year" value="">
                                </div>



                                <div class="form-group">
                                    <label> تاریخ پایان </label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label> ماه  </label>
                                    <select class="form-control"  name="finish_month">
                                        <option

                                                value="13">هم اکنون</option>
                                        <option

                                                value="1">فروردین</option>
                                        <option

                                                value="2">اردیبهشت</option>
                                        <option

                                                value="3">خرداد</option>
                                        <option

                                                value="4">تیر</option>
                                        <option

                                                value="5">مرداد</option>
                                        <option

                                                value="6">شهریور</option>
                                        <option

                                                value="7">مهر</option>
                                        <option

                                                value="8">آبان</option>
                                        <option

                                                value="9">آذر</option>
                                        <option

                                                value="10">دی</option>
                                        <option

                                                value="11">بهمن</option>
                                        <option

                                                value="12">اسفند</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label >  سال </label>
                                    <input required type="text" class="form-control "
                                           name="finish_year" value="">
                                </div>

                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($user->works as $education)
        <div class="modal fade" id="work-{{$education->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> ویرایش فیلد کاری</h4>
                    </div>
                    <div class="modal-body">
                        <form name="_token" method="POST"
                              enctype="multipart/form-data"
                              action="<?= Url('home/profile/editWork/'.$education->id); ?>">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token"
                                   value="{{ csrf_token() }} ">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>  عنوان </label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{$education->title}}">
                                    </div>

                                    <div class="form-group">
                                        <label> سِمت </label>
                                        <input  type="text" class="form-control"
                                                name="major" value="{{$education->major}}">
                                    </div>

                                    <div class="form-group">
                                        <label> محل کار </label>
                                        <input  type="text" class="form-control"
                                                name="place" value="{{$education->place}}">
                                    </div>


                                    <div class="form-group">
                                        <label> تاریخ شروع </label>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label> ماه  </label>
                                        <select class="form-control"  name="start_month">
                                            <option
                                                    @if($education->start_month == '1')
                                                    selected
                                                    @endif
                                                    value="1">فروردین</option>
                                            <option
                                                    @if($education->start_month == '2')
                                                    selected
                                                    @endif
                                                    value="2">اردیبهشت</option>
                                            <option
                                                    @if($education->start_month == '3')
                                                    selected
                                                    @endif
                                                    value="3">خرداد</option>
                                            <option
                                                    @if($education->start_month == '4')
                                                    selected
                                                    @endif
                                                    value="4">تیر</option>
                                            <option
                                                    @if($education->start_month == '5')
                                                    selected
                                                    @endif
                                                    value="5">مرداد</option>
                                            <option
                                                    @if($education->start_month == '6')
                                                    selected
                                                    @endif
                                                    value="6">شهریور</option>
                                            <option
                                                    @if($education->start_month == '7')
                                                    selected
                                                    @endif
                                                    value="7">مهر</option>
                                            <option
                                                    @if($education->start_month == '8')
                                                    selected
                                                    @endif
                                                    value="8">آبان</option>
                                            <option
                                                    @if($education->start_month == '9')
                                                    selected
                                                    @endif
                                                    value="9">آذر</option>
                                            <option
                                                    @if($education->start_month == '10')
                                                    selected
                                                    @endif
                                                    value="10">دی</option>
                                            <option
                                                    @if($education->start_month == '11')
                                                    selected
                                                    @endif
                                                    value="11">بهمن</option>
                                            <option
                                                    @if($education->start_month == '12')
                                                    selected
                                                    @endif
                                                    value="12">اسفند</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label>  سال </label>
                                        <input  type="text" class="form-control "
                                                name="start_year" value="{{$education->start_year}}">
                                    </div>



                                    <div class="form-group">
                                        <label> تاریخ پایان </label>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label> ماه  </label>
                                        <select class="form-control"  name="finish_month">
                                            <option
                                                    @if($education->finish_month == '13')
                                                    selected
                                                    @endif
                                                    value="13">هم اکنون</option>

                                            <option
                                                    @if($education->finish_month == '1')
                                                    selected
                                                    @endif
                                                    value="1">فروردین</option>
                                            <option
                                                    @if($education->finish_month == '2')
                                                    selected
                                                    @endif
                                                    value="2">اردیبهشت</option>
                                            <option
                                                    @if($education->finish_month == '3')
                                                    selected
                                                    @endif
                                                    value="3">خرداد</option>
                                            <option
                                                    @if($education->finish_month == '4')
                                                    selected
                                                    @endif
                                                    value="4">تیر</option>
                                            <option
                                                    @if($education->finish_month == '5')
                                                    selected
                                                    @endif
                                                    value="5">مرداد</option>
                                            <option
                                                    @if($education->finish_month == '6')
                                                    selected
                                                    @endif
                                                    value="6">شهریور</option>
                                            <option
                                                    @if($education->finish_month == '7')
                                                    selected
                                                    @endif
                                                    value="7">مهر</option>
                                            <option
                                                    @if($education->finish_month == '8')
                                                    selected
                                                    @endif
                                                    value="8">آبان</option>
                                            <option
                                                    @if($education->finish_month == '9')
                                                    selected
                                                    @endif
                                                    value="9">آذر</option>
                                            <option
                                                    @if($education->finish_month == '10')
                                                    selected
                                                    @endif
                                                    value="10">دی</option>
                                            <option
                                                    @if($education->finish_month == '11')
                                                    selected
                                                    @endif
                                                    value="11">بهمن</option>
                                            <option
                                                    @if($education->finish_month == '12')
                                                    selected
                                                    @endif
                                                    value="12">اسفند</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label >  سال </label>
                                        <input  type="text" class="form-control "
                                                name="finish_year" value="{{$education->finish_year}}">
                                    </div>

                                </div>
                            </div><br><br>

                            <div class="modal-footer">
                                <button type="submit" name="_token"
                                        value="{{ csrf_token() }}"
                                        class="btn btn-primary">ذخیره تغییرات
                                </button>
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">بستن
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach







    <div class="modal fade" id="add-article" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> افزودن مقاله</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/addArticle'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان </label>
                                    <input required type="text" class="form-control" name="title"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label> جورنال </label>
                                    <input required type="text" class="form-control"
                                           name="journal" value="">
                                </div>

                                <div class="form-group">
                                    <label> نوع </label>
                                    <select class="form-control"  name="type">
                                        <option

                                                value="13">علمی پژوهشی</option>

                                        <option

                                                value="1">کنفرانسی</option>
                                        <option

                                                value="2">علمی ترویجی</option>
                                        <option

                                                value="3">تالیف کتاب</option>
                                        <option

                                                value="4">ترجمه کتاب</option>
                                        <option

                                                value="5">روزنامه</option>
                                        <option

                                                value="6">ISI</option>
                                        <option

                                                value="12">سایر</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> سایر نویسندگان </label>
                                    <input required type="text" class="form-control"
                                           name="coworker" value="">
                                </div>


                                <div class="form-group">
                                    <label> لینک مقاله </label>
                                    <input required type="text" class="form-control"
                                           name="link" value="#">
                                </div>

                                <div class="form-group"><br>

                                        <input type="file" name="file"
                                               value="">

                                </div>
                                <div class="form-group">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label>  سال انتشار </label>
                                    <input required type="text" class="form-control "
                                           name="publish_date" value="">
                                </div>





                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($user->articles as $education)
        <div class="modal fade" id="article-{{$education->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> ویرایش مشخصات مقاله</h4>
                    </div>
                    <div class="modal-body">
                        <form name="_token" method="POST"
                              enctype="multipart/form-data"
                              action="<?= Url('home/profile/editArticle/'.$education->id); ?>">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token"
                                   value="{{ csrf_token() }} ">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>  عنوان </label>
                                        <input required type="text" class="form-control" name="title"
                                               value="{{$education->title}}">
                                    </div>

                                    <div class="form-group">
                                        <label> جورنال </label>
                                        <input required type="text" class="form-control"
                                                name="journal" value="{{$education->journal}}">
                                    </div>

                                    <div class="form-group">
                                        <label> نوع </label>
                                        <select class="form-control"  name="type">
                                            <option
                                                    @if($education->type == '13')
                                                    selected
                                                    @endif
                                                    value="13">علمی پژوهشی</option>

                                            <option
                                                    @if($education->type == '1')
                                                    selected
                                                    @endif
                                                    value="1">کنفرانسی</option>
                                            <option
                                                    @if($education->type == '2')
                                                    selected
                                                    @endif
                                                    value="2">علمی ترویجی</option>
                                            <option
                                                    @if($education->type == '3')
                                                    selected
                                                    @endif
                                                    value="3">تالیف کتاب</option>
                                            <option
                                                    @if($education->type == '4')
                                                    selected
                                                    @endif
                                                    value="4">ترجمه کتاب</option>
                                            <option
                                                    @if($education->type == '5')
                                                    selected
                                                    @endif
                                                    value="5">روزنامه</option>
                                            <option
                                                    @if($education->type == '6')
                                                    selected
                                                    @endif
                                                    value="6">ISI</option>
                                            <option
                                                    @if($education->type == '12')
                                                    selected
                                                    @endif
                                                    value="12">سایر</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> سایر نویسندگان </label>
                                        <input type="text" class="form-control"
                                               name="coworker" value="{{$education->coworker}}">
                                    </div>


                                    <div class="form-group">
                                        <label> لینک مقاله </label>
                                        <input required type="text" class="form-control"
                                                name="link" value="{{$education->link}}">
                                    </div>

                                    <div class="form-group"><br>
                                        @if($education->file !== null)
                                            <input type="file" name="file"
                                                   value="{{$education->file}}">
                                        @else
                                            <input type="file" name="file_b"
                                                   value="">
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label>   </label>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label>  سال انتشار </label>
                                        <input  type="text" class="form-control "
                                                name="publish_date" value="{{$education->publish_date}}">
                                    </div>

                                </div>
                            </div><br><br>

                            <div class="modal-footer">
                                <button type="submit" name="_token"
                                        value="{{ csrf_token() }}"
                                        class="btn btn-primary">ذخیره تغییرات
                                </button>
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">بستن
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




    <div class="modal fade" id="add-skill" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> افزودن تخصص</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/addSkill'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان </label>
                                    <input required type="text" class="form-control" name="title"
                                           value="">
                                </div>


                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($user->skills as $education)
        <div class="modal fade" id="skill-{{$education->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> ویرایش تخصص </h4>
                    </div>
                    <div class="modal-body">
                        <form name="_token" method="POST"
                              enctype="multipart/form-data"
                              action="<?= Url('home/profile/editSkill/'.$education->id); ?>">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token"
                                   value="{{ csrf_token() }} ">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>  عنوان </label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{$education->title}}">
                                    </div>

                                </div>
                            </div><br><br>

                            <div class="modal-footer">
                                <button type="submit" name="_token"
                                        value="{{ csrf_token() }}"
                                        class="btn btn-primary">ذخیره تغییرات
                                </button>
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">بستن
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    @if($user->profile !== null)
    <div class="modal fade" id="edit-about" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> درباره من </h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/profile/editAbout/'.$user->profile->id); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea title="intro" class="form-control" name="intro">{!! $user->profile->intro !!}</textarea>
                                </div>
                            </div>
                        </div><br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ذخیره تغییرات
                            </button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@else

    <div class="modal fade" id="edit-about" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> درباره من </h4>
                </div>
                <div class="modal-body">
                   <p>ابتدا مشخصات اولیه پروفایل خود را تکمیل کنید</p>
                </div>
            </div>
        </div>
    </div>









    @endif



@endsection