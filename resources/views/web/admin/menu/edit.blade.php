@extends('layouts.admin')

@section('admin_content')
    <style>
        .disappear{
            display: none;
        }
    </style>
    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">



                <div class="col-lg-12">
                    <h1> ایجاد منو </h1>
                </div>
                <hr>



                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="{{ route('menu.update',['id' =>$item->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row">

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="">سر دسته</label>
                            <!-- <input type="text" id="searchmap"> -->
                            <select name="parent_id">
                                <option value="0">ندارد</option>
                                @foreach($menus as $menu)
                                    @if($menu->id != $item->id)
                                    <option value="{{$menu->id}}"
                                            @if($menu->id == $item->parent_id)
                                            selected
                                            @endif
                                    >{{$menu->name['fa']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="">نوع</label>
                            <!-- <input type="text" id="searchmap"> -->
                            <select id="type" name="type">
                                @foreach(config('menu') as $key => $menu)
                                    <option value="{{$key}}"
                                            @if($key == $item->type)
                                            selected
                                            @endif
                                    >{{$menu}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="">فعال</label>
                            <select id="active" name="active">
                                <option value="0">غیرفعال</option>
                                <option value="1" @if($item->active) selected @endif>فعال</option>

                            </select>
                        </div>
                        <div class="disappear">
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="">تعداد</label>
                                <input  type="text" name="paginate" value="{{$item->paginate}}" />
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="">ترتیب</label>
                                <select name="sort">
                                    <option value="desc"
                                            @if("desc" == $item->sort)
                                            selected
                                            @endif
                                    >از پایین به بالا</option>
                                    <option value="asc"
                                            @if("asc" == $item->sort)
                                            selected
                                            @endif>از بالا به پایین</option>
                                </select>
                            </div>
                        </div>
                        <div class="projectcategory">
                            <label for="">دسته بندی پروژه</label>
                            <select id="projectcategory" name="projectcategory">
                                    @foreach($prcategories as $category)
                                      <option value="{{$category->id}}"
                                              @if(($item->type == 4 ||$item->type == 5) && $item->link['fa'] == $category->id )
                                              selected @endif>
                                                    {{$category->title_fa}}
                                      </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="contentcategory">
                            <label for="">دسته بندی مطلب</label>
                            <select id="contentcategory" name="contentcategory">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    @if(($item->type == 4 ||$item->type == 5) && $item->link['fa'] == $category->id )
                                        selected @endif>
                                        {{$category->title_fa}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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
                                    <div class="row col-lg-12" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="">نام</label>
                                                <input id="fa_name" class="name" type="text" name="name[fa]" value="{{$item->name['fa']}}" />
                                            </div>
                                            <div class="form-group link">

                                                <label>لینک</label>
                                                <input id="fa_link"  type="text" name="link[fa]" value="{{$item->link['fa']}}" />
                                            </div>
                                        </div>
                                    </div>



                                </div>




                                <div class="tab-pane fade" id="persian" style="direction: ltr; text-align: left">



                                    <div class="tab-pane fade in active" id="english">
                                        <div class="row col-lg-12" style="z-index: 99">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="">name</label>
                                                    <input id="en_name" class="name" type="text" name="name[en]" value="{{$item->name['en']}}" />
                                                </div>
                                                <div class="form-group link">

                                                    <label>link</label>
                                                    <input id="en_link"  type="text" name="link[en]" value="{{$item->link['en']}}" />
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت
                    </button>

                    <a  class="btn btn-warning" style="margin-right: 10px" onclick="return confirm('به انصراف تمایل دارید؟');"  href="{{route('menu')}}"><i class="icon-remove"></i> </a>



                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->

        </div>
    </div>


    <!--END PAGE CONTENT -->



    <!-- PAGE LEVEL SCRIPTS -->


    <script>
        if($('#type').val() == 1){
            $('.link').show();
            $('.disappear').hide();
            $('.contentcategory').hide();
            $('.projectcategory').hide();
        }
        else if($('#type').val() == 2 || $('#type').val() == 3) {
            $('.disappear').show();
            $('.link').hide();
            $('.contentcategory').hide();
            $('.projectcategory').hide();
        }
        else if($('#type').val() == 4) {
            $('.disappear').hide();
            $('.link').hide();
            $('.contentcategory').show();
            $('.projectcategory').hide();
        }
        else if($('#type').val() == 5) {
            $('.disappear').hide();
            $('.link').hide();
            $('.contentcategory').hide();
            $('.projectcategory').show();
        }


        $('#type').on('change',function () {
            if($('#type').val() == 1){
                $('.link').show();
                $('.disappear').hide();
                $('.contentcategory').hide();
                $('.projectcategory').hide();
            }
            else if($('#type').val() == 2 || $('#type').val() == 3) {
                $('.disappear').show();
                $('.link').hide();
                $('.contentcategory').hide();
                $('.projectcategory').hide();
            }
            else if($('#type').val() == 4) {
                $('.disappear').hide();
                $('.link').hide();
                $('.contentcategory').show();
                $('.projectcategory').hide();
            }
            else if($('#type').val() == 5) {
                $('.disappear').hide();
                $('.link').hide();
                $('.contentcategory').hide();
                $('.projectcategory').show();
            }

        });
        $('#contentcategory').on('change',function () {
            $('#en_link').val($('#contentcategory').val());
            $('#fa_link').val($('#contentcategory').val());

        });
        $('#projectcategory').on('change',function () {
            $('#en_link').val($('#projectcategory').val());
            $('#fa_link').val($('#projectcategory').val());

        });

    </script>










@endsection