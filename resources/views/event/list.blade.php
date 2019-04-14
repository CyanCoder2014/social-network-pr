@extends('layouts.layout')

@section('content')


   <!-- <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> -->
    <script src="<?= Url('assets/js/DSAudioPlayer.js'); ?>"></script>

    <ul class="breadcrumbs">
        <li><a href="javascript:void(0)" title="">Home</a></li>
        <li>{{$eventId}}'s</li>
    </ul>
    <div class="main-content-area"><br><br>
        <div class="collapse-sec">
            <div id="accordian2" class="c-collapse">

                @foreach($events as $event)

                <h2 class="
                  @if($event->id == $eventId)
                active
                 @endif

"><i class="ti-save-alt"></i>{{$event->title}} &nbsp; (
                    @if($event->cat !== null)
                    {{$event->cat->title}}
                    @endif
                    )</h2>
                <div class="content" style="display:
                     @if($event->id == $eventId)
                     block;
                        @else
                        none;
                    @endif


"
                     @if($event->id == $eventId)
                     about="ss"
                        @endif>
                    <p> <span style="color: #c7254e">{{$event->start}} </span> &nbsp;&nbsp;لغایت&nbsp;&nbsp;    <span style="color: #c7254e">{{$event->finish}} </span> </p>
                    <br>
                    <span  class="img1" ><img style="max-height: 360px!important; overflow: hidden!important;" src="<?= Url('/event-img/'.$event->image); ?>" alt=""/></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>&nbsp;مکان:  &nbsp;{{$event->place}} </span>&nbsp;
                    <br> <br>
                    <p>{{$event->description}} </p>
                </div>
                @endforeach




            </div>
        </div><!-- Accordian -->
    </div>





    <script>

    </script>
      @endsection