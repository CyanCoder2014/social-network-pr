@extends('layouts.layout')

@section('content')

    <div id="" class="note" style="display: none">
        پست شما با موفقیت ارسال گردید <a id="close">[close]</a>
    </div>
    <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">
       خطا در ارسال پست! <a id="close">[close]</a>
    </div>




    <div class="row">


        <div class="col-md-12">
            <div class="widget blank">
                <div class="parallax-example" >
                    <div class="qwhitish-12">
                        <div data-velocity="-.1"
                             style="background: url(../../images/0099.jpg) repeat scroll 50% 0px transparent;"
                             class="parallax scrolly-invisible no-repeat"></div><!-- PARALLAX BACKGROUND IMAGE -->


                        <div class="col-md-7">
                            <div class="widget-title">
                                <h3 style="color: #fff !important;">ثبت نام</h3>
                                <span>&nbsp;هم اکنون به ما بپیوندید &nbsp;</span>
                            </div><!-- Widget title -->
                            <div class="account-form">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 feild">
                                            <input type="text" placeholder="نام کاربری"/>
                                        </div>
                                        <div class="col-md-6 feild">
                                            <input type="text" placeholder="ایمیل"/>
                                        </div>
                                        <div class="col-md-6 feild">
                                            <input type="password" placeholder="کلمه عبور"/>
                                        </div>
                                        <div class="col-md-6 feild">
                                            <input type="password" placeholder="تکرار کلمه عبور"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" style="float: right; text-align: left "/> <a
                                                        title="" style="color: #fff !important;">قوانین و مقررات </a>
                                                &nbsp;سایت را تایید می نمایم&nbsp;
                                            </label>
                                        </div>
                                        <div class="feild col-md-6">
                                            <input style="color: #fff !important;" type="submit" value="ثبت نام"/>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-1">
                            <div><img style="margin-top: 25px;width: 2px; height: 250px" src="/images/0035.png"></div>

                        </div>
                        <div class="col-md-4">
                            <div class="widget-title">
                                <h3 style="color: #fff !important;">ورود</h3>
                                <span></span>
                            </div><!-- Widget title -->
                            <div class="account-form">
                                <form>
                                    <div class="row">
                                        <div class="feild col-md-12">
                                            <input type="text" placeholder="نام کاربری"/>
                                        </div>
                                        <div class="feild col-md-12">
                                            <input type="password" placeholder="پسورد"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox"/>مرا بخاطر بسپار</label>
                                        </div>
                                        <div class="feild col-md-12">
                                            <input style="color: #fff !important;" type="submit" value="ورود"/>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-md-3">
            <div class="widget blank no-padding">
                <div class="carousal-widget fb-carousel">
                    <ul id="fb-carousel">
                        <li>
                            <span class="img1"><img src="/images/0032.jpg" alt=""/></span>
                            <h3 style="color: #f0f0f0 !important;">همایش انرژی های تجدیدپذیر</h3>

                            <span><i class="ti-time"></i>   شهریور 1396      &nbsp;&nbsp;<i class="ti-location-pin"></i>  سالن  دانشگاه مهندسی</span>
                            <span>  <a id="popover1" class="c-btn medium green12-bg"
                                       data-content="Popover with data-trigger" rel="popover" data-placement="top"
                                       data-original-title="Title" data-trigger="hover">اطلاعات بیشتر    </a></span>

                        </li>
                        <li>
                            <span class="img1"><img src="/images/00333.jpg" alt=""/></span>
                            <h3 style="color: #f0f0f0 !important;"> کنفرانس انرژی های نو </h3>

                            <span><i class="ti-time"></i>   مهر 1396      &nbsp;&nbsp;<i class="ti-location-pin"></i>  تالار  دانشگاه مهندسی</span>
                            <span> <a id="popover2" class="c-btn medium green12-bg"
                                      data-content="Popover with data-trigger" rel="popover" data-placement="top"
                                      data-original-title="Title" data-trigger="hover">اطلاعات بیشتر    </a></span>

                        </li>

                    </ul>
                </div>
            </div>


            <div class="widget blank no-padding">
                <div class="carousal-widget">
                    <ul id="simple-carousel">
                        <li>
                            <div class="carousal-avatar">
                                <span><img src="/images/3-sm.jpg" alt=""/></span>
                                <h3><a id="popover10" class=" medium blue12-bg" data-content="" rel="popover"
                                       data-placement="bottom" data-original-title="مهندس برق الکترونیک"
                                       data-trigger="hover">داوود داوودی </a></h3>
                                <i> <a> نمونه </a>&nbsp; را اشتراک گذاشت</i>
                            </div>

                        </li>
                        <li>
                            <div class="carousal-avatar">
                                <span><img src="/images/3-sm.jpg" alt=""/></span>
                                <h3><a id="popover11" class=" medium blue12-bg" data-content="" rel="popover"
                                       data-placement="bottom" data-original-title="مهندس برق الکترونیک"
                                       data-trigger="hover">داوود داوودی </a></h3>
                                <i><a> شماره نمونه </a>&nbsp; را پسندید</i>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>


        </div>


        <div class="col-md-6">

            @if(session()->has('message'))
                <script>
                    $.notify("{{ session()->get('message') }}", "success");

                    $(".pos-demo").notify(
                        "I'm to the right of this box",
                        {position: "right"}
                    );
                </script>
            @endif





                <div class="widget no-padding blank">
                <div class="timeline-sec">
                    <ul id="post-data">
                        @include('data')


                    </ul>
                </div>

                <div class="ajax-load text-center" style="display:none">
                    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif"></p>
                </div>

            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <div class="widget">
                <div class="quick-report-widget">
                    <span>شبکه ی ارتباطات شما </span>
                    <h4>345</h4>
                    <i class="fa fa-users green-bg"></i>
                    <h5>پست های منتشر شده: 54</h5>
                </div>
            </div><!-- Widget -->
        </div>


        <div class="col-md-3">
            <div class="widget white no-padding">
                <div class="widget-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" data-target="#tab1">دوره‌های برتر</a></li>
                        <li><a data-toggle="tab" data-target="#tab2">جدیدترین دوره‌ها</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <ul class="forum-threads" id="forum-scroll">
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط<a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>

                            </ul>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <ul class="forum-threads" id="forum-scroll">
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی مکانیک</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>
                                <li>
                                    <div class="user-avatar">
                                        <span><img src="http://placehold.it/53x53" alt=""/></span>
                                    </div>
                                    <a title="">دوره مهندسی انرژی</a>
                                    <h3>ارائه توسط</i> <a href="javascript:void(0)" title=""> دکتر علوی</a></h3>
                                    <i>12 مهر 1396 </i>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="widget blank no-padding">
                <div class="tab-group">
                    <section id="tab1" title="تالار های برگزیده">
                        <ul class="forum-threads" id="forum-scroll" style="margin-top: 15px ; padding-right: 16px">

                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">تحلیل انرژی های پاک</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">تحلیل انرژی های پاک</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">تحلیل انرژی های پاک</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                        </ul>
                    </section>
                    <section id="tab2" title="آخرین تالار ها  ">
                        <ul class="forum-threads" id="forum-scroll" style="margin-top: 15px ; padding-right: 16px">

                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">صنعت نفت</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">تحلیل انرژی های پاک</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                            <li>
                                <div class="user-avatar">
                                    <span><img src="http://placehold.it/53x53" alt=""/></span>
                                </div>
                                <a title="">تحلیل انرژی های پاک</a>
                                <h3><i>توسط</i> دکتر مهردادی <i>آغاز شد</i></h3>
                                <i>25 شهریور 1396</i>
                            </li>
                        </ul>
                    </section>

                </div>
            </div>
        </div>


    </div>


    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() +1 >= $(document).height() - $(window).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function () {
                        $('.ajax-load').show();
                    }
                })
                .done(function (data) {
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('مشکل در بارگذاری اطلاعات');
                });
        }
    </script>




    <div class="modal fade large-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>



@endsection