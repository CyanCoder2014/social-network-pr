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



                <div class="col-lg-12">
                    <h1> ثبت مطلب </h1>
                </div>
                <hr>


                <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>


                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="<?= Url('admin/content/update/' . $record->id); ?>">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="row">


                        <div class="col-lg-2 col-md-62 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>دسته بندی مطلب</label>

                                <select class="form-control" name="catid" onselect="{{$record->catid}}">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($record->catid == $category->id )
                                        selected
                                                @endif >{{ $category->title  }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <label> نمایش صفحه اول</label>
                            <select class="form-control" name="f_page" onselect="{{$record->catid}}">
                                <option value="0" @if($record->f_page == 0 )
                                selected
                                        @endif >خیر
                                </option>
                                <option value="1" @if($record->f_page == 1 )
                                selected
                                        @endif >بلی
                                </option>

                            </select>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <label> امکان کامنت گذاری</label>

                            <select class="form-control" name="comment" onselect="{{$record->catid}}">
                                <option value="0" @if($record->comment == 0)
                                selected
                                        @endif >خیر
                                </option>
                                <option value="1" @if($record->comment == 1 )
                                selected
                                        @endif >بلی
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
                                <input id="Image" class="form-control" type="text" name="images" value="{{$record->images}}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($record->images)}}">
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
                                                <input class="form-control" name="title_fa" value="{{ $record->title_fa }}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row col-lg-2" style="z-index: 99">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>انتشار مطلب</label>
                                            <select class="form-control" name="publish_fa" onselect="{{$record->publish_fa}}">
                                                <option value="1" @if($record->publish_fa == 1 )
                                                selected
                                                        @endif >خیر
                                                </option>
                                                <option value="0" @if($record->publish_fa == 0 )
                                                selected
                                                        @endif >بلی
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>نویسنده / منبع</label>
                                            <input class="form-control" name="author_fa" value="{{ $record->author_fa }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>چکیده مطلب</label>
                                            <textarea class="form-control" rows="1"
                                                      name="introtext_fa"> {{ $record->introtext_fa }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="fulltext_fa" id="editor1" rows="10" cols="80">
                        {{ $record->fulltext_fa }}

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
                                            <input class="form-control" name="title_seo_fa" value="{{ $record->title_seo_fa }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-8" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label> کلمات کلیدی - سئو </label>
                                            <input class="form-control" name="keyword_seo_fa" value="{{ $record->keyword_seo_fa }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>توضیحات - سئو</label>
                                            <textarea class="form-control" rows="1"
                                                      name="description_seo_fa">{{ $record->description_seo_fa }}</textarea>
                                        </div>
                                    </div>

</div>


                                <div class="tab-pane fade" id="persian" style="direction: ltr; text-align: left">



                                    <div class="row col-lg-6" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" value="{{ $record->title }}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row col-lg-2" style="z-index: 99">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label> Publish</label>
                                                <select class="form-control" name="publish" onselect="{{$record->publish}}">
                                                    <option value="1" @if($record->publish == 1 )
                                                    selected
                                                            @endif >No
                                                    </option>
                                                    <option value="0" @if($record->publish == 0 )
                                                    selected
                                                            @endif >Yes
                                                    </option>

                                                </select>
                                            </div>
                                    </div>
                                    <div class="row col-lg-4" style="z-index: 99">
                                            <div class="form-group col-lg-12 ">
                                                <label>Source / Author</label>
                                                <input class="form-control" name="author" value="{{ $record->author }}">
                                            </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label> Iintro text</label>
                                                    <textarea class="form-control" rows="1"
                                                              name="introtext"> {{ $record->introtext }}</textarea>
                                                </div>
                                            </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="fulltext" id="editor2" rows="10" cols="80">
                        {{ $record->fulltext }}

            </textarea>
                                        <script>

                                            CKEDITOR.replace( 'editor2',
                                                {
                                                    filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                                                    filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                                                    filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                                                });


                                        </script>
                                    </div><br>
                                    <div class="row col-lg-4" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>Title - seo</label>
                                            <input class="form-control" name="title_seo" value="{{ $record->title_seo }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-8" style="z-index: 99">
                                        <div class="form-group col-lg-12 ">
                                            <label>Keyword - seo</label>
                                            <input class="form-control" name="keyword_seo" value="{{ $record->keyword_seo }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Description - seo</label>
                                            <textarea class="form-control" rows="1"
                                                      name="description_seo">{{ $record->description_seo }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت مطلب
                    </button>

                    <a  class="btn btn-danger" style="margin-right: 10px" onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟');"  href="<?= Url('/admin/content/destroy/'.$record->id ); ?>"><i class="icon-remove"></i> </a>



                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->


        </div>


    <!--END PAGE CONTENT -->


    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?= Url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>




@endsection