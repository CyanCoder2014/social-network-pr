@extends('layouts.layout')

@section('content')

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
            <div class="widget no-padding blank">
                <div class="timeline-sec">
                    <ul>


                        <li>
                            <div class="timeline">
                                <div class="user-timeline">
                                    <span><img
                                                src="/images/3-sm.jpg" alt=""/></span>
                                </div>
                                <div class="timeline-detail">
                                    <div class="timeline-head" style="border: 1px solid #6eb590;  ">
                                        <h3>&nbsp;  <i style="color: #6eb590">تالار  </i> <a id="popoverone" data-content="مهندس مکانیک" rel="popover"
                                                      data-placement="top" data-original-title="Title2"
                                                      data-trigger="hover"> محمود محمودی</a>
                                            <span>2 ساعت پیش  </span></h3>
                                        <div class="social-share">
                                            <a id="popovertwo" data-content="34" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-sharethis"></i></a>
                                        </div>
                                        <div class="social-share">
                                            <a id="popover7" data-content="2334" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-comment"></i></a>


                                        </div>
                                        <div class="social-share">
                                            <a id="popoverfour" data-content="123" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-heart"></i></a>


                                        </div>

                                        <div style="float: left" class="social-share">
                                            <a title=""><i class="ti-more"></i></a>
                                            <ul class="social-btns">

                                                <li><a data-content="Block" data-toggle="tooltip" data-placement="left"
                                                       href="javascript:void(0)"><i class="ti-na blue-bg"></i></a></li>
                                                <li><a data-content="UnFollow" data-toggle="tooltip"
                                                       data-placement="left" href="javascript:void(0)"><i
                                                                class="ti-face-sad blue-bg"></i></a></li>
                                            </ul>


                                        </div>
                                        <div style="float: left" class="social-share">

                                            <a  class="close-content" title=""><i class="ti-trash "></i></a>

                                        </div>

                                    </div>
                                    <div class="timeline-content">
                                        <img style="width: 100%; margin-bottom: 10px" src="/images/00333.jpg" alt=""/>

                                        <p>رای اولین بار در کشور در سال ۱۳۷۳ دانشگاه علوم و تحقیفات تهران اقدام به پذیرش دانشجو رشته مهندسی انرژی در مقطع کارشناسی ارشد و دکتری نمود. گروه مهندسی انرژی این دانشگاه که در دانشکده محیط زیست و انرژی واقع می باشد دارای ۴ گرایش در مقطع ارشد و یک گرایش در مقطع دکتری می باشد. بعد از آن در سال ۱۳۷۶ ضرورت راه‌اندازی این رشته در شورای تحصیلات تکمیلی و شورای دانشگاه صنعتی شریف مورد تصویب و مجوز رسمی آن در سال ۱۳۷۸ از شورای گسترش در وزارت علوم، تحقیقات و فناوری دریافت شد. پذیرش دانشجو در دوره کارشناسی ارشد مهندسی سیستم‌های انرژی در دانشگاه صنعتی شریف از مهرماه سال ۱۳۷۸ آغاز شد.</p>
                                        <div data-toggle="buttons" class="btn-group btn-group-sm">
                                            <small>
                                                <small>&nbsp; 122 پسند ::&nbsp;45 نظر</small>
                                            </small>
                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" checked="" name="options"/><i
                                                        class="ti-sharethis"></i>
                                            </label>

                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" name="options"/> <i class="ti-thumb-up"></i>
                                            </label>
                                        </div>
                                        <div><br>
                                            <hr>
                                        </div>
                                        <span class="margin-12" id="popoverthree" rel="popover" data-placement="top"
                                              data-original-title="Title2" data-trigger="hover"
                                              data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."><img
                                                    style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                    src="/images/3-sm.jpg" alt=""/></span><span style="float: left;"><a
                                                    id="reply-12"><small><i
                                                            class="fa fa-reply"></i>&nbsp;پاسخ</small></a></span>
                                        <span href="javascript:void(0)" title="">&nbsp; علی علوی</span>
                                        <p> همچنین دانشکده مهندسی انرژی ور این زمینه پژوهشی، دانشجویان با فراگیری تکنیک‌های شبیه‌سازی سیستم‌های ترکیبی</p>

                                        <section class="timeline2">
                                            <ul>

                                                <li>

                                                    <div>
                                                         <span><img
                                                                     style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                                     src="/images/3-sm.jpg" alt=""/></span><span
                                                                style="float: left;"><a><small><i
                                                                            class="fa fa-reply"></i>&nbsp;</small></a></span>
                                                        <span href="javascript:void(0)" title=""><a
                                                                    style="color: #242424">&nbsp;سعیده سعیدی </a></span>
                                                        <p> اقدام به جذب دانشجو در مقطع کارشناسی مهندسی انرژی کرد.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                         <span><img
                                                                     style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                                     src="/images/3-sm.jpg" alt=""/></span><span
                                                                style="float: left;"><a><small><i
                                                                            class="fa fa-reply"></i>&nbsp;</small></a></span>
                                                        <span href="javascript:void(0)" title=""><a
                                                                    style="color: #242424">&nbsp;مسعود مسعودی </a></span>
                                                        <p>  جذب دانشجو در مقطع کارشناسی .</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>

                                        <script>
                                            $(document).ready(function () {
                                                $("#reply-12").click(function () {
                                                    $(".cm-1").css("display", "block");
                                                });
                                            });
                                        </script>
                                        <form class="cm-1 post-reply-12  post-reply cm-12 radius-s">
                                            <textarea id="hide" placeholder="پاسخ خود را بنویسید ...">
                                            </textarea>                                                <i class="ti-comment"></i>

                                            <a class="cm-1 cm-12 c-btn small blue-bg radius-s " style="float: left" >ارسال نظر </a>
                                        </form>


                                        <span class="margin-12" id="popoverthree" rel="popover" data-placement="top"
                                              data-original-title="Title2" data-trigger="hover"
                                              data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."><img
                                                    style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                    src="/images/3-sm.jpg" alt=""/></span>
                                        <span href="javascript:void(0)" title=""> رضا رضایی</span>
                                        <p> این زمینه پژوهشی، دانشجویان با فراگیری تکنیک‌های شبیه‌سازی سیستم‌های ترکیبی</p>

                                        <a>
                                            <small><i class="ti-comments"></i>&nbsp;نمایش نظرات بیشتر</small>
                                        </a>

                                        <script>
                                            $(document).ready(function () {
                                                $("textarea").click(function () {
                                                    $("#cm-12").css("display", "block");
                                                });
                                            });
                                        </script>

                                        <form class="post-reply radius-s">
                                            <textarea id="hide" placeholder="نظر خود را بنویسید ...">
                                            </textarea>

                                            <i class="ti-comment"></i>
                                            <a id="cm-12" class="cm-12 c-btn small blue-bg radius-s" style="float: left ">ارسال نظر </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </li>


                        <li>
                            <div class="timeline">
                                <div class="user-timeline">
                                    <span><img
                                                src="/images/3-sm.jpg" alt=""/></span>
                                </div>
                                <div class="timeline-detail">
                                    <div class="timeline-head" style="border: 1px solid #4e8deb;  ">
                                        <h3>&nbsp; <i style="color: #4e8deb">اخبار  </i> <a id="popoverone" data-content="مهندس مکانیک" rel="popover"
                                                      data-placement="top" data-original-title="Title2"
                                                      data-trigger="hover"> محمود محمودی</a>
                                            <span>2 ساعت پیش  </span></h3>
                                        <div class="social-share">
                                            <a id="popovertwo" data-content="34" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-sharethis"></i></a>
                                        </div>
                                        <div class="social-share">
                                            <a id="popover7" data-content="2334" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-comment"></i></a>


                                        </div>
                                        <div class="social-share">
                                            <a id="popoverfour" data-content="123" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-heart"></i></a>


                                        </div>

                                        <div style="float: left" class="social-share">
                                            <a title=""><i class="ti-more"></i></a>
                                            <ul class="social-btns">

                                                <li><a data-content="Block" data-toggle="tooltip" data-placement="left"
                                                       href="javascript:void(0)"><i class="ti-na blue-bg"></i></a></li>
                                                <li><a data-content="UnFollow" data-toggle="tooltip"
                                                       data-placement="left" href="javascript:void(0)"><i
                                                                class="ti-face-sad blue-bg"></i></a></li>
                                            </ul>


                                        </div>
                                        <div style="float: left" class="social-share">

                                            <a  class="close-content" title=""><i class="ti-trash "></i></a>

                                        </div>

                                    </div>
                                    <div class="timeline-content">
                                        <img style="width: 100%; margin-bottom: 10px" src="/images/0032.jpg" alt=""/>

                                        <p>با عنایت به برگزاری هشت دوره موفقیت آمیز کنفرانس
                                            <a href="javascript:void(0)" title="">دستاوردهای علمی</a> مهندسی برق در این واحد دانشگاهی، دانشگاه آزاد اسلامی اقدام به برگزاری نهمین کنفرانس ملی "مهندسی برق با محوریت انرژی های نو" در 28 مهرماه 1395 در دانشگاه آزاد اسلامی واحد علی آباد کتول نموده است. این کنفرانس در نظر دارد که ضمن گردهم آوردن متخصصان و پژوهشگران در حوزه مربوطه، آنان را به ارائه  در این حوزه تشویق نماید. </p>
                                        <p>

                                        <div data-toggle="buttons" class="btn-group btn-group-sm">
                                            <small>
                                                <small>&nbsp; 122 پسند ::&nbsp;45 نظر</small>
                                            </small>
                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" checked="" name="options"/><i
                                                        class="ti-sharethis"></i>
                                            </label>

                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" name="options"/> <i class="ti-thumb-up"></i>
                                            </label>
                                        </div>
                                        <div><br>
                                            <hr>
                                        </div>


                                        <section class="timeline2">
                                            <ul>

                                                <li>

                                                    <div>
                                                         <span><img
                                                                     style="height: 30px; border: solid 1px #5e5e5e ; border-radius: 3px"
                                                                     src="/images/3-sm.jpg" alt=""/></span><span
                                                                style="float: left;"><a><small><i
                                                                            class="fa fa-reply"></i>&nbsp;</small></a></span>
                                                        <span href="javascript:void(0)" title=""><a
                                                                    style="color: #242424">&nbsp; فرهاد فرهادی</a></span>
                                                        <p> در این زمینه پژوهشی، روش‌های مختلف طراحی مفهومی سیستم‌های تبدیل انرژی پیشرفته، سیستم‌های تولید</p>
                                                    </div>
                                                </li>

                                            </ul>
                                        </section>

                                        <script>
                                            $(document).ready(function () {
                                                $("#reply-12").click(function () {
                                                    $(".cm-1").css("display", "block");
                                                });
                                            });
                                        </script>
                                        <form class="cm-1 post-reply-12  post-reply cm-12 radius-s">
                                            <textarea id="hide" placeholder="پاسخ خود را بنویسید ...">
                                            </textarea>                                                <i class="ti-comment"></i>

                                            <a class="cm-1 cm-12 c-btn small blue-bg radius-s " style="float: left" >ارسال نظر </a>
                                        </form>


                                        <a>
                                            <small><i class="ti-comments"></i>&nbsp;نمایش نظرات بیشتر</small>
                                        </a>

                                        <script>
                                            $(document).ready(function () {
                                                $("textarea").click(function () {
                                                    $("#cm-12").css("display", "block");
                                                });
                                            });
                                        </script>

                                        <form class="post-reply radius-s">
                                            <textarea id="hide" placeholder="نظر خود را بنویسید ...">
                                            </textarea>

                                            <i class="ti-comment"></i>
                                            <a id="cm-12" class="cm-12 c-btn small blue-bg radius-s" style="float: left ">ارسال نظر </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </li>


                        <li>
                            <div class="timeline">
                                <div class="user-timeline">
                                    <span><img
                                                src="/images/3-sm.jpg" alt=""/></span>
                                </div>
                                <div class="timeline-detail">
                                    <div class="timeline-head">
                                        <h3>&nbsp; <a id="popoverone" data-content="مهندس مکانیک" rel="popover"
                                                      data-placement="top" data-original-title="Title2"
                                                      data-trigger="hover"> محمود محمودی</a>
                                            <span>2 ساعت پیش  </span></h3>
                                        <div class="social-share">
                                            <a id="popovertwo" data-content="34" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-sharethis"></i></a>
                                        </div>
                                        <div class="social-share">
                                            <a id="popover7" data-content="2334" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-comment"></i></a>


                                        </div>
                                        <div class="social-share">
                                            <a id="popoverfour" data-content="123" rel="popover" data-placement="bottom"
                                               data-trigger="hover"> <i class="ti-heart"></i></a>


                                        </div>

                                        <div style="float: left" class="social-share">
                                            <a title=""><i class="ti-more"></i></a>
                                            <ul class="social-btns">

                                                <li><a data-content="Block" data-toggle="tooltip" data-placement="left"
                                                       href="javascript:void(0)"><i class="ti-na blue-bg"></i></a></li>
                                                <li><a data-content="UnFollow" data-toggle="tooltip"
                                                       data-placement="left" href="javascript:void(0)"><i
                                                                class="ti-face-sad blue-bg"></i></a></li>
                                            </ul>


                                        </div>
                                        <div style="float: left" class="social-share">

                                            <a  class="close-content" title=""><i class="ti-trash "></i></a>

                                        </div>

                                    </div>
                                    <div class="timeline-content">
                                        <img style="width: 100%; margin-bottom: 10px" src="/images/0022.jpg" alt=""/>


                                        در این زمینه پژوهشی، دانشجویان با فراگیری تکنیک‌های شبیه‌سازی سیستم‌های ترکیبی (چرخه تولید، توزیع و مصرف انرژی) مانند سیستم‌های ترکیبی تولید حرارت و قدرت یا تولید همزمان و ... با هدف ارزیابی جایگاه حامل‌های انرژی، گامی تخصصی در جهت بررسی سیستم‌ها از دیدگاه مهندسی انرژی بر می‌دارند. علاوه بر این مشکلات بخش انرژی با دیدگاه سنجش فنی و اقتصادی پروژه‌ها، گام بعدی و تکمیلی این تحقیقات خواهد بود. همچنین در این گرایش، به کمک قوانین اساسی علوم مکانیک، ترمودینامیک و برق قدرت به عنوان مبنای مدلسازی اولیه جهت تراز انرژی سیستم‌ها، جهت گیری فناوری‌های فعلی را بسوی بهینه‌سازی و حداقل کردن مصرف انرژی می‌برد و همچنین می‌تواند در مدیریت کلان بخش انرژی، تصمیم گیری نهاد و سازمان‌های مربوطه، دیدگاه‌های تلفیقی برنامه‌ریزی در صنایع و بخش‌های انرژی شامل وزارت نفت و وزارت نیرو کارایی داشته باشد و مدیریت برنامه‌ریزی کشور را با در نظر گرفتن مسائل فنی مرتبط با فرایند انرژی یاری دهد.</p>
                                        <div data-toggle="buttons" class="btn-group btn-group-sm">
                                            <small>
                                                <small>&nbsp; 122 پسند ::&nbsp;45 نظر</small>
                                            </small>
                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" checked="" name="options"/><i
                                                        class="ti-sharethis"></i>
                                            </label>

                                            <label class="btn btn-default  blue-hover hover-shadow">
                                                <input type="radio" name="options"/> <i class="ti-thumb-up"></i>
                                            </label>
                                        </div>
                                        <div><br>
                                            <hr>
                                        </div>



                                        <script>
                                            $(document).ready(function () {
                                                $("#reply-12").click(function () {
                                                    $(".cm-1").css("display", "block");
                                                });
                                            });
                                        </script>


                                        <a>
                                            <small><i class="ti-comments"></i>&nbsp;نمایش نظرات بیشتر</small>
                                        </a>

                                        <script>
                                            $(document).ready(function () {
                                                $("textarea").click(function () {
                                                    $("#cm-12").css("display", "block");
                                                });
                                            });
                                        </script>

                                        <form class="post-reply radius-s">
                                            <textarea id="hide" placeholder="نظر خود را بنویسید ...">
                                            </textarea>

                                            <i class="ti-comment"></i>
                                            <a id="cm-12" class="cm-12 c-btn small blue-bg radius-s" style="float: left ">ارسال نظر </a>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>


            </div>
        </div>




        <div class="col-md-3">
            <div class="widget white no-padding">
                <div class="widget-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" data-target="#tab1">دوره‌های  برتر</a></li>
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




@endsection