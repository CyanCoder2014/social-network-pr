@extends('layouts.layout')

@section('content')







    <div class="main-content-area">



        <form  id="courseForm" name="_token" method="POST" enctype="multipart/form-data"
               action="<?= Url('/home/course/update/'.$course->id); ?>">
            {{ csrf_field() }}



        <div class="row" style="min-height: 558px"><br><br>
            <div class="col-md-12">
                <div class="task-sec">




                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div><p style="float: right"> تصویر دوره </p><br><br>


                            @if($course->image !== null)
                                <img src="{{'../../../course-img/'.$course->image}}"
                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                            @endif



                            <input  title="تصویر دوره" type="file" name="image" value="{{$course->image}}" style="position: absolute; margin-top: 10px" accept="images/*"/>
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div ><p style="float: right">  زمان هر اسلاید</p>
                            <select  class="form-control"  name="state" >

                                <option value="10000"
                                @if($course->state == '10000')
                                   selected
                                @endif
                                >10 ثانیه</option>
                                <option value="20000"
                                        @if($course->state == '20000')
                                        selected
                                        @endif
                                >20 ثانیه</option>
                                <option value="30000"
                                        @if($course->state == '30000')
                                        selected
                                        @endif>30 ثانیه</option>
                                <option value="40000"
                                        @if($course->state == '40000')
                                        selected
                                        @endif>40 ثانیه</option>
                                <option value="0"
                                        @if($course->state == '0')
                                        selected
                                        @endif>توقف</option>

                            </select>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div ><p style="float: right">  مطلب</p>
                            <select  class="form-control"  name="cat_id" >
                                @foreach($cats as $cat)
                                <option
                                        @if($cat->id == $course->cat->id)
                                        selected
                                        @endif
                                        value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div><p style="float: right">  عنوان دوره</p>
                            <input required  class="form-control" type="text" name="title" value="{{$course->title}}" placeholder="عنوان دوره">
                        </div>
                    </div>


                    <br><br><br><br><br>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <p>معرفی و توضیحات</p>
                    <textarea required title="text" name="text" id="editor2" rows="10" cols="80">{{$course->text}}</textarea>
                    </div>


                </div>

            </div>
        </div>

      <br><br>

        <button  type="submit" name="_token" value="{{ csrf_token() }}" style="width: 100%;padding: 15px" class="btn btn-success green-bg">ذخیره دوره و افزودن اسلاید و پادکست </button>
        </form>

    </div>

<script>


</script>

    <script src="<?= Url('assets/js/jquery2.min.js'); ?>"></script>
    <script src="<?= Url('assets/js/slide-add.js'); ?>"></script>

    <script>
        CKEDITOR.replace( 'editor2',{
            filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
            filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
            filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
        });

    </script>
      @endsection