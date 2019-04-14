@extends('layouts.layout')
@section('content')
        <ul class="breadcrumbs" style="padding-top: 6px">
            <li><a href="javascript:void(0)" title="">{{$cat->title}} </a></li>
            <li>انتخاب گروه:</li>
            <li>
                    <select  onchange="refreshData(this.value)" title="group" class="form-control" style="margin-top: -4px; margin-right: -32px; min-width: 200px">
                        <option value="0">همه گروه ها</option>

                        @foreach($cat->groups as $group)
                        <option value="{{$group->id}}">{{$group->title}}</option>

                        @endforeach



                    </select>
             </li>


            @if(Auth::check())
            @if(Auth::user()->can('admin', \App\Contents\ForumPost::class) ||  Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
                @can('director', \App\Contents\ForumPost::class )
            <li><a data-toggle="modal" data-target=".add-group" href="javascript:void(0)" title=""><i class="ti-plus"></i>   افزودن گروه </a></li>
            <li><a data-toggle="modal" data-target=".manage-group" href="javascript:void(0)" title="">   مدیریت گروه ها </a></li>
                @endcan
            @endif
            @endif


            @if(Auth::check())
            @if(Auth::user()->can('admin', \App\Contents\Post::class) || Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
            <li style="float: left"><a data-toggle="modal" data-target=".add-forum" class="bnt btn-sm btn-default blue-hover hover-shadow" href="javascript:void(0)" title=""><i class="fa fa-plus"></i>   افزودن تالار </a></li>
            @endif
            @endif
        </ul>



        <div class="main-content-area" style="min-height: 550px">
            <div class="row"><br><br><br>
                <div class="col-md-12">
                    <div class="widget white">
                        <div id="wrapper2">
                            <table id="keywords" cellspacing="0" cellpadding="0">
                                <thead>
                                <tr>
                                    <th><span> </span></th>
                                    <th><span>عنوان تالار </span></th>
                                    <th><span>تاریخ ایجاد</span></th>
                                    <th><span>گروه</span></th>
                                    <th><span>فعالیت ها </span></th>
                                    <th><span>آخرین ارسال</span></th>
                                    @if(Auth::check())
                                    @if(Auth::user()->can('admin', \App\Contents\Post::class) || Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
                                    <th><span> حذف تالار</span></th>
                                    @endif
                                    @endif
                                </tr>
                                </thead>


                                <tbody class="old-data">
                           @include('forums.listdata')
                                </tbody>

                                <tbody class="new-data">
                                </tbody>



                            </table>
                        </div>
                    </div>
                    <div style="direction: ltr !important;"> {{$cat->forums()->paginate(12)->links()}}</div>

                </div>
            </div>

        </div>




        @if(Auth::check())
            @if(Auth::user()->can('admin', \App\Contents\Post::class) || Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
        <div class="modal fade add-forum" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="<?= Url('/home/forum/make'); ?>">
                        {{ csrf_field() }}
                    <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                            <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                            <input type="hidden" name="cat_id" value="{{$cat->id}} ">

                     <div class="col-md-6">
                        <div class="input-group"><p style="float: right"> عنوان تالار</p>
                        <input required name="title" type="text" placeholder="" class="form-control">
                        </div>
                     </div>
                        <div class="col-md-6">
                            <div class="sec"><p> وضعیت</p>
                                <select class="form-control" name="state">
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
                            </div>
                     </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><p>انتخاب تصویر آیکون</p>
                            <input type="file" name="image" value="image" style="position: absolute; margin-top: 10px" accept="images/*"/>
                        </div>
                        <div class="col-md-6">
                            <div class="sec"><p>انتخاب گروه تالار</p>
                                <select class="form-control" name="group_id">
                                    <option value="0">بدون گروه</option>
                                    @foreach($cat->groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="col-md-12">
                        <textarea required title="text" name="intro" id="editor2" rows="10" cols="80" ></textarea><br>
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
            @endif
        @endif

        <script>
            CKEDITOR.replace( 'editor2',{
                filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
            });


            function refreshData(id){
                if (id == '0') {
                    $(".old-data").show();
                    $(".new-data").hide();
                }else {
                    $.ajax({
                        url: '/home/forum/getdataby/' + id,
                        type: "get",
//                        beforeSend:function(){
//                            return confirm('آیا  مطمئن هستید؟');
//                        },
                        success: function (data) {
                            $(".old-data").val('').hide();
                            $(".new-data").html(data.result);
                        }
            })
                }
            }

        </script>





        <div class="modal fade manage-group" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>


                        <div class="modal-body">


                            <div class="panel panel-primary">
                                <div class="panel-heading ">
                                    مدیریت گروه ها
                                </div>
                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">


                                        @if(Auth::check())
                                            @if(Auth::user()->can('admin', \App\Contents\ForumPost::class) ||  Auth::user()->forumCat->pluck('id')->contains($cat->parent_id))
                                                @can('director', \App\Contents\ForumPost::class )
                                            @foreach($cat->groups as $category)
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                                       href="#collapse{{$category->id}}">
                                                                            <i style="color: #00aa00" class="fa fa-check"></i>
                                                                            &nbsp;{{$category->title}}</a>
                                                                </h4>


                                                            </div>
                                                            <div id="collapse{{$category->id}}"
                                                                 class="panel-collapse collapse ">
                                                                <div class="panel-body">


                                                                    <form name="_token" method="POST"
                                                                          enctype="multipart/form-data"
                                                                          action="<?= Url('home/forum/groupedit/' . $category->id); ?>">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_token"
                                                                               value="{{ csrf_token() }} ">

                                                                        <div class="col-lg-5 col-md-5  col-sm-12 col-xs12 form-group">
                                                                            <label> نام  گروه</label>
                                                                            <input style="" class="form-control" name="title"
                                                                                   value="{{$category->title}}">
                                                                        </div>

                                                                        <br><br><br><br>

                                                                        <a type="submit" onclick="return confirm('آیا از حذف این گروه مطمئن هستید؟');"
                                                                           href="<?= Url('/home/forum/groupremove/' . $category->id); ?>"
                                                                           class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف دسته بندی</a>
                                                                        <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                                 class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>


                                            @endforeach
                                            @endcan
                                        @endif
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer" >
                            <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                        </div>
                </div>
            </div>
        </div>






        <div class="modal fade add-group" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>


                    <div class="modal-body">


                        <div class="panel panel-primary">
                            <div class="panel-heading ">
                                افزودن گروه
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">


                                    <form name="_token" method="POST"
                                          enctype="multipart/form-data"
                                          action="<?= Url('home/forum/groupadd/' ); ?>">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token"
                                               value="{{ csrf_token() }} ">
                                        <input type="hidden" name="cat_id"
                                               value="{{$cat->id}} ">

                                        <div class="col-lg-5 col-md-5  col-sm-12 col-xs12 form-group">
                                            <label> نام  گروه</label>
                                            <input style="" class="form-control" name="title"
                                                   value="">
                                        </div>

                                        <br><br><br><br>

                                        <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                 class="btn btn-primary  btn-sm"> افزودن</button>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" >
                        <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                    </div>
                </div>
            </div>
        </div>




@endsection