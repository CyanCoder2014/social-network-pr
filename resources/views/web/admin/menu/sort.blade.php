@extends('web.layouts.admin')

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> مدیریت منو </h1>
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
                                    <th>&nbsp;نام</th>
                                    <th>&nbsp;نوع</th>
                                    <th>&nbsp;فعال</th>
                                    <th>&nbsp;ویرایش</th>
                                    <th>&nbsp;حذف</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach( $menus as $menu )


                                    <tr class="odd gradeX">
                                        <td style="text-align: center"><a href="{{ route('menu.edit',['id'=> $menu->id]) }}"><i class="icon-gear"></i> </a>  </td>
                                        <td> {{\Illuminate\Support\Str::words($menu->name['fa'], $words = 6, $end = '...') }} </td>

                                        <td style="text-align: center">
                                            {{config('menu.'.$menu->type)}}
                                        </td>
                                        <td>@if($menu->active)<i class="fa fa-check"></i>@else<i class="fa fa-times"></i>@endif</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('menu.edit',['id'=> $menu->id]) }}"><i class="icon-gear"></i></a>
                                        </td>
                                        <td style="text-align: center">
                                            @if($menu->deletable)
                                            <a onclick="return confirm('آیا از حذف مطمئن هستید؟');"  href="{{ route('menu.delete',['id'=> $menu->id]) }}"><i class="icon-remove"></i> </a>
                                            @endif
                                        </td>

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
                                <th>&nbsp; name</th>
                                <th>&nbsp; type</th>
                                <th>&nbsp; actice</th>
                                <th>&nbsp;Edit</th>
                                <th>&nbsp;Delete</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach( $menus as $menu )


                                <tr class="odd gradeX">
                                    <td style="text-align: center"><a href="{{ route('menu.edit',['id'=> $menu->id]) }}"><i class="icon-gear"></i> </a>  </td>
                                    <td> {{\Illuminate\Support\Str::words($menu->name['en'], $words = 6, $end = '...') }} </td>

                                    <td style="text-align: center">
                                        {{config('menu.'.$menu->type)}}
                                    </td>
                                    <td>@if($menu->active)<i class="fa fa-check"></i>@else<i class="fa fa-times"></i>@endif</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('menu.edit',['id'=> $menu->id]) }}"><i class="icon-gear"></i></a>
                                    </td>
                                    <td style="text-align: center">
                                        @if($menu->deletable)
                                            <a onclick="return confirm('آیا از حذف مطمئن هستید؟');"  href="{{ route('menu.delete',['id'=> $menu->id]) }}"><i class="icon-remove"></i> </a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
{{$menus->links()}}
        </div>
    </div>
    </div>





                <div class=" footer">
                    @permission('menu-create')
                    <a type="button" class="btn btn-primary btn-circle btn-lg" href="{{ route('menu.create') }}"><i class="icon-plus"></i></a>
                    @endpermission
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