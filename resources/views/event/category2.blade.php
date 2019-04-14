@extends('layouts.layout')

@section('content')




    <div class="main-content-area">
        <div class="service-circle-sec">
            <div class="row"><br><br>


@foreach($eventCats as $eventCat)
                <div class="col-md-3 col-sm-6">
                    <div class="service-circle">
                        <img src="http://placehold.it/370x370" alt="" />
                        <div class="service-simple">
                            <a><h3>{{$eventCat->title}} </h3></a>
                            <p><a href=""> {{$eventCat->events->count()}}  رویداد </a></p>
                        </div>
                    </div>
                </div>
    @endforeach




            </div>
        </div>
    </div>



      @endsection