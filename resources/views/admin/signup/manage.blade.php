@extends('layouts.layout')
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                    <h1>مدیریت  ثبت نامی ها </h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;نام</th>
                                            <th style="text-align: center">&nbsp;کد ملی</th>
                                            <th style="text-align: center">&nbsp;تاریخ</th>
                                            <th style="text-align: center">وضعیت پرداخت</th>
                                            <th style="text-align: center"> شماره پیگیری</th>
                                            <th style="text-align: center">مبلغ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($signups as $signup)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center"> &nbsp; {{$signup->name}}</th>
                                                <th style="text-align: center"> &nbsp; {{$signup->national_code}}</th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali($signup->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100"> @if(isset($signup->transaction)){{ $signup->transaction->status() }} @else {{ 'تراکنشی وجود ندارد' }} @endif</th>
                                               <th style="text-align: center; font-weight: 100">{{ $signup->transaction->tracking_code??'تراکنشی وجود ندارد' }}</th>
                                                <th style="text-align: center; font-weight: 100">{{ $signup->transaction->price??'تراکنشی وجود ندارد' }}</th>

                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$signups->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>








    <div class="modal fade add-page" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="<?= Url('/home/admin/content/create/'); ?>">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <div class="col-md-12">
                            <div class="input-group"><p style="float: right">  عنوان صفحه</p>
                                <input required name="title" type="text" placeholder="" class="form-control">
                            </div>
                        </div>



                        <br><br><br><br>
                        <div class="col-md-12">
                            <textarea required title="text" name="intro" id="editor1222" rows="10" cols="80" ></textarea><br>
                        </div>

                    </div>
                    <div class="modal-footer" >
                        <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                        <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <script>
        CKEDITOR.replace( 'editor1222',{
            filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
            filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
            filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
        });

        </script>




    @foreach($signups as $signup)


        <div class="modal fade edit-page-{{$signup->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="<?= Url('/home/admin/content/update/'.$signup->id); ?>">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                            <div class="col-md-12">
                                <div class="input-group"><p style="float: right">  عنوان صفحه</p>
                                    <input required name="title" type="text" value="{{$signup->title}}" class="form-control">
                                </div>
                            </div>



                            <br><br><br><br>
                            <div class="col-md-12">
                                <textarea required title="text" name="intro" id="editor{{$signup->id}}" rows="10" cols="80" >{!! $signup->intro !!}</textarea><br>
                            </div>

                        </div>
                        <div class="modal-footer" >
                            <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                            <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            CKEDITOR.replace( 'editor{{$signup->id}}',{
                filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
            });

        </script>

    @endforeach
@endsection