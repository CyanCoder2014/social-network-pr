@extends('layouts.layout')

@section('content')

    <script src="<?= Url('/assets/pdf.js'); ?>"></script>
    <script src="<?= Url('/assets/pdf.worker.js'); ?>"></script>

    <style type="text/css">

        #upload-button {
            width: 150px;
            display: block;
            margin: 20px auto;
        }

        #file-to-upload {
            display: none;
        }

        #pdf-main-container {
            width: 400px;
            margin: 20px auto;
        }

        #pdf-loader {
            display: none;
            text-align: center;
            color: #999999;
            font-size: 13px;
            line-height: 100px;
            height: 100px;
        }

        #pdf-contents {
            display: none;
        }

        #pdf-meta {
            overflow: hidden;
            margin: 0 0 20px 0;
        }

        #pdf-buttons {
            float: left;
        }

        #page-count-container {
            float: right;
        }

        #pdf-current-page {
            display: inline;
        }

        #pdf-total-pages {
            display: inline;
        }

        #pdf-canvas {
            border: 1px solid rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
        }

        #page-loader {
            height: 100px;
            line-height: 100px;
            text-align: center;
            display: none;
            color: #999999;
            font-size: 13px;
        }

    </style>

    <ul class="breadcrumbs" style="">
        <li>
            <h4> {{$course->title}} <a href="<?= Url('/home/course/edit/' . $course->id); ?>" title="">
                    <small> (ویرایش)</small>
                </a></h4>
        </li>

        <li style="float: left; margin-right: 15px;margin-top: 10px"><a class="bnt btn-sm btn-default  hover-shadow"
                                                                        href="<?= Url('/home/podcast/manage/' . $course->id); ?>"
                                                                        title=""><i class="fa fa-plus"></i> افزودن و
                مدیریت پادکست </a></li>
        <li style="float: left; margin-right: 15px;margin-top: 10px"><a class="bnt btn-sm btn-default  hover-shadow"
                                                                        href="<?= Url('/home/course/manage/'); ?>"
                                                                        title=""><i class="fa fa-book"></i> لیست دوره ها
            </a></li>

    </ul>


    <div class="main-content-area">


        <div class="row" style="min-height: 551px"><br>
            <div class="col-md-12">
                <div class="task-sec">
                    <section id="task-form">


                        <div class="collapse-sec">
                            <div id="accordian2" class="c-collapse">


                                <h2 class=" active "><i class="ti-save-alt"></i>
                                   ساخت اسلاید با صفحات PDF

                                </h2>
                                <div class="content" about="ss">


                                    <div>
                                        <button id="upload-button" style="width: 260px;">انتخاب فایل اسلایدها با فرمت PDF</button>
                                        <input type="file" id="file-to-upload" accept="application/pdf"/>

                                        <div id="pdf-main-container">
                                            <div id="pdf-loader">درحال بارگذاری ...</div>
                                            <div id="pdf-contents">
                                                <div id="pdf-meta">
                                                    <div id="pdf-buttons">
                                                        <button style="width: 120px;height: 30px;margin-right: 10px"
                                                                id="pdf-prev">صفحه قبل
                                                        </button>
                                                        <button style="width: 120px;height: 30px;margin-right: 10px"
                                                                id="pdf-next">صفحه بعد
                                                        </button>
                                                    </div>
                                                    <div id="page-count-container">صفحه
                                                        <div id="pdf-current-page"></div>
                                                        از
                                                        <div id="pdf-total-pages"></div>
                                                    </div>
                                                </div>
                                                <canvas id="pdf-canvas" width="400"></canvas>
                                                <div id="page-loader">درحال بارگذاری ...</div>
                                            </div>
                                        </div>


                                        <script>

                                            var __PDF_DOC,
                                                __CURRENT_PAGE,
                                                __TOTAL_PAGES,
                                                __PAGE_RENDERING_IN_PROGRESS = 0,
                                                __CANVAS = $('#pdf-canvas').get(0),
                                                __CANVAS_CTX = __CANVAS.getContext('2d');

                                            function showPDF(pdf_url) {
                                                $("#pdf-loader").show();

                                                PDFJS.getDocument({url: pdf_url}).then(function (pdf_doc) {
                                                    __PDF_DOC = pdf_doc;
                                                    __TOTAL_PAGES = __PDF_DOC.numPages;

                                                    // Hide the pdf loader and show pdf container in HTML
                                                    $("#pdf-loader").hide();
                                                    $("#pdf-contents").show();
                                                    $("#pdf-total-pages").text(__TOTAL_PAGES);

                                                    // Show the first page
                                                    showPage(1);
                                                }).catch(function (error) {
                                                    // If error re-show the upload button
                                                    $("#pdf-loader").hide();
                                                    $("#upload-button").show();

                                                    alert(error.message);
                                                });
                                                ;
                                            }

                                            function showPage(page_no) {
                                                __PAGE_RENDERING_IN_PROGRESS = 1;
                                                __CURRENT_PAGE = page_no;

                                                // Disable Prev & Next buttons while page is being loaded
                                                $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

                                                // While page is being rendered hide the canvas and show a loading message
                                                $("#pdf-canvas").hide();
                                                $("#page-loader").show();

                                                // Update current page in HTML
                                                $("#pdf-current-page").text(page_no);

                                                // Fetch the page
                                                __PDF_DOC.getPage(page_no).then(function (page) {
                                                    // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
                                                    var scale_required = __CANVAS.width / page.getViewport(1).width;

                                                    // Get viewport of the page at required scale
                                                    var viewport = page.getViewport(scale_required);

                                                    // Set canvas height
                                                    __CANVAS.height = viewport.height;

                                                    var renderContext = {
                                                        canvasContext: __CANVAS_CTX,
                                                        viewport: viewport
                                                    };

                                                    // Render the page contents in the canvas
                                                    page.render(renderContext).then(function () {
                                                        __PAGE_RENDERING_IN_PROGRESS = 0;

                                                        // Re-enable Prev & Next buttons
                                                        $("#pdf-next, #pdf-prev").removeAttr('disabled');

                                                        // Show the canvas and hide the page loader
                                                        $("#pdf-canvas").show();
                                                        $("#page-loader").hide();
                                                        $('#form-inputs').show();

                                                    });
                                                });
                                            }

                                            // Upon click this should should trigger click on the #file-to-upload file input element
                                            // This is better than showing the not-good-looking file input element
                                            $("#upload-button").on('click', function () {
                                                $("#file-to-upload").trigger('click');
                                            });

                                            // When user chooses a PDF file
                                            $("#file-to-upload").on('change', function () {
                                                // Validate whether PDF
                                                if (['application/pdf'].indexOf($("#file-to-upload").get(0).files[0].type) == -1) {
                                                    alert('Error : Not a PDF');
                                                    return;
                                                }

                                                //$("#upload-button").hide();

                                                // Send the object url of the pdf
                                                showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
                                            });

                                            // Previous page of the PDF
                                            $("#pdf-prev").on('click', function () {
                                                if (__CURRENT_PAGE != 1)
                                                    showPage(--__CURRENT_PAGE);
                                                $('#form-inputs').show();

                                            });

                                            // Next page of the PDF
                                            $("#pdf-next").on('click', function () {
                                                if (__CURRENT_PAGE != __TOTAL_PAGES)
                                                    showPage(++__CURRENT_PAGE);

                                                $('#form-inputs').show();
                                            });


                                            $(document).ready(function () {
                                                $("#add-to-slide").click(function () {
                                                    console.log(__CANVAS.toDataURL("image/png"));
                                                    $("#show-page-").attr("src", __CANVAS.toDataURL('image/png'));

                                                    console.log(__CANVAS.toDataURL("image/png"));
                                                    //$("input[name=image]").attr("src", __CANVAS.toDataURL('image/png'));
//                                                    $("#slide-t").val(__CANVAS.toDataURL('image/png'));
//                                                    $("#slide-image").val('qqq')


                                                })
                                            });


                                        </script>


                                        <br><br>
                                        <!--<span id="add-to-slide">pdf2img</span>
                                        <img id="show-page-" src="">-->


                                    </div>


                                    <div class="col-md-12" style="margin-bottom: 20px">
                                        <div class="widget ">
                                            <div class="welcome-message ">
                                                <p>برای افزودن اسلاید بعد از آپلود فایل pdf، برای ساخت اسلاید از صفحه مورد نظر روی دکمه افزودن اسلاید کلیک نمایید. </p>
                                                <span class="close-message delete-cart"><i
                                                            class="fa fa-close"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <form id="pdfSlideForm" name="_token" method="POST" enctype="multipart/form-data"
                                          action="<?= Url('/home/slide/add/' . $course->id); ?>">
                                        {{ csrf_field() }}


                                       <div id="form-inputs" style="display: none">
                                    <button type="submit" name="_token" value="{{ csrf_token() }}"
                                            style="width: 100%;background-color: #ed5565 " class="create-task"><i
                                                class="fa fa-file"></i>  افزودن این صفحه از pdf به عنوان اسلاید
                                    </button>

                                    <input id="slide-t" style="width: 100%" class="create-task " type="text" name="title"
                                           placeholder="عنوان اسلاید">
                                    <input style="width: 100%" class="create-task" type="text" name="description"
                                           placeholder="توضیحات اسلاید">
                                       </div>



                                        <input type="hidden" name="effect" value="1">
                                    </form>

                                </div>


                                <h2 class=" active "><i class="ti-save-alt"></i>
                                    ساخت اسلاید با آپلود عکس برای هر  اسلاید

                                </h2>
                                <div class="content" about="ss">


                                    <div class="col-md-12" style="margin-bottom: 20px">
                                        <div class="widget ">
                                            <div class="welcome-message ">
                                                <p>برای افزودن اسلاید بعد آپلود عکس و انتخاب عنوان و توضیحات اسلاید روی دکمه
                                                    "افزودن اسلاید" کلیک نمایید</p>
                                                <span class="close-message delete-cart"><i
                                                            class="fa fa-close"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <form id="slideForm" name="_token" method="POST" enctype="multipart/form-data"
                                          action="<?= Url('/home/slide/add/' . $course->id); ?>">
                                        {{ csrf_field() }}

                                        <button type="submit" name="_token" value="{{ csrf_token() }}"
                                                style="width: 100%;background-color: #ed5565 " class="create-task"><i
                                                    class="fa fa-plus"></i> افزودن اسلاید
                                        </button>
                                        <input id="slide-image" style="width: 40%;" title="تصویر اسلاید" type="file"
                                               name="image" value="image.png" accept="images/*"/>
                                        <input id="slide-t" style="width: 60%" class="create-task " type="text"
                                               name="title" placeholder="عنوان اسلاید">
                                        <input style="width: 100%" class="create-task" type="text" name="description"
                                               placeholder="توضیحات اسلاید">
                                    </form>

                                </div>


                            </div>
                        </div><!-- Accordian -->


                        <section id="task-container">
                            <div class="row">
                                <br>
                                <div class="col-md-12">
                                    <ul id="task-list">


                                        @foreach($slides as $slide)

                                            @if($slide->effect == '1')
                                                <li id="{{$slide->id}}" class="col-md-6"><span id="'+task+'"
                                                                                               class="del12"
                                                                                               style="float: left;color: #902b2b"><i
                                                                class="fa fa-close"></i></span>
                                                    <h4>{{$slide->title}}</h4>
                                                    <div><img style="width: 100%;margin-bottom: 10px"
                                                              src="{{$slide->description}}" alt=""/>
                                                    </div>{{$slide->image}}</li>
                                            @else
                                                <li id="{{$slide->id}}" class="col-md-6"><span id="'+task+'"
                                                                                               class="del12"
                                                                                               style="float: left;color: #902b2b"><i
                                                                class="fa fa-close"></i></span>
                                                    <h4>{{$slide->title}}</h4>
                                                    <div><img style="width: 100%;margin-bottom: 10px"
                                                              src="../../../course-slide/{{$slide->description}}"
                                                              alt=""/></div>{{$slide->image}}</li>
                                            @endif

                                        @endforeach

                                    </ul>
                                </div>

                            </div>

                        </section>

                    </section>


                </div>

            </div>
        </div>


    </div>

    <script>


    </script>

    <script src="<?= Url('assets/js/jquery2.min.js'); ?>"></script>
    <script src="<?= Url('assets/js/slide-add.js'); ?>"></script>


@endsection