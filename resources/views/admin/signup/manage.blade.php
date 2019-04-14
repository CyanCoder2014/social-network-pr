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
                                    <a data-toggle="modal" data-target=".add-page" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن صفحه </a>

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
                                            <th style="text-align: center">&nbsp;عنوان صفحه</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center"> لینک صفحه</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contents as $content)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center"> &nbsp; <a target="_blank" href="<?= Url('/content/page/'.$content->id); ?>">{{$content->title}} </a></th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($content->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100"> <?= Url('/content/page/'.$content->id); ?> </th>
                                               <th style="text-align: center; font-weight: 100"><a data-toggle="modal" data-target=".edit-page-{{$content->id}}" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100">
                                                    @if($content->id >= 4)
                                                    <a onclick="return confirm('آیا از حذف این صفحه مطمئن هستید؟');"  href="<?= Url('/home/admin/content/delete/'.$content->id); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                    @endif
                                                </th>



                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$contents->links()}}
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




    @foreach($contents as $content)


        <div class="modal fade edit-page-{{$content->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="<?= Url('/home/admin/content/update/'.$content->id); ?>">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                            <div class="col-md-12">
                                <div class="input-group"><p style="float: right">  عنوان صفحه</p>
                                    <input required name="title" type="text" value="{{$content->title}}" class="form-control">
                                </div>
                            </div>



                            <br><br><br><br>
                            <div class="col-md-12">
                                <textarea required title="text" name="intro" id="editor{{$content->id}}" rows="10" cols="80" >{!! $content->intro !!}</textarea><br>
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
            CKEDITOR.replace( 'editor{{$content->id}}',{
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