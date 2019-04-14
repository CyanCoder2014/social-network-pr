@extends('layouts.admin')

@section('script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('.lfm').click(function(){
            $('.lfm').filemanager('image');
        });
        $('#filelfm').filemanager('file');
    </script>
@endsection

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">



                <div class="col-lg-12">
                    <h1> ثبت محصول </h1>
                </div>
                <hr>


                <script src="<?= Url('assets/admin/plugins/ckeditor/ckeditor.js'); ?>"></script>


                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="{{ route('product.add') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="row">


                        <div class="col-lg-2 col-md-62 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>دسته بندی محصول</label>

                                <select class="form-control" name="catid" onselect="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title  }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>



                        <div class="table-responsive">
                            <label for="picp">عکس های محصول</label>
                            <table id="picp" class="table-striped " style="width:100%">
                                <thead>
                                <tr>
                                    <th>انتخاب</th>
                                    <th>ادرس</th>
                                    <th>عکس</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody class="field_wrapper">

                                </tbody>
                            </table>
                            <a href="javascript:void(0);" id="addpic" class="btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

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





                                    <div class="row" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>عنوان محصول</label>
                                                <input class="form-control" name="title[fa]" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <textarea name="description[fa]" id="editor1" rows="10" cols="80">


                                        </textarea>
                                        <script>

                                            CKEDITOR.replace( 'editor1',
                                                {
                                                    filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                                                    filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                                                    filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/admin/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                                                });


                                        </script>
                                    </div>
                                    <div class="col-xs-12">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>عنوان</th>
                                                <th>توضیح</th>
                                                <th>حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody class="feature_fa_field">

                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0);" id="fafeature" class=" btn btn-success"><i class="fa fa-plus"></i></a>
                                    </div>


                                </div>


                                <div class="tab-pane fade" id="persian" style="direction: ltr; text-align: left">



                                    <div class="row" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label> Title</label>
                                                <input class="form-control" name="title[en]" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class=" col-xs-12">
                                        <textarea name="description[en]" id="editor2" rows="10" cols="80">


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
                                    <div class="col-xs-12">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody class="feature_en_field">

                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0);" id="enfeature" class=" btn btn-success"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت محصول
                    </button>

                    <a  class="btn btn-warning" style="margin-right: 10px" onclick="return confirm('به انصراف از ثبت محصول تمایل دارید؟');"  href="<?= Url('/admin/project' ); ?>"><i class="icon-remove"></i> </a>


</div>
                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->

        </div>
        </div>


        <!--END PAGE CONTENT -->



        <!-- PAGE LEVEL SCRIPTS -->
        <script src="<?= Url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>




<script>
    var fileCount = 0;
    var max_file=10;
    var z = 1; //Initial field counter is 1
    var addfile ='<tr>'+
        '<td>'+
        '<a data-input="Image'+fileCount+'" data-preview="holder'+fileCount+'"  class="lfm btn btn-primary">' +
        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
        '<td> <input id="Image'+fileCount+'" class="form-control" type="text" name="Pimages[]"> </td>'+
        '<td><img id="holder'+fileCount+'" style="margin-top:15px;max-height:100px;"></td>'+
        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html

    $('#addpic').click(function(){ //Once add button is clicked
        console.log('hey');
        if(z < max_file){ //Check maximum number of input fields
            z++; //Increment field counter
            $('.field_wrapper').append(addfile); // Add field html
            fileCount++;
            addfile ='<tr>'+
                '<td>'+
                '<a data-input="Image'+fileCount+'" data-preview="holder'+fileCount+'"  class="lfm btn btn-primary">' +
                '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                '<td> <input id="Image'+fileCount+'" class="form-control" type="text" name="Pimages[]"> </td>'+
                '<td><img id="holder'+fileCount+'" style="margin-top:15px;max-height:100px;"></td>'+
                '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html
            $('.lfm').filemanager('image');
        }
    });
    $('.field_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        z--; //Decrement field counter
    });


    var max_feature=10;
    var y = 1; //Initial field counter is 1
    var field1 ='<tr>'+
        '<td> <input class="form-control" type="text" name="ftitle[fa][]"> </td>'+
        '<td> <input class="form-control" type="text" name="fdesc[fa][]"> </td>'+
        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html

    $('#fafeature').click(function(){ //Once add button is clicked
        console.log('hey');
        if(y < max_feature){ //Check maximum number of input fields
            y++; //Increment field counter
            $('.feature_fa_field').append(field1); // Add field html
        }
    });

    $('.feature_fa_field').on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        y--; //Decrement field counter
    });



    var x = 1; //Initial field counter is 1
    var field2 ='<tr>'+
        '<td> <input class="form-control" type="text" name="ftitle[en][]"> </td>'+
        '<td> <input class="form-control" type="text" name="fdesc[en][]"> </td>'+
        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html

    $('#enfeature').click(function(){ //Once add button is clicked
        if(x < max_feature){ //Check maximum number of input fields
            x++; //Increment field counter
            $('.feature_en_field').append(field2); // Add field html
        }
    });

    $('.feature_en_field').on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        x--; //Decrement field counter
    });

    $('#video').on('change',function () {
        $('#videoID').load();
    });

</script>









@endsection