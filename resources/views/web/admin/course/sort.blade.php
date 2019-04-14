@extends('layouts.admin')

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> مدیریت دوره‌ها (کارگاه‌ها و سمینارها) </h1>
                </div>
                <hr>

                @if(session()->has('message'))
                    <br>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">


                    </div>


                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                                   class="odd gradeX">
                                <thead>
                                <tr>

                                    <th style="text-align: center">&nbsp; اولویت</th>
                                    <th>&nbsp; عنوان</th>
                                    <th>&nbsp;جزئیات</th>
                                    <th style="text-align: center">&nbsp; ظرفیت</th>
                                    <th style="text-align: center">&nbsp;ثبت نام شده</th>
                                    <th>&nbsp;تاریخ ثبت</th>
                                    <th>&nbsp;مدت (ساعت)</th>
                                    <th>&nbsp;قیمت (تومان)</th>
                                    <th style="text-align: center">&nbsp; ویرایش</th>
                                    <th style="text-align: center">&nbsp;حذف</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach( $contents as $contents )
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">
                                            @if($contents->publish == 1)
                                                <i class="icon-ok"></i>
                                            @else
                                                <i class="icon-minus"></i>
                                            @endif
                                        </td>
                                        <td> {{\Illuminate\Support\Str::words($contents->title, $words = 5, $end = '...') }} </td>
                                        <td> {{\Illuminate\Support\Str::words($contents->text, $words = 8, $end = '...') }} </td>
                                        <td style="text-align: center">
                                            <a class="btn btn-default btn-line btn-sm ">{{$contents->valency}}  </a>
                                        </td>
                                        <td style="text-align: center">
                                            <a class="btn btn-default btn-line btn-sm ">{{$contents->registered}}  </a>
                                        </td>
                                        <td> {{\Illuminate\Support\Str::words(to_jalali($contents->alias), $words = 1, $end = '') }} </td>
                                        <td>{!! $contents->hour!!}</td>
                                        <td>{!! $contents->price!!}</td>
                                        <td style="text-align: center"><a
                                                    href="<?= Url('/admin/course/edit/' . $contents->id); ?>"><i
                                                        class="icon-gear"></i></a></td>
                                        <td style="text-align: center"><a
                                                    onclick="return confirm('آیا از حذف این دوره مطمئن هستید؟');"
                                                    href="<?= Url('/admin/course/destroy/' . $contents->id); ?>"><i
                                                        class="icon-remove"></i> </a></td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
                <div class=" footer">
                    <a type="button" class="btn btn-primary btn-circle btn-lg"
                       href="<?= Url('admin/course/create'); ?>"><i class="icon-plus"></i></a>

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