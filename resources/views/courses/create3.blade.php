@extends('layouts.layout')

@section('content')





    <ul class="breadcrumbs" style="">
        <li>   <h4> {{$course->title}} <a href="<?= Url('/home/course/edit/'.$course->id); ?>" title=""> <small> (ویرایش) </small>  </a></h4> </li>

        <li style="float: left; margin-right: 15px;margin-top: 10px"><a data-toggle="modal" data-target=".add-forum" class="bnt btn-sm btn-default  hover-shadow" href="<?= Url('/home/slide/manage/'.$course->id); ?>" title=""><i class="fa fa-plus"></i>    افزودن و مدیریت  اسلاید  </a></li>
        <li style="float: left; margin-right: 15px;margin-top: 10px"><a data-toggle="modal" data-target=".add-forum" class="bnt btn-sm btn-default  hover-shadow" href="<?= Url('/home/course/manage/'); ?>" title=""><i class="fa fa-book"></i>     لیست دوره ها  </a></li>

    </ul>


    <div class="main-content-area">


        <form  id="podForm" name="_token" method="POST" enctype="multipart/form-data"
               action="<?= Url('/home/podcast/add/'.$course->id); ?>">
            {{ csrf_field() }}


        <div class="row" style="min-height: 558px"><br>
            <div class="col-md-12">
                <div class="task-sec">
                    <section id="task-form">

                        <div class="col-md-12" style="margin-bottom: 20px">
                            <div class="widget ">
                                <div class="welcome-message ">
                                    <p>برای افزودن پادکست بعد انتخاب عنوان و فایل صوتی روی دکمه "افزودن پادکست" کلیک نمایید</p>
                                    <span class="close-message delete-cart"><i class="fa fa-close"></i></span>
                                </div>
                            </div>
                        </div>



                        <button type="submit" name="_token" value="{{ csrf_token() }}" style="width: 100%; background-color: #0091cb" class="add-pod"> <i class="fa fa-music"></i> افزودن پادکست</button>
                        <input style="width: 40%" class="add-pod" title="فایل ترک"  type="file" name="link" placeholder="فایل ترک">
                        <input style="width: 60%" class="add-pod" type="text" name="title" placeholder="عنوان ترک">

                        <section id="task-container">
                            <div class="row">
                                <br><br>
                                <div class="col-md-12">
                                    <ul id="pod-list">
                                        @foreach($pods as $pod)
                                            <li id="{{$pod->id}}" class="col-md-6"><span id="{{$pod->id}}" class="del12" style="float: left;color: #902b2b"><i class="fa fa-close"></i></span><h4>{{$pod->title}}</h4>  </li>
                                        @endforeach
                                    </ul>
                                </div>



                            </div>

                        </section>


                    </section>



                </div>

            </div>
        </div>

        </form>

    </div>

<script>



//    $(document).ready(function (e) {
//        $('#slideForm').on('submit',(function(e) {
//            e.preventDefault();
//
//            if(2==3) {
//                alert('فرمت فایل انتخابی مورد تایید نمی باشد!');
//            }else{
//                $("textarea#intro").css("display", "none");
//                $("#upload").css("display", "block");
//                $("#postSubmit").css("display", "none");
//                var formData = new FormData(this);
//                $.ajax({
//                    type:'POST',
//                    url: $(this).attr('action'),
//                    data:formData,
//                    cache:false,
//                    contentType: false,
//                    processData: false,
//                    success:function(data){
//                        console.log(data);
//                    },
//                    error: function(data){
//                        console.log('error333');
//                    }
//                });
//            }
//        }));
//    });





</script>

    <script src="<?= Url('assets/js/jquery2.min.js'); ?>"></script>
    <script src="<?= Url('assets/js/pod-add.js'); ?>"></script>


      @endsection