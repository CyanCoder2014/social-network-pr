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

                <section id="lts_sec " class="right" style="margin: 0px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                        پیام ها
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>

                                            <form method="post" action="{{ route('Notif.send') }}" enctype="multipart/form-data" >
                                                {{ csrf_field() }}

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label>موضوع</label>
                                                        <input class="form-control" name="title" value="">
                                                    </div>
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                        <label>نوع</label>
                                                        <select class="form-control" name="type">
                                                            <option value="1">نوتیفیکیشن</option>
                                                            <option value="2">ایمیل</option>
                                                            <option value="3">هردو</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                        <label>ارسال به</label>
                                                        <select class="form-control" name="all">
                                                            <option value="1">همه</option>
                                                            <option value="3" selected>انتخابی</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                        <label>الویت</label>
                                                        <select class="form-control" name="priority">
                                                            <option value="1">کم</option>
                                                            <option value="2">متوسط</option>
                                                            <option value="3">زیاد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="message" id="editor" rows="10" cols="80">


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


                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($users as $users)
                                                            <tr class="odd gradeX">
                                                                <th>
                                                                    &nbsp; {{\Illuminate\Support\Str::words($users->name, $words = 6, $end = '...') }}</th>
                                                                <th>
                                                                    <input title="email" type="checkbox" class="form-control" name="id[]" value="{{$users->id}}" style="height: 20px">
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

                                                                <th> {!!  Jdate::to_jalali($users->created_at) !!}</th>

                                                            </tr>

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="submit"  class="btn btn-danger">
                                                    ارسال
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>


                </section>
            </div>
        </div>
    </div>


    <!--PAGE CONTENT -->



@endsection