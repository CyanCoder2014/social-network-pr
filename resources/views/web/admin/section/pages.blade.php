@extends('layouts.admin')

@section('admin_content')


    <!--PAGE CONTENT -->
    <div id="content">

        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1>  لینک صفحات </h1>
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

                                    <th>&nbsp; ترتیب</th>
                                    <th>&nbsp; عنوان</th>
                                    <th>&nbsp;دسته بندی</th>
                                    <th>&nbsp;انتشار</th>
                                    <th style="text-align: center">&nbsp;لینک فارسی</th>
                                    <th style="text-align: center" >&nbsp;لینک انگلیسی</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach( $contents as $content )
                                    <tr class="odd gradeX">
                                        <td style="text-align: center"><a href="<?= Url('/admin/content/edit/'.$content->id ); ?>"><i class="icon-gear"></i> </a>  </td>
                                        <td> {{\Illuminate\Support\Str::words($content->title, $words = 5, $end = '...') }} </td>
                                        <td>Blog </td>
                                        <td style="text-align: center">
                                            @if($content->publish == 0)
                                                <i class="icon-ok"></i>
                                            @else
                                                <i class="icon-minus"></i>
                                            @endif
                                        </td>
                                        <td style="text-align: center"> <?= URL('/fa/content/'.$content->id) ?></td>
                                        <td style="text-align: center"><?= URL('/en/content/'.$content->id) ?></td>

                                    </tr>
                                @endforeach
                                @foreach( $projects as $content )
                                    <tr class="odd gradeX">
                                        <td style="text-align: center"><a href="<?= Url('/admin/content/edit/'.$content->id ); ?>"><i class="icon-gear"></i> </a>  </td>
                                        <td> {{\Illuminate\Support\Str::words($content->title, $words = 5, $end = '...') }} </td>
                                        <td>Project </td>
                                        <td style="text-align: center">
                                            @if($content->publish == 0)
                                                <i class="icon-ok"></i>
                                            @else
                                                <i class="icon-minus"></i>
                                            @endif
                                        </td>
                                        <td style="text-align: center"> <?= URL('/fa/project/'.$content->id) ?></td>
                                        <td style="text-align: center"><?= URL('/en/project/'.$content->id) ?></td>

                                    </tr>
                                @endforeach
                                <!--
                                -->
                                </tbody>
                            </table>
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