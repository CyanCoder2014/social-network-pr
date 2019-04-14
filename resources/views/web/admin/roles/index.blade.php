@extends('layouts.admin')

@section('admin_content')
    <div id="content">

    <div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>مدیریت نقش ها</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> ساخت نقش جدید</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>شماره</th>
            <th>اسم</th>
            <th>توضیحات</th>
            <th>دسترسی ها</th>
            <th width="280px">اعمال ها</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td>

                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            @if($role->id == $v->role_id)
                            <label class="label label-success">{{ $v->display_name }}</label>
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">نمایش</a>
                    @permission('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">ویرایش</a>
                    @endpermission
                    @permission('role-delete')
                    <form method="get" style="display:inline" action="{{route('roles.destroy',$role->id)}}">
                        <button class="btn btn-danger" onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟');">حذف</button>
                    </form>
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
    </div>
    </div>
@endsection