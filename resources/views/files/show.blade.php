@extends('layouts.layout')

@section('content')


    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="<?= Url('assets/js/DSAudioPlayer.js'); ?>"></script>



    <div class="row" >

        <div class="col-md-3 ">
            <div class="widget blank">
                    <div class="tweet-widget">

                        <div class="ribbon-wrapper"><div class="ribbon-design skyblue-bg" style="font-size: 10px"> دکتری تخصصی انرژی</div></div>
                        <!-- <img src="/images/00333.jpg " alt="" style="max-height: 162px ; overflow: hidden"/>
                        -->
                        <div class="twitter-profile">
                            <span><img  src="/images/3-sm.jpg" alt="" /></span>
                            <h3>نام کاربری<i title="Verified" class="fa fa-check skyblue-bg" data-toggle="tooltip" data-placement="top"></i></h3>
                            <h4>مهندس انرژی  </h4>
                        </div>

                        <ul class="twitter-activity">
                            <li><i>همراهان</i><span>1,900</span></li>
                            <li><i>پست ها</i><span>90</span></li>
                            <li><i>دوره ها</i><span>409</span></li>
                        </ul>
                    </div><!-- Twitter Widget -->
            </div>

            <div class="widget blank" style="background-color: #0091cb;">
            <div style="background-color: #0091cb; direction: ltr" class="DSAudioPlayer" data-xmlPath="<?= Url('/course/media'); ?>"></div>
            </div>
        </div>



        <div class="col-md-9">
            <div class="widget">
                <div class="widget-title">
                    <h3>عنوان کورس</h3>
                    <span> دسته بندی کورس</span>
                    <div class="widget-controls">
                        <span class="expand-content"><i class="fa fa-expand"></i></span>
                        <span class="refresh-content"><i class="fa fa-refresh"></i></span>
                        <span class=""><i class="fa fa-stop"></i></span>

                    </div><!-- Widget Controls -->
                </div>
                <div class="with-padding" >



                    <section class="center slider">
                        <div>
                            <h3>عنوان اسلاید 1</h3>
                            <img src="http://placehold.it/750x300?text=1">
                            <br>  <p>توضیحات اسلاید. چند خط توضیحات در مورد اسلاید مربوطه برای توضیح مطلب.</p><br>
                        </div>
                        <div>
                            <h3>عنوان اسلاید 2</h3>
                            <img src="http://placehold.it/750x300?text=2">
                            <br>  <p>توضیحات اسلاید. چند خط توضیحات در مورد اسلاید مربوطه برای توضیح مطلب.</p><br>
                        </div>
                        <div>
                            <h3>عنوان اسلاید 3</h3>
                            <img src="http://placehold.it/750x300?text=3">
                            <br>  <p>توضیحات اسلاید. چند خط توضیحات در مورد اسلاید مربوطه برای توضیح مطلب.</p><br>
                        </div>
                        <div>
                            <h3>عنوان اسلاید 4</h3>
                            <img src="http://placehold.it/750x300?text=4">
                            <br>  <p>توضیحات اسلاید. چند خط توضیحات در مورد اسلاید مربوطه برای توضیح مطلب.</p><br>
                        </div>


                    </section>








                      </div>
                  </div>
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
                                                  </ul>

                                              </div>
                                          </div>


                                          <div class="timeline-content">


                                              <p>در این زمینه نیز ارتباط متقابل انرژی و محیط زیست به کمک ابزارهای تحلیلی نظیر معادلات دینامیک سیالات، معادلات انتقال جرم و حرارت با در نظر گرفتن تأثیر مسائل اقتصادی مورد بررسی و تجزیه و تحلیل قرار خواهد گرفت. همچنین مدل پخش انواع آلاینده‌ها با استفاده از روش‌های مختلف دینامیک سیالات محاسباتی مورد بررسی قرار خواهد گرفت و دانشجویان می‌توانند با مطالعه و بررسی روش‌های بازیافت انرژی از ضایعات و پسماندها با توجه به مسائل زیست‌محیطی در حفظ و حراست از محیط زیست و کاهش آلودگی‌های زیست‌محیطی نقش مهمی ایفا کنند. از آنجایی که بخش عمده‌ای از آلودگی‌های زیست‌محیطی ناشی از احتراق سوخت‌های فسیلی برای تأمین انرژی می‌باشد اصول و روش‌های کاهش آلودگی‌های زیست‌محیطی و ارزیابی فنی – اقتصادی آنها از مهم‌ترین مسایلی است که دراین زمینه مورد بررسی قرار می‌گیرد. قوانین و مقررات زیست‌محیطی، تجارت کردن، بهینه‌سازی مصرف آب و حفظ منابع آبی، تصفیه و استفاده از پساب‌های صنعتی، سیاست گذاری ساختاری و در نهایت اعمال استانداردهای زیست‌محیطی نیز از جمله مواردی می‌باشند که در این زمینه پژوهشی در نظر گرفته می‌شود.</p>
                                              <p>در این زمینه نیز ارتباط متقابل انرژی و محیط زیست به کمک ابزارهای تحلیلی نظیر معادلات دینامیک سیالات، معادلات انتقال جرم و حرارت با در نظر گرفتن تأثیر مسائل اقتصادی مورد بررسی و تجزیه و تحلیل قرار خواهد گرفت. همچنین مدل پخش انواع آلاینده‌ها با استفاده از روش‌های مختلف دینامیک سیالات محاسباتی مورد بررسی قرار خواهد گرفت و دانشجویان می‌توانند با مطالعه و بررسی روش‌های بازیافت انرژی از ضایعات و پسماندها با توجه به مسائل زیست‌محیطی در حفظ و حراست از محیط زیست و کاهش آلودگی‌های زیست‌محیطی نقش مهمی ایفا کنند. از آنجایی که بخش عمده‌ای از آلودگی‌های زیست‌محیطی ناشی از احتراق سوخت‌های فسیلی برای تأمین انرژی می‌باشد اصول و روش‌های کاهش آلودگی‌های زیست‌محیطی و ارزیابی فنی – اقتصادی آنها از مهم‌ترین مسایلی است که دراین زمینه مورد بررسی قرار می‌گیرد. قوانین و مقررات زیست‌محیطی، تجارت کردن، بهینه‌سازی مصرف آب و حفظ منابع آبی، تصفیه و استفاده از پساب‌های صنعتی، سیاست گذاری ساختاری و در نهایت اعمال استانداردهای زیست‌محیطی نیز از جمله مواردی می‌باشند که در این زمینه پژوهشی در نظر گرفته می‌شود.</p>
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
                                              <span href="javascript:void(0)" title="">&nbsp;نام کاربر </span>
                                              <p>  زمینه پژوهشی، روش‌های مختلف طراحی مفهومی سیستم‌های</p>



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


                          </ul>
                      </div>

                  </div>
              </div>






          </div>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?= Url('assets/js/slick.js'); ?>" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".regular").slick({

                // autoplay: true,
                // autoplaySpeed: 2000,
                // rtl: true

                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            $(".center").slick({
                autoplay: true,
                autoplaySpeed: 10000,
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1,
//                 rtl: true

            });
            $(".variable").slick({
                dots: true,
                infinite: true,
                variableWidth: true
            });
        });
    </script>

      @endsection