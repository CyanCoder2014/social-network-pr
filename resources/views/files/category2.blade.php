@extends('layouts.layout')

@section('content')


<!--
    <ul class="breadcrumbs">
        <li><a href="javascript:void(0)" title="">Home</a></li>
        <li>  2</li>
    </ul>-->
    <div class="main-content-area">
        <div class="team-sec"><br>
            <div class="row" style="min-height: 592px">




                @foreach($fileCats as $fileCat)

                <div class="col-md-3">
                    <div class="team">
                        <img style="height: 185px" src="<?= Url('/cat-img/'.$fileCat->image); ?>" alt="" />
                        <div class="team-info-sec">
                            <div class="team-info">
                                <h3><a href="<?= Url('home/file/list/'.$fileCat->id); ?>" title="">{{$fileCat->title}}  </a></h3>
                                <span> <small>{{$fileCat->files()->get()->count()}} فایل</small></span>
                                <a title="" href="<?= Url('home/file/list/'.$fileCat->id); ?>"><i class="fa fa-folder-open-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach




            </div>
        </div>
    </div>



      @endsection