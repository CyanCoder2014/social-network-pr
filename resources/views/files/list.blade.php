@extends('layouts.layout')

@section('content')






    <ul class="breadcrumbs">
        <li><a href="javascript:void(0)" title="">
                @foreach($fileCats as $fileCat)
                            @if($fileCat->id == $filesId)
                            {{$fileCat->title}}
                            @endif
                @endforeach
            </a></li>
        <li> {{$files->count()}} فایل</li>
        <li style="float:left;margin-left: -30px;margin-right: 10px"><a id="search-file" class="btn btn-default"><i
                        class="fa fa-search"></i></a></li>
        @if(Auth::check())
        <li style="float:left;"><a data-toggle="modal" data-target="#file-upload" class="btn btn-default"><i
                        class="fa fa-cloud-upload"></i></a></li>
            @endif
    </ul>


    <div class="search_widget" style="margin-top:80px;display: none">
        <form name="_token" method="POST" enctype="multipart/form-data"
              action="<?= Url('/home/file/search'); ?>">
            {{ csrf_field() }}
            <input name="input" placeholder="عنوان فایل را جستجو کنید ..." type="text">
            <button type="submit" name="_token" value="{{ csrf_token() }}" style="background-color: #33b7a0"><i class="fa fa-search"></i></button>
        </form>
    </div>


    <div class="main-content-area">
        <div class="square-services-sec">
            <div class="row" style="min-height: 555px">
                <br><br>

@if($files->count() == 0)
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;فایلی یافت نشد!</p>
    @endif


            @foreach($files as $file)

                    <div class="col-md-2 col-sm-6">
                        <div data-toggle="modal" data-target="#file-{{$file->id}}" class="square-services"
                             style="height: 170px">
                            <img src="<?= Url('/images/0055.jpg'); ?>" alt=""/>
                            <div class="square-infos">
                                @if(Auth::check())
                                    @can('delete', $file)
                                    <span style="float: left;margin-right: 15px;margin-top: 7px;font-size: 18px; color:#5e5e55">
                                        <a onclick="return confirm('آیا از حذف این فایل مطمئن هستید؟');" href="<?= Url('home/file/delete/'.$file->id); ?>"><small><i class="fa fa-remove"></i></small></a></span>
                                    @endcan
                                @endif


                                <i style="font-size: 20px" class="fa fa-file"></i><br>
                                <p>{!! \Illuminate\Support\Str::words($file->title , $words = 8, $end = '...') !!}</p>
                                @if(Auth::check())
                                <a   href="<?= Url('/files/' . $file->link); ?>" title=""><i
                                            class="fa fa-cloud-download"></i></a>
                                @endif
                            </div>
                        </div><!-- square services -->
                    </div>
                @endforeach







            </div>
        </div><!-- Services Sec -->
    </div>


    <script>
        $(document).ready(function () {
            $("#search-file").click(function () {
                $(".search_widget").css("display", "block");
            });
        });

    </script>




    @foreach($files as $file)
        <div class="modal fade" id="file-{{$file->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> جزئیات فایل </h4>
                    </div>
                    <div class="modal-body">

                        <h3>{{$file->title}}</h3>
                        <br>
                        <p>{!! $file->description !!}</p>
                        <hr>
                        <span> توسط:  <a title="{{$file->user->name.' '.$file->user->family}}"   href="<?= Url('home/profile/show/137-'.$file->user->id.'-42-'.$file->user->username); ?>">{!! $file->user->username !!}</a> </span>
                        <hr>
                        <span> برچسب ها:
                            @foreach($file->tag as $tag)
                                {{$tag->title.', '}}
                                @endforeach
                        </span>


                        <br><br>

                        <div class="modal-footer">
                            @if(Auth::check())
                            <a   href="<?= Url('/files/' . $file->link); ?>" type="button" name="_token"
                               class="btn btn-success"><i class="fa fa-cloud-download"></i>
                            </a>
                            @endif
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">بستن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach













    <div class="modal fade" id="file-upload" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> آپلود فایل </h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/file/upload/'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label> عنوان </label>
                                    <input required type="text" class="form-control" name="title"
                                           value="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sec"><p>انتخاب دسته بندی </p>
                                    <select class="form-control" name="cat_id">
                                        @foreach($fileCats as $fileCat)
                                            <option
                                                    @if($fileCat->id == $filesId)
                                                    selected
                                                    @endif
                                                    value="{{$fileCat->id}}">{{$fileCat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label> فایل </label>
                                    <input required type="file" name="file"
                                           value="">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label> توضیحات </label>

                                    <textarea required title="intro" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">
                                    <div class="example tag_typeahead"><br>
                                        <p>برچسب ها:</p>
                                        <div class="bs-example">
                                            <input type="text" name="tags" value="" />
                                        </div>
                                        <div class="accordion">
                                            <div class="accordion-group"></div>
                                            <!--<input type="text" value="" data-role="tagsinput" />-->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <br><br>

                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary"><i class="fa fa-cloud-upload"></i>
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