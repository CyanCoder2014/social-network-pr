@extends('web.layouts.admin')

@section('script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>


@endsection

@section('admin_content')

    <script type="text/javascript">
        /*
         Default Functionality
         */
        $(document).ready(function () {
            /*
             Default
             */
            window.pd = $("#inlineDatepicker").persianDatepicker({
                altField: '#inlineDatepickerAlt',
                altFormat: 'unix',
                altFieldFormatter: function (unixDate) {
                    var self = this;
                    var thisAltFormat = self.altFormat.toLowerCase();
                    return new persianDate(unixDate).format();
                },
                timePicker: {
                    enabled: true,
                    showSeconds: true,
                    showMeridian: false,
                    scrollEnabled: true
                }

            }).data('datepicker');

            //$("#inlineDatepicker").pDatepicker('destroy');

            console.log(window.pd.setDate);


            //pd.setDate([1333,12,28,11,20,30]);

            /**
             * Default
             * */
            $('#default').persianDatepicker({
                altField: '#defaultAlt'

            });


            /*
             observer
             */
            $("#observer").persianDatepicker({
                altField: '#observerAlt',
                altFormat: "YYYY MM DD HH:mm:ss",
                observer: true,
                format: 'YYYY/MM/DD'

            });

            /*
             timepicker
             */
            $("#timepicker").persianDatepicker({
                altField: '#timepickerAltField',
                altFormat: "YYYY MM DD HH:mm:ss",
                format: "HH:mm:ss a",
                onlyTimePicker: true

            });
            /*
             month
             */
            $("#monthpicker").persianDatepicker({
                format: " MMMM YYYY",
                altField: '#monthpickerAlt',
                altFormat: "YYYY MM DD HH:mm:ss",
                yearPicker: {
                    enabled: false
                },
                monthPicker: {
                    enabled: true
                },
                dayPicker: {
                    enabled: false
                }
            });

            /*
             year
             */
            $("#yearpicker").persianDatepicker({
                format: "YYYY",
                altField: '#yearpickerAlt',
                altFormat: "YYYY MM DD HH:mm:ss",
                dayPicker: {
                    enabled: false
                },
                monthPicker: {
                    enabled: false
                },
                yearPicker: {
                    enabled: true
                }
            });
            /*
             year and month
             */
            $("#yearAndMonthpicker").persianDatepicker({
                format: "YYYY MM",
                altFormat: "YYYY MM DD HH:mm:ss",
                altField: '#yearAndMonthpickerAlt',
                dayPicker: {
                    enabled: false
                },
                monthPicker: {
                    enabled: true
                },
                yearPicker: {
                    enabled: true
                }
            });
            /**
             inline with minDate and maxDate
             */
            $("#inlineDatepickerWithMinMax").persianDatepicker({
                altField: '#inlineDatepickerWithMinMaxAlt',
                altFormat: "YYYY MM DD HH:mm:ss",
                minDate: 1416983467029,
                maxDate: 1419983467029
            });
            /**
             Custom Disable Date
             */
            $("#customDisabled").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#customDisabledAlt',
                checkDate: function (unix) {
                    var output = true;
                    var d = new persianDate(unix);
                    if (d.date() == 20 | d.date() == 21 | d.date() == 22) {
                        output = false;
                    }
                    return output;
                },
                checkMonth: function (month) {
                    var output = true;
                    if (month == 1) {
                        output = false;
                    }
                    return output;

                }, checkYear: function (year) {
                    var output = true;
                    if (year == 1396) {
                        output = false;
                    }
                    return output;
                }

            });

            /**
             persianDate
             */
            $("#persianDigit").persianDatepicker({
                altField: '#persianDigitAlt',
                altFormat: "YYYY MM DD HH:mm:ss",
                persianDigit: false
            });
        });
    </script>

    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">



                <div class="col-lg-12">
                    <h1> ثبت مطلب </h1>
                </div>
                <hr>


                <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>


                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="<?= Url('admin/content/store'); ?>">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="row">


                        <div class="col-lg-2 col-md-62 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>دسته بندی مطلب</label>

                                <select class="form-control" name="catid" onselect="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title  }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <label> نمایش صفحه اول</label>
                            <select class="form-control" name="f_page" onselect="">
                                <option value="0" >خیر
                                </option>
                                <option value="1" selected >بلی
                                </option>

                            </select>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <label> امکان کامنت گذاری</label>

                            <select class="form-control" name="comment" onselect="">
                                <option value="0" selected>خیر
                                </option>
                                <option value="1" >بلی
                                </option>

                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label class="control-label col-lg-4 col-md-6 col-sm-12 col-xs-12">انتخاب تصویر مطلب</label>
                            <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="Image" data-preview="holder"  class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i>انتخاب
                                 </a>

                                @include('web.admin.contents.ImageUploader')

                               </span>
                                <input id="Image" class="form-control" type="text" name="images">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                            <div class="col-lg-1 col-md-3 col-sm-12 col-xs-12"></div>



                        </div>

                    </div>





                    <div class="panel panel-default">

                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#english" data-toggle="tab">فارسی</a>
                                </li>
                                <li><a href="#persian" data-toggle="tab">English</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="english">





                                    <div class="row col-lg-6" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>عنوان مطلب</label>
                                                <input class="form-control" name="title_fa" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row col-lg-2" style="z-index: 99">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>انتشار مطلب</label>
                                            <select class="form-control" name="publish_fa" onselect="">
                                                <option value="1" >خیر
                                                </option>
                                                <option value="0" selected >بلی
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>نویسنده / منبع</label>
                                            <input class="form-control" name="author_fa" value="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>چکیده مطلب</label>
                                            <textarea class="form-control" rows="1"
                                                      name="introtext_fa"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="fulltext_fa" id="editor1" rows="10" cols="80">


            </textarea>
                                        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                                        <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
                                        <script>
                                            $('editor1').ckeditor();
                                            // $('.textarea').ckeditor(); // if class is prefered.
                                        </script>
                                        <script>


                                            CKEDITOR.replace('editor1', {
                                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
                                            });




                                        </script>
                                    </div><br>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>عنوان - سئو</label>
                                            <input class="form-control" name="title_seo_fa" value="">
                                        </div>
                                    </div>
                                    <div class="row col-lg-8" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label> کلمات کلیدی - سئو </label>
                                            <input class="form-control" name="keyword_seo_fa" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>توضیحات - سئو</label>
                                            <textarea class="form-control" rows="1"
                                                      name="description_seo_fa"></textarea>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="persian" style="direction: ltr; text-align: left">



                                    <div class="row col-lg-6" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label> Title</label>
                                                <input class="form-control" name="title" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row col-lg-2" style="z-index: 99">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label> Publish</label>
                                            <select class="form-control" name="publish" >
                                                <option value="1">No
                                                </option>
                                                <option value="0" selected >Yes
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>Source / Author</label>
                                            <input class="form-control" name="author" value="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Iintro text</label>
                                            <textarea class="form-control" rows="1"
                                                      name="introtext"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="fulltext" id="editor2" rows="10" cols="80">


            </textarea>
                                        <script>

                                            CKEDITOR.replace( 'editor2',
                                                {
                                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
                                                });


                                        </script>
                                    </div><br>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>Title - seo</label>
                                            <input class="form-control" name="title_seo" value="">
                                        </div>
                                    </div>
                                    <div class="row col-lg-8" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>Keyword - seo</label>
                                            <input class="form-control" name="keyword_seo" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Description - seo</label>
                                            <textarea class="form-control" rows="1"
                                                      name="description_seo"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت مطلب
                    </button>

                    <a  class="btn btn-warning" style="margin-right: 10px" onclick="return confirm('به انصراف از ثبت مطلب تمایل دارید؟');"  href="<?= Url('/admin/content' ); ?>"><i class="icon-remove"></i> </a>



                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->

        </div>
        </div>


        <!--END PAGE CONTENT -->





        <!-- PAGE LEVEL SCRIPTS -->
        <script src="<?= Url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>















@endsection