@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="main-content-area"><br>
            <div class="product-sec">
                <div class="row">
                    @foreach($cats as $cat)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-box">
                            <div style=" height: 250px" class="product-thumb">
                                <img  src="<?= Url('cat-img/'. $cat->image) ?>" alt="" />
                                <a href="#cat{{$cat->id}}" title="" class="add-to-cart" style="line-height: 21px; font-size: 13px">
                                    <br>
                                {!! \Illuminate\Support\Str::words($cat->title, $words = 8, $end = '...') !!}
                                    <!--
                                    @foreach($cat->subs($cat->id) as $sub)
                                    {{$sub->title}} <br>
                                    @endforeach
                                    -->
                                    </a>
                            </div>
                            <!--
                            <h3><a style="font-size: 15px" href="#cat{{$cat->id}}" title="">
                                    {!! \Illuminate\Support\Str::words($cat->title, $words = 6, $end = '...') !!}
                                    </a></h3>
                                    -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><br><hr><br>
                    @foreach($cats as $cat)
                    <ul class="breadcrumbs" style="border: 1px solid #4e8deb !important;">
                        <li><a href="javascript:void(0)" title=""><i class="fa fa-arrow-circle-down"></i> {{$cat->title}}</a></li>
                        <li></li>
                    </ul>
                    <div id="cat{{$cat->id}}" class="widget white">
                        <div id="wrapper2">
                            <table id="keywords" cellspacing="0" cellpadding="0" >
                                <thead style="border-bottom: 1px solid #4e8deb !important;">
                                <tr >
                                    <th ><span>  دسته ها</span></th>
                                    <th><span> تعداد گروه ها</span></th>
                                    <th><span>تعداد تالار ها</span></th>
                                    <th><span>تعداد پست ها</span></th>
                                    <th><span>آخرین ارسال</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cat->subs($cat->id) as $sub)
                                    <tr>
                                    <td ><a   href="<?= Url('home/forum/list/'. $sub->id) ?>"> {{$sub->title}}</a></td>
                                    <td> {!!  $sub->groups()->count() !!}</td>
                                        <td> {!!  $sub->forums()->count() !!} </td>
                                        @if($sub->forums()->first() !== null)
                                        <td> {!!  $sub->forums()->first()->postNumber($sub->forums()->first()->id) !!} </td>
                                        @else
                                            <td> - </td>
                                        @endif

                                        @if($sub->forums()->first() !== null)
                                        <td> {!!    until_time($sub->forums()->first()->created_at) !!} </td>
                                            @else
                                            <td> - </td>
                                        @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection