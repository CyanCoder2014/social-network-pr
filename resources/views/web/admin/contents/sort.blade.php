@extends('web.layouts.admin')

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> مدیریت مطالب </h1>
                </div>
                <hr>

                @if(session()->has('message'))
                    <br>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

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




                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example1"
                                   class="odd gradeX">
                                <thead>
                                <tr>

                                    <th>&nbsp; ترتیب</th>
                                    <th>&nbsp; عنوان</th>
                                    <th>&nbsp;دسته بندی</th>
                                    <th>&nbsp; صفحه اول</th>
                                    <th>&nbsp;انتشار</th>
                                    <th>&nbsp;نویسنده/منبع</th>
                                    <th>&nbsp;تاریخ انتشار</th>
                                    <th>&nbsp;ویرایش</th>
                                    <th>&nbsp;حذف</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach( $contents as $key => $content )


                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{ ++$key }}</td>
                                        <td> {{\Illuminate\Support\Str::words($content->title_fa, $words = 6, $end = '...') }} </td>
                                        <td>{{ \Illuminate\Support\Str::words( $categories->keyBy('id')[$content->catid]->title_fa, $words = 4, $end = '...')}} </td>
                                        <td style="text-align: center">
                                            @if($content->f_page == 1)
                                                <i class="icon-ok"></i>
                                                @else
                                                <i class="icon-minus"></i>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            @if($content->publishـfa == 0)
                                                <i class="icon-ok"></i>
                                            @else
                                                <i class="icon-minus"></i>
                                            @endif
                                        </td>
                                        <td> {{\Illuminate\Support\Str::words($content->authorـfa, $words = 4, $end = '...') }} </td>
                                        <td>{!! until_time($content->created) !!}</td>
                                        @permission('conetnt-edit')
                                        <td style="text-align: center"><a href="<?= Url('/admin/content/edit/'.$content->id ); ?>"><i class="icon-gear"></i> </a>  </td>
                                        @endpermission
                                        @permission('conetnt-delete')
                                        <td style="text-align: center"><a onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟');"  href="<?= Url('/admin/content/destroy/'.$content->id ); ?>"><i class="icon-remove"></i> </a> </td>
                                        @endpermission
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>


</div>

            <div class="tab-pane fade" id="persian">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2"
                               class="odd gradeX">
                            <thead>
                            <tr>

                                <th>&nbsp; sort</th>
                                <th>&nbsp; Title</th>
                                <th>&nbsp; Category</th>
                                <th>&nbsp;  Home</th>
                                <th>&nbsp;Publish</th>
                                <th>&nbsp;Source/Author</th>
                                <th>&nbsp; Date</th>
                                <th>&nbsp;Edit</th>
                                <th>&nbsp;Delete</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach( $contents as $content_ )


                                <tr class="odd gradeX">
                                    <td style="text-align: center">{{ ++$key }}</td>
                                    <td> {{\Illuminate\Support\Str::words($content_->title, $words = 6, $end = '...') }} </td>
                                    <td>{{ \Illuminate\Support\Str::words( $categories->keyBy('id')[$content_->catid]->title, $words = 4, $end = '...')}} </td>
                                    <td style="text-align: center">
                                        @if($content_->f_page == 1)
                                            <i class="icon-ok"></i>
                                        @else
                                            <i class="icon-minus"></i>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if($content_->publish == 0)
                                            <i class="icon-ok"></i>
                                        @else
                                            <i class="icon-minus"></i>
                                        @endif
                                    </td>
                                    <td> {{\Illuminate\Support\Str::words($content_->author, $words = 4, $end = '...') }} </td>
                                    <td>{!! until_time($content_->created) !!}</td>
                                    @permission('conetnt-edit')
                                    <td style="text-align: center"><a href="<?= Url('/admin/content/edit/'.$content->id ); ?>"><i class="icon-gear"></i> </a>  </td>
                                    @endpermission
                                    @permission('conetnt-delete')
                                    <td style="text-align: center"><a onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟');"  href="<?= Url('/admin/content/destroy/'.$content->id ); ?>"><i class="icon-remove"></i> </a> </td>
                                    @endpermission
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            {{$contents->links()}}
        </div>
    </div>
    </div>





                <div class=" footer">
                    <a type="button" class="btn btn-primary btn-circle btn-lg" href="<?= Url('admin/content/create'); ?>"><i class="icon-plus"></i></a>

                </div>
            </div>
        </div>
    </div>




    <!--END MAIN WRAPPER -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?= Url('assets/admin/plugins/dataTables/jquery.dataTables.js'); ?>"></script>
    <script src="<?= Url('assets/admin/plugins/dataTables/dataTables.bootstrap.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

@endsection