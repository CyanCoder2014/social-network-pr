@extends('layouts.admin')

@section('admin_content')

    <?php $role_id = array() ?>

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

                <section id="lts_sec " class="right" style="margin: 10px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h1>اطلاعات کاربران</h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>

                                            <th>&nbsp; نام کاربر</th>
                                            <th style="text-align: center">&nbsp; نقش</th>
                                            <th style="text-align: center">&nbsp;ایمیل</th>
                                            <th>تاریخ ثبت</th>
                                            <th> آخرین بازدید</th>
                                            <th style="text-align: center">چزئیات</th>
                                            <th style="text-align: center">حذف</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <?php $role_id = array() ?>
                                            <tr class="odd gradeX">

                                                <th>
                                                    &nbsp; {{\Illuminate\Support\Str::words($user->name, $words = 6, $end = '...') }}</th>

                                                <th style="text-align: center">&nbsp;

                                                    @if(!empty($user->roles))
                                                        @foreach($user->roles as $v)
                                                            <?php $role_id[]= $v->id ?>
                                                            <a class="btn btn-success btn-line btn-sm ">{{ $v->display_name }}</a>
                                                        @endforeach
                                                    @endif
                                                    @if($user->usertype == 'Admin')
                                                        <a class="btn btn-success btn-line btn-sm ">ادمین کل</a>
                                                    @endif
                                                </th>
                                                <th style="text-align: center">
                                                    &nbsp; {{$user->email}}

                                                </th>

                                                <th>!!</th>
                                                <th> !!</th>
                                                <th style="text-align: center">
                                                    @permission('user-edit')
                                                    <a data-toggle="modal"
                                                                                  data-target="#{{$user->id}}"
                                                                                  class="btn btn-warning btn-line btn-sm"
                                                                                  href="<?= Url('admin/user/show/' . $user->id); ?>"><i
                                                                class="fa fa-user"></i> </a>
                                                    @endpermission
                                                </th>
                                                <th style="text-align: center">
                                                    @permission('user-delete')
                                                    <a
                                                            onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟');"
                                                            href="<?= Url('admin/user/destroy/' . $user->id); ?>"><i
                                                                class="fa fa-remove"></i> </a>
                                                    @endpermission
                                                </th>
                                            </tr>

                                            <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel"> ویرایش کاربر</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form name="_token" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="<?= route('user.update', $user->id); ?>">
                                                                {{ csrf_field() }}

                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">

                                                                <div class="row">

                                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                                                                        <div class="form-group">
                                                                            <label> نام کاربری</label>
                                                                            <input class="form-control" name="name"
                                                                                   value="{{$user->name}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> ایمیل </label>
                                                                            <input type="email" class="form-control"
                                                                                   name="email" value="{{$user->email}}">
                                                                        </div>

                                                                        <label> نقش</label>
                                                                        @foreach($roles as $role)
                                                                            <label>{{$role->display_name}}</label>
                                                                            <input type="checkbox" name="roles[]" value="{{$role->id}}" @if(in_array($role->id,$role_id))checked @endif>
                                                                        @endforeach
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit" name="_token"
                                                                            value="{{ csrf_token() }}"
                                                                            class="btn btn-primary">ذخیره تغییرات
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


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <br><br>
                    </div>


                </section>
            </div>
        </div>
    </div>


    <!--PAGE CONTENT -->



@endsection