@extends('web.layouts.admin')

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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif


                                <div class="panel panel-primary">

                                    <div class="panel-heading ">
                                     {{ $names[$type] }}
                                        <a data-toggle="modal"
                                           data-target="#{{1}}" style="float: left"
                                           class="btn btn-primary  btn-sm"><i class="icon-plus"></i>&nbsp;&nbsp;افزودن</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">







                                            @foreach($content as $text)

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$text->id}}">

                                                                <i class="icon-book"></i>
                                                                &nbsp;{{ $text->title }}</a>

                                                            <a onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟');"
                                                               href="{{ route('utility.destroy',['name' => $type,'id' => $text->id]) }}"
                                                               style="float:  left;">
                                                                حذف<i class="icon-trash"></i>
                                                            </a>

                                                        </h4>


                                                    </div>
                                                    <div id="collapse{{$text->id}}"
                                                         class="panel-collapse collapse ">
                                                        <div class="panel-body">

                                                            <form name="_token" method="post"
                                                                  enctype="multipart/form-data"
                                                                  action="{{ route('utility.update',['name' => $type,'id'=>$text->id]) }}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">


                                                                <div class="col-sm-12 col-xs-12 form-group">
                                                                    <label>  عنوان </label>
                                                                    <input class="form-control" name="title_a"
                                                                           value="{{$text->title}}">
                                                                </div>

                                                                @foreach($form as $key => $item)
                                                                    <div class="col-md-6  col-sm-12 col-xs-12 form-group">
                                                                        <label>{{$item['label']}}</label>
                                                                        @if($item['type']=='textarea')
                                                                            <textarea class="form-control" name="{{ $key }}">@if(isset($text->data[$key])){{$text->data[$key]}}@endif</textarea>
                                                                        @else
                                                                        <input class="form-control" name="{{ $key }}" type="{{$item['type']}}"
                                                                               value="@if(isset($text->data[$key])){{$text->data[$key]}}@endif"
                                                                           @if($item['style']) style="{{$item['style']}}" @endif>
                                                                        @endif
                                                                        @if($item['type']=='file' && isset($text->data[$key]))
                                                                            <a href="{{asset($text->data[$key])}}"><img style="; max-height: 150px;max-width: 150px; border: solid 2px #0080FF" src="{{asset($text->data[$key])}}"></a>
                                                                        @endif
                                                                    </div>
                                                                @endforeach

                                                                <div class="col-xs-2 form-group">
                                                                    <label>فعال</label>
                                                                    <input type="checkbox" class="form-control" name="active" value="true"
                                                                    @if($text->active) checked @endif>
                                                                </div>



                                                                <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                         class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach




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

    <!-- modal -->
    <div class="modal fade" id="{{1}}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">  افزدون مدرس</h4>
                </div>
                <div class="modal-body">

                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('utility.store',['name' => $type]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">



                        <div class="">
                            <div class="col-sm-12 col-xs-12 form-group">
                                <label>   عنوان اصلی</label>
                                <input class="form-control" name="title_a">
                            </div>
                            @foreach($form as $key => $item)
                                <div class="col-md-6  col-sm-12 col-xs-12 form-group">
                                    <label>{{$item['label']}}</label>
                                    @if($item['type']=='textarea')
                                        <textarea class="form-control" name="{{ $key }}"></textarea>
                                    @else
                                        <input class="form-control" name="{{ $key }}" type="{{$item['type']}}">
                                    @endif

                                </div>
                            @endforeach

                            <div class="col-xs-1 form-group">
                                <label>فعال</label>
                                <input type="checkbox" class="form-control" value="true" name="active">
                            </div>


                        </div>
                        <br><br><br><br><br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">افزودن
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


@endsection