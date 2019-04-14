@extends('layouts.layout')

@section('content')



    <ul class="breadcrumbs" style="padding-top: 8px;padding-bottom: 6px">
        <li><a href="javascript:void(0)" title="">دسته بندی دوره ها </a></li>

        <li style="float: left"><a  class="bnt btn-sm btn-default  hover-shadow" href="<?= Url('/home/course/create/'); ?>" title=""><i class="fa fa-plus"></i>    افزودن دوره جدید  </a></li>

    </ul>



    <div class="col-md-12" style="min-height: 528px"><br>
        <div class="widget blank no-padding">
            <div class="tab-group"><br>


                @foreach($cats as $cat)
                <section id="tab{{$cat->id}}" title="{{$cat->title}}"><br>
                    <ul class="forum-threads" id="forum-scroll" style="margin-top: 15px ; padding-right: 16px">
                        <li>
                            <div class="main-content-area">
                                <div class="service-circle-sec" >
                                    <div class="row">

                                        @foreach($cat->subs($cat->id) as $sub)
                                        <div class="col-md-2 col-sm-6" style="float: right">
                                            <div class="service-circle">
                                                <img src="http://placehold.it/370x370" alt=""/>
                                                <div class="service-simple">
                                                    <a href="<?= Url('/home/course/list/'.$sub->id); ?>"><h3> {{$sub->title}} </h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach



                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>
                @endforeach


            </div>
        </div>
    </div>






@endsection