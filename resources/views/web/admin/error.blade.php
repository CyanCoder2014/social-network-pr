@extends('layouts.admin')

@section('admin_content')

    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">
                <br> <br>

        <div class="col-lg-8 col-lg-offset-2 text-center">
            <div class="logo">
                <h1>خطای 403 !</h1>
            </div>
            <p class="lead text-muted">دسترسی شما به این بخش محدود شده است</p>
            <div class="clearfix"></div>
            <br> <br>

            <div class="clearfix"></div>
            <br />
            <div class="col-lg-6  col-lg-offset-3">
                <div class="btn-group btn-group-justified">
                    <a href="<?= Url('/admin' ); ?>" class="btn btn-primary">بازگشت به داشبورد</a>
                    <a href="<?= Url('/' ); ?>" class="btn btn-success">بازگشت به وبسایت</a>
                </div>

            </div>
        </div>
            </div>
        </div>
    </div>






@endsection