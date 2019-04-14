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
                                        مدیریت دسته بندی ها
                                        <a data-toggle="modal"
                                           data-target="#{{1}}" style="float: left"
                                           class="btn btn-primary  btn-sm"><i class="icon-plus"></i>&nbsp;&nbsp; افزودن دسته بندی </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            @foreach($categories as  $category)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse{{$category->id}}">
                                                                @if($category->section == 1)
                                                                    <i style="color: #00aa00" class="icon-ok"></i>
                                                                    &nbsp;{{$category->title}}</a>
                                                            @else
                                                                <i class="icon-book"></i>
                                                                &nbsp;{{$category->title}}</a>
                                                            @endif
                                                        </h4>


                                                    </div>
                                                    <div id="collapse{{$category->id}}"
                                                         class="panel-collapse collapse ">
                                                        <div class="panel-body">


                                                                <form name="_token" method="POST"
                                                                      enctype="multipart/form-data"
                                                                      action="<?= Url('admin/category/update/' . $category->id); ?>">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }} ">


                                                                    <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                        <label> نام فارسی دسته بندی</label>
                                                                        <input class="form-control" name="title_fa"
                                                                               value="{{$category->title_fa}}">
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                        <label>   جایگاه</label>
                                                                        <select class="form-control" name="section">
                                                                            <option value="0" @if($category->section == 0 )
                                                                            selected
                                                                                    @endif >بلاگ
                                                                            </option>
                                                                            <option value="1" @if($category->section == 1 )
                                                                            selected
                                                                                    @endif >منوی بالا
                                                                            </option>
                                                                            <option value="1" @if($category->section == 2 )
                                                                            selected
                                                                                    @endif > غیر فعال
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5  col-sm-12 col-xs12 form-group">
                                                                        <label> نام انگلیسی دسته بندی</label>
                                                                        <input style="direction: ltr" class="form-control" name="title"
                                                                               value="{{$category->title}}">
                                                                    </div>

<br><br><br><br>

                                                                    <a type="submit" onclick="return confirm('آیا از حذف مشخصات مدرس مطمئن هستید؟');"
                                                                       href="<?= Url('/admin/category/destroy/' . $category->id); ?>"
                                                                       class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف دسته بندی</a>
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
                    <h4 class="modal-title" id="myModalLabel">  افزدون دسته بندی</h4>
                </div>
                <div class="modal-body">

                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('admin/category/add') ?>">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">

                        <div class="">

                                <div class="col-lg-6 col-md-6  col-sm-12 col-xs12">
                                <label> نام فارسی دسته بندی</label>
                                <input class="form-control" name="title_fa">


                                    <label>   جایگاه</label>
                                    <select class="form-control" name="section" >
                                        <option value="0"  >بلاگ
                                        </option>
                                        <option value="1">منوی بالا
                                        </option>
                                        <option value="1" > غیر فعال
                                        </option>

                                    </select>


                                <label> نام انگلیسی دسته بندی </label>
                                <input class="form-control" name="title">
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