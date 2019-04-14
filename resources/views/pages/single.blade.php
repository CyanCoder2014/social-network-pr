@extends('layouts.layout')
@section('content')
    <div id="" class="note" style="display: none">پست شما با موفقیت ارسال گردید <a id="close">[close]</a></div>
    <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">خطا در ارسال پست! <a id="close">[close]</a></div>
    <style type="text/css">
        .ajax-load {
            width: 100%;}
    </style>

                    <div class="col-md-12" style="min-height: 580px">
                        <div class="blog-single">
                            <div class="blog">
                                <div class="blog-thumb">
                                </div>
                                <div class="blog-info">
                                    <h2>{{$content->title}}</h2><br>



                                   {!! $content->intro !!}




                                </div>
                            </div>
                        </div>

                    </div>





@endsection