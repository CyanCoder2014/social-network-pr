@extends('layouts.layout')

@section('content')




    <div id="content">
        <br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 0px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                </div>



                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                        مدیریت دسته بندی ها
                                        <a data-toggle="modal"
                                           data-target="#{{1}}" style="float: left"
                                           class="btn btn-primary  btn-sm"><i class="icon-plus"></i>&nbsp;&nbsp; افزودن دسته بندی </a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">






                                            @if($categories->first() !== null)
                                                @foreach($categories as $category)
                                                    @if(Auth::user()->can('Manager', \App\Contents\Post::class))
                                                        @if(Auth::user()->can('Admin', \App\Contents\Post::class) || Auth::user()->forumCat[0]->id == $category->parent_id)
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                                           href="#collapse{{$category->id}}">
                                                                            @if($category->parent_id==0)
                                                                                <i style="color: #00aa00" class="fa fa-check"></i>
                                                                                &nbsp;{{$category->title}}</a>
                                                                        @else
                                                                            <i class="fa fa-table"></i>
                                                                            &nbsp;{{$category->title}}</a>
                                                                        @endif
                                                                    </h4>


                                                                </div>
                                                                <div id="collapse{{$category->id}}"
                                                                     class="panel-collapse collapse ">
                                                                    <div class="panel-body">


                                                                        <form name="_token" method="POST"
                                                                              enctype="multipart/form-data"
                                                                              action="<?= Url('home/admin/category5/update/' . $category->id); ?>">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="_token"
                                                                                   value="{{ csrf_token() }} ">
                                                                            <input type="hidden" name="state"
                                                                                   value="1">


                                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 ">
                                                                                <img src="{{'../../../cat-img/'.$category->image}}"
                                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                                <input type="hidden" name="images"
                                                                                       value="{{ $category->image}} ">


                                                                                <div><input type="file"
                                                                                            name="images_u"
                                                                                            value="images_u"
                                                                                            accept="images/*"/>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                                <label>   سردسته</label>
                                                                                <select class="form-control" name="parent_id">
                                                                                    <option value="0" @if($category->parent_id == 0)
                                                                                    selected
                                                                                            @endif > سر دسته
                                                                                    </option>

                                                                                    @foreach($categories as $category12)
                                                                                        @if($category12->parent_id == 0)
                                                                                            <option value="{{$category12->id}}"
                                                                                                    @if($category->parent_id == $category12->id )
                                                                                                    selected
                                                                                                    @endif > {{$category12->title}}
                                                                                            </option>
                                                                                        @endif
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-5 col-md-5  col-sm-12 col-xs12 form-group">
                                                                                <label> نام دسته بندی</label>
                                                                                <input style="" class="form-control" name="title"
                                                                                       value="{{$category->title}}">
                                                                            </div>

                                                                            <br><br><br><br>

                                                                            <a type="submit" onclick="return confirm('آیا از حذف دسته بندی مطمئن هستید؟');"
                                                                               href="<?= Url('/home/admin/category5/destroy/' . $category->id); ?>"
                                                                               class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف دسته بندی</a>
                                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif

                                                @endforeach
                                            @endif









                                        </div>
                                    </div>
                                </div>

                                {{$categories->links()}}
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
                    <h4 class="modal-title" id="myModalLabel">  افزودن دسته بندی</h4>
                </div>
                <div class="modal-body">

                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/admin/category5/add') ?>">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <input type="hidden" name="state"
                               value="1">

                        <div class="">

                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12">
                                <label> عنوان دسته بندی</label>
                                <input class="form-control" name="title">



                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 form-group">
                                    <label>   سردسته</label>
                                    <select class="form-control" name="parent_id">


                                        @if(Auth::user()->can('admin', \App\Contents\Post::class))
                                            <option value="0"
                                                    @if($categories->first() !== null)
                                                    @if($category->parent_id == 0)
                                                    selected
                                                    @endif
                                                    @endif
                                            > سر دسته
                                            </option>
                                            @if($categories->first() !== null)
                                                @foreach($categories as $category12)
                                                    @if($category12->parent_id == 0)
                                                        <option value="{{$category12->id}}"
                                                                @if($category->parent_id == $category12->id )
                                                                selected
                                                                @endif > {{$category12->title}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @elseif(Auth::user()->can('justManager', \App\Contents\Post::class))
                                            @foreach(Auth::user()->forumCat as $categoryM)
                                                <option value="{{$categoryM->id}}" selected> {{$categoryM->title}}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>


                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">


                                    <div><input type="file"
                                                name="images_u"
                                                value="images_u"
                                                accept="images/*"/>
                                    </div>

                                </div>






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









    <div class="modal fade large-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>





@endsection