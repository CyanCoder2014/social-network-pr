@extends('layouts.admin')

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> مدیریت نمایندگی ها </h1>
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
                                    <th>&nbsp;آدرس</th>
                                    <th>&nbsp;تاریخ ایجاد</th>
                                    <th>&nbsp;ویرایش</th>
                                    <th>&nbsp;حذف</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach( $contents as $content )


                                    <tr class="odd gradeX">
                                        <td style="text-align: center"><a href="{{ route('del.edit',['id'=> $content->id]) }}"><i class="icon-gear"></i> </a>  </td>
                                        <td> {{\Illuminate\Support\Str::words($content->name['fa'], $words = 6, $end = '...') }} </td>

                                        <td style="text-align: center">
                                            {{$content->address['fa']}}
                                        </td>
                                        <td>{!! Jdate::to_jalali($content->created) !!}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('del.edit',['id'=> $content->id]) }}"><i class="icon-gear"></i></a>
                                        </td>
                                        <td style="text-align: center">
                                            <a onclick="return confirm('آیا از حذف این پروژه مطمئن هستید؟');"  href="{{ route('del.delete',['id'=> $content->id]) }}"><i class="icon-remove"></i> </a>
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
                                <th>&nbsp; address</th>
                                <th>&nbsp; Date</th>
                                <th>&nbsp;Edit</th>
                                <th>&nbsp;Delete</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach( $contents as $content )


                                <tr class="odd gradeX">
                                    <td style="text-align: center"><a href="{{ route('del.edit',['id'=> $content->id]) }}"><i class="icon-gear"></i> </a>  </td>
                                    <td> {{\Illuminate\Support\Str::words($content->name['en'], $words = 6, $end = '...') }} </td>

                                    <td style="text-align: center">
                                        {{$content->address['en']}}
                                    </td>
                                    <td>{!! Jdate::to_jalali($content->created) !!}</td>
                                    <td style="text-align: center">
                                        @permission('delegate-edit')
                                        <a href="{{ route('del.edit',['id'=> $content->id]) }}"><i class="icon-gear"></i></a>
                                        @endpermission
                                    </td>
                                    <td style="text-align: center">
                                        @permission('delegate-delete')
                                        <a onclick="return confirm('آیا از حذف این پروژه مطمئن هستید؟');"  href="{{ route('del.delete',['id'=> $content->id]) }}"><i class="icon-remove"></i> </a>
                                        @endpermission
                                    </td>

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
                    @permission('delegate-create')
                    <a type="button" class="btn btn-primary btn-circle btn-lg" href="{{ route('del.create') }}"><i class="icon-plus"></i></a>
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