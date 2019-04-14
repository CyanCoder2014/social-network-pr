@extends('layouts.admin')

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
                    <h1> ثبت دوره </h1>
                </div>
                <hr>


                <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>


                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="<?= Url('admin/course/update/'. $record->id); ?>">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                    <div class="row">


                        <div class="col-lg-6 col-md-62 col-sm-12 col-xs-12">

                            <div class="form-group">
                                <label>عنوان دوره</label>
                                <input class="form-control" name="title" value="{{$record->title}}">
                            </div>

                            <div class="form-group">
                                <label>خلاصه جزئیات </label>
                                <textarea class="form-control" rows="1" name="text" >{{$record->text}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>لینک ثبت نام</label>
                                <input class="form-control" name="link" value="{{$record->link}}">
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>ظرفیت دوره</label>
                                <input type="number" class="form-control" name="valency" value="{{$record->valency}}">
                            </div>
                            <div class="form-group">
                                <label> تعداد ثبت نام شده</label>
                                <input type="number" class="form-control" name="registered" value="{{$record->registered}}">
                            </div>
                            <div class="form-group">
                                <label>مدت دوره (ساعت)</label>
                                <input type="number" class="form-control" name="hour" value="{{$record->hour}}">
                            </div>


                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>هزینه دوره (تومان)</label>
                                <input type="number" class="form-control" name="price"  value="{{$record->price}}">
                            </div>




                            <label>اولویت دوره</label>
                            <select class="form-control" name="publish" onselect="{{$record->publish}}">
                                <option value="0" @if($record->publish == 0 )
                                selected
                                        @endif >خیر
                                </option>
                                <option value="1" @if($record->publish == 1 )
                                selected
                                        @endif >بلی
                                </option>

                            </select>


                            <br>

<!--
                            <img src="{{'../../../images/'.$record->images}}"
                                 alt="" style="width: 100px">
                            <input type="hidden" name="images" value="{{ $record->images}} ">


                            <br>

                            <div class="form-group ">
                                <label class="control-label col-lg-12">تغییر تصویر مطلب</label>
                                <div class="col-lg-8"><input type="file" name="images_u" value="images_u"
                                                             accept="images/*"/></div>
                            </div>

                            -->

                        </div>
                    </div>
                    <label>توضیحات  </label>


                    <textarea name="content" id="editor1" rows="10" cols="80">
{{$record->content}}
            </textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace('editor1');
                    </script>


                    <br>
                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت دوره
                    </button>


                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->


        </div>

    </div>
    <!--END PAGE CONTENT -->



    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?= Url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>




@endsection