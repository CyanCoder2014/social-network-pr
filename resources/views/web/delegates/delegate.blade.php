@extends('layouts.layout')

@section('content')

    <!-- Page Header Start -->
    <div id="pageHeader" data-bg-img="img/background-img/page-header-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title">
                        <h2>{{ $del->name[App::getLocale()] }}</h2>
                    </div>
                    <div class="breadcrumb-holder">
                        <ul class="breadcrumb">
                            <li><a href="index.html{{ url('/'.App::getLocale()) }}">@lang('home.home')</a></li>
                            <li class="active">{{ $del->name[App::getLocale()] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- About Description Start -->
    <div class="about-description">
        <div class="container">
            <div class="row">
                <!--<div class="col-md-6">
                    <div class="about-desc-img">
                        <img src="img/about-page-img/about-description.jpg" alt="" />
                    </div>
                </div>-->
                <div class="col-md-12">
                    <div class="about-desc-content">
                        <p>{{ $del->address[App::getLocale()] }}</p>
                        <p><i class="fa fa-phone"></i> <span>{{ $del->tel }}</span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Description End -->
    <!-- MAP Area Start -->

    <div id="map1" style="width:100%;height:500px"></div>

    <script>
        function myMap1() {
            var myCenter = new google.maps.LatLng({{ $del->lat }},{{ $del->lng }});
            var mapCanvas = document.getElementById("map1");
            var mapOptions = {center: myCenter, zoom: 14};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map);

            var infowindow = new google.maps.InfoWindow({
                content: "{{ $del->name[App::getLocale()] }}"
            });
            infowindow.open(map,marker);
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaqGnZkKhHpn0Drix-OExvH698GALXino&callback=myMap1"></script>




@endsection