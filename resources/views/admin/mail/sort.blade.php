@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>"/>

    <style>
        div {
            direction: rtl;

        }

        th {
            text-align: right;
        }


    </style>

    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 10px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h1> ارسال ایمیل</h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>

                                <form name="_token" method="POST" enctype="multipart/form-data"
                                      action="<?= Url('admin/mailto'); ?>">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label>موضوع ایمیل</label>
                                        <input class="form-control" name="subject" value="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label> ارسال کننده</label>
                                        <input class="form-control" name="sender" value="">
                                    </div>
                                </div>
<br><br><br>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="content" id="editor" rows="10" cols="80">


            </textarea>
                                    <script>

                                        CKEDITOR.replace( 'editor',
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

                                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-danger">
                                        ارسال ایمیل گروهی
                                    </button>

                                    <a  class="btn btn-warning" style="margin-right: 10px" onclick="return confirm('به انصراف از ارسال ایمیل تمایل دارید؟');"  href="<?= Url('/admin' ); ?>"><i class="icon-remove"></i> </a>




                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>

                                            <th>&nbsp; نام کاربر</th>
                                            <th style="text-align: center">&nbsp;  انتخاب</th>
                                            <th style="text-align: center">&nbsp; نحوه ثبت نام</th>
                                            <th style="text-align: center">&nbsp;ایمیل</th>
                                            <th style="text-align: center">تاریخ ثبت</th>
                                            <th style="text-align: center">   ایمیل خصوصی</th>
                                            <th style="text-align: center">ویرایش</th>
                                            <th style="text-align: center">حذف</th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $users)
                                            <tr class="odd gradeX">
                                                <th>
                                                    &nbsp; {{\Illuminate\Support\Str::words($users->name, $words = 6, $end = '...') }}</th>
                                                <th>
                                                    <input title="email" type="checkbox" class="form-control" name="emails" value="{{$users->email}}" style="height: 20px">
                                                </th>
                                                <th style="text-align: center">&nbsp;
                                                    @if($users->usertype == 'Admin')
                                                        <a class="btn btn-success btn-line btn-sm "> مدیریت </a>
                                                    @elseif($users->usertype == 'Author')
                                                        <a class="btn btn-primary btn-line btn-sm">بخش محتوا </a>
                                                    @elseif($users->usertype == 'Finance')
                                                        <a class="btn btn-primary btn-line btn-sm"> بخش مالی </a>
                                                    @elseif($users->usertype == 'General')
                                                        <a class="btn btn-primary btn-line btn-sm"> روابط عمومی</a>
                                                    @elseif($users->usertype == 'Translate')
                                                        <a class="btn btn-primary btn-line btn-sm"> بخش ترجمه </a>
                                                    @elseif($users->usertype == 'Registered')
                                                        <a class="btn btn-default btn-line btn-sm"> ثبت نام شده </a>
                                                    @endif
                                                </th>
                                                <th style="text-align: center">
                                                    &nbsp; {{$users->email}}

                                                </th>

                                                <th> {!!  until_time($users->name) !!}</th>
                                                <th style="text-align: center"><a data-toggle="modal"
                                                                                  data-target="#{{$users->id}}2"
                                                                                  class="btn btn-success btn-line btn-sm"
                                                                                  href="<?= Url('admin/user/show/' . $users->id); ?>"><i
                                                                class="fa fa-envelope"></i> </a></th>
                                                <th style="text-align: center"><a data-toggle="modal"
                                                                                  data-target="#{{$users->id}}"
                                                                                  class="btn btn-warning btn-line btn-sm"
                                                                                  href="<?= Url('admin/user/show/' . $users->id); ?>"><i
                                                                class="fa fa-user"></i> </a></th>
                                                <th style="text-align: center"><a
                                                            onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟');"
                                                            href="<?= Url('admin/user/destroy/' . $users->id); ?>"><i
                                                                class="fa fa-remove"></i> </a></th>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                </form>

                                <div class="modal fade" id="{{$users->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"> ویرایش کاربر</h4>
                                            </div>
                                            <div class="modal-body">

                                                <form name="_token" method="POST"
                                                      enctype="multipart/form-data"
                                                      action="<?= Url('admin/mailto/'. $users->id); ?>">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }} ">

                                                    <div class="row">

                                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                                                            <div class="form-group">
                                                                <label> نام کاربری</label>
                                                                <input class="form-control" name="name"
                                                                       value="{{$users->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label> ایمیل </label>
                                                                <input type="email" class="form-control"
                                                                       name="email" value="{{$users->email}}">
                                                            </div>

                                                            <label> نحوه ثبت نام</label>
                                                            <select class="form-control" name="usertype" >

                                                                <option value="Registered" @if($users->usertype == 'Registered' )
                                                                selected
                                                                        @endif >ثبت نام شده
                                                                </option>
                                                                <option value="Author" @if($users->usertype == 'News' )
                                                                selected
                                                                        @endif >خبرنامه
                                                                </option>
                                                                <option value="General" @if($users->usertype == 'General' )
                                                                selected
                                                                        @endif > عمومی
                                                                </option>
                                                                <option value="Finance" @if($users->usertype == 'Contact' )
                                                                selected
                                                                        @endif > تماس با ما
                                                                </option>
                                                                <option value="Translate" @if($users->usertype == 'Translate' )
                                                                selected
                                                                        @endif >بخش ترجمه
                                                                </option>
                                                                <option value="Admin" @if($users->usertype == 'Admin' )
                                                                selected
                                                                        @endif >مدیریت
                                                                </option>

                                                            </select>

                                                        </div>

                                                    </div>

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

                                <div class="modal fade" id="{{$users->id}}2" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"> ارسال ایمیل خصوصی </h4>
                                            </div>
                                            <div class="modal-body">

                                                <form name="_token" method="POST"
                                                      enctype="multipart/form-data"
                                                      action="<?= Url('admin/mailto'); ?>">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }} ">

                                                    <div class="row">

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label>  موضوع</label>
                                                                <input class="form-control" name="subject"
                                                                       value="">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label> ایمیل </label>
                                                                <input type="email" class="form-control"
                                                                       name="emails" value="{{$users->email}}">
                                                            </div><br><br><br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <textarea name="content" id="editorz" rows="10" cols="80">


            </textarea>
                                                            <script>

                                                                CKEDITOR.replace( 'editorz',
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
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" name="_token"
                                                                value="{{ csrf_token() }}"
                                                                class="btn btn-danger"> ارسال ایمیل
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
                            </div>
                        </div>

                        <br><br>
                    </div>


                </section>
            </div>
        </div>
    </div>


    <!--PAGE CONTENT -->

    <script src="<?= Url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>

@endsection