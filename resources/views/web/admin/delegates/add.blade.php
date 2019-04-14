@extends('layouts.admin')

@section('admin_content')

    <style>
        #map-canvas{
            width: 100%;
            height: 360px;
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('googlemap.key')}}&libraries=places&callback=initMap"
            type="text/javascript"></script>

    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">



                <div class="col-lg-12">
                    <h1> ثبت نمایندگی </h1>
                </div>
                <hr>



                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="{{ route('del.store') }}">
                    {{ csrf_field() }}
                    <input type="hidden"  name="lng" id="lng" @if(old('lng')) value="{{old('lng')}}" @endif>
                    <input type="hidden"  name="lat" id="lat" @if(old('lat')) value="{{old('lat')}}" @endif>
                    <div class="row">


                        <div class="form-group col-md-12 col-xs-12">
                            <label for="">Map</label>
                            <!-- <input type="text" id="searchmap"> -->
                            <div id="map-canvas" ></div>
                        </div>
                        <div>
                            <label for="phone">شماره تلفن</label>
                            <!-- or set via JS -->
                            <input id="phone" type="text" name="tel" value="{{old('tel')}}" />
                        </div>
                    </div>



                    <div class="panel panel-default">



                        <div class="panel-body">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#english" data-toggle="tab">فارسی</a>
                                </li>
                                <li><a href="#persian" data-toggle="tab">English</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="english">
                                    <div class="row col-lg-12" style="z-index: 99">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>نام نمایندگی</label>
                                                <input class="form-control" name="name_fa" value="{{old('name_fa')}}">
                                            </div>
                                            <div class="form-group">

                                            <label>آدرس</label>
                                                <textarea name="address_fa" id="editor1" rows="3" cols="80">
                                                        {{old('address_fa')}}


                                                </textarea>
                                            </div>
                                        </div>
                                    </div>



                                </div>




                                <div class="tab-pane fade" id="persian" style="direction: ltr; text-align: left">



                                    <div class="tab-pane fade in active" id="english">
                                        <div class="row col-lg-12" style="z-index: 99">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>name</label>
                                                    <input class="form-control" name="name" value="{{old('name')}}">
                                                </div>
                                                <div class="form-group">

                                                    <label>address</label>
                                                    <textarea name="address" id="editor1" rows="3" cols="80">
                                                        {{old('address')}}


                                                </textarea>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn btn-primary">
                        ثبت
                    </button>

                    <a  class="btn btn-warning" style="margin-right: 10px" onclick="return confirm('به انصراف تمایل دارید؟');"  href="{{ route('delegate') }}"><i class="icon-remove"></i> </a>



                </form>


            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->

        </div>
    </div>


        <!--END PAGE CONTENT -->



        <!-- PAGE LEVEL SCRIPTS -->


    <script>


        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat: 35.714553,
                lng: 51.367118
            },
            zoom:10
        });
        @if(old('lng') && old('lat') )
        var marker = new google.maps.Marker({
            position: {
                lat: old('lat'),
                lng: old('lng')
            },
            map: map,
            draggable: true
        });
        @else
        var marker;
        @endif
        google.maps.event.addListener(map, 'click', function(event) {
            if (marker && marker.setMap) {
                marker.setMap(null);
            }
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());
        });


        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
    </script>










@endsection