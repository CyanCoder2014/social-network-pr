
@extends('layouts.admin')

@section('admin_content')

    <div id="content">
    <div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ویرایش نقش</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="post"  enctype="multipart/form-data" action="{{route('roles.update',['id' => $role->id])}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>نام (انگلیسی):</strong>
                        <input type="text" name="name" placeholder='Name' class="form-control" value="{{$role->name}}" disabled="disabled">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>نام برای نمایش:</strong>
                        <input type="text" name="display_name" placeholder='Display Name' class="form-control" value="{{$role->display_name}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>توضیحات:</strong>
                        <textarea name="description" data-value="" style="height:100px" class="form-control">{{$role->description}}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>دسترسی ها:</strong>
                        <br/>
                        @foreach($permission as $value)
                            <label><input type="checkbox" name="permission[]" value="{{$value->id}}" class="name" @if(in_array($value->id, $rolePermissions)) checked @endif>
                                {{ $value->display_name }}</label>
                            <br/>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
    </div>
    @endsection