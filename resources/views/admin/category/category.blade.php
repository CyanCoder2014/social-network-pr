@extends('layouts.layout')

@section('content')



    <div class="main-content-area">
        <div class="row" style="margin-top: 50px; min-height: 560px">
            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-ink-pen"></i></span>
                        <h3>دسته بندی پست ها و فایل ها</h3>
                        <p>یک سطحی</p>
                        <a href="<?= Url('/home/admin/list/3'); ?>" title="" class="c-btn medium blue-bg"> تنظیمات</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-file"></i></span>
                        <h3>دسته بندی تالار ها</h3>
                        <p>دو سطحی</p>
                        <a href="<?= Url('/home/admin/list/2'); ?>" title="" class="c-btn medium red-bg"> تنظیمات</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-briefcase"></i></span>
                        <h3>دسته بندی دوره ها</h3>
                        <p>دو سطحی</p>
                        <a href="<?= Url('/home/admin/list/5'); ?>" title="" class="c-btn medium blue-bg">تنظیمات </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-map-alt"></i></span>
                        <h3>دسته بندی رویداد ها</h3>
                        <p>یک سطحی</p>
                        <a href="<?= Url('/home/admin/list/4'); ?>" title="" class="c-btn medium red-bg">تنظیمات </a>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection