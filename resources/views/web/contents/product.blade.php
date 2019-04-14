@extends('web.layouts.layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">
    <style>
        .slider {
            width: 50%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: .5;
        }

        .slick-current {
            opacity: 1;
        }
    </style>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

@endsection
@section('content')
    <div class="view ">
        <div class="parallax7"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong text-center white-text p-5">

            <h1 class="mt-5 pt-5 pb-3 font-weight-bold">{{ $content->title[App::getLocale()] }}</h1>
            {{--<img src="img/9.png" class="m-auto" height="175" width="175"/>--}}
        </div>
    </div>

    <div class=" container mt-5">
        <div class="row border rad-20 p-4 mt-5 mb-5">
            <section class="swqslider col-md-12" style="direction: ltr">
                @if($content->images)
                    @foreach($content->images as $image)
                        <div><img src="{{$image}}"></div>
                    @endforeach
                @endif
            </section>
        </div>
        <div class="row border rad-20 p-4 mt-5 mb-5">
            <div class="col-md-12">
                <h2 class="ml-5">{{ $content->title[App::getLocale()] }}</h2>
                <ul>
                    <li class="p-2">
                        {!! $content->description[App::getLocale()] !!}
                    </li>
                </ul>

            </div>
        </div>
        <div class="row  border rad-20 p-4 mt-5 mb-5">
            <div class="col-md-12">
                <label for="">مشخصات:</label>
                <table class="table table-bordered">
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th scope="col"><span style="float: right">عنوان</span></th>--}}
                        {{--<th scope="col"><span style="float: right">توضیح</span></th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    <tbody>
                    @foreach($content->meta[App::getLocale()] as $key => $item)
                        <tr>
                            <td style="background-color: #eeeeee;width: 20%">{{$key}}</td>
                            <td>{{$item}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="row border rad-20 p-4 mt-5 mb-5">--}}
            {{--<div class="col-md-12">--}}
                {{--<h2 >Client Requirements</h2>--}}
                {{--<p>--}}
                    {{--The challenge was to buy and sell the products for a person. Plus the need was to build the something--}}
                    {{--that had both the buying and selling platform. The need was to make the user who was selling something--}}
                    {{--into the application to give them the best return for their product.--}}
                {{--</p>--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<img src="img/21.png" height="586" width="1000"/>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row border rad-20 p-4 mt-5 mb-5">--}}
            {{--<div class="col-md-12">--}}
                {{--<h2 class="ml-5">App Features and Functionalities</h2>--}}
                {{--<ul>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}

                {{--</ul>--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<img src="img/22.png" height="729" width="1000"/>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row border rad-20 p-4 mt-5 mb-5">--}}
            {{--<div class="col-md-12">--}}
                {{--<h2 class="ml-5">Technical Implementations</h2>--}}
                {{--<ul>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}
                    {{--<li class="p-2">--}}
                        {{--An app which can be used to buy and sell products.--}}
                    {{--</li>--}}

                {{--</ul>--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row border rad-20 p-4 mt-5 mb-5">--}}
            {{--<div class="col-md-12">--}}
                {{--<h2 >Client Requirements</h2>--}}
                {{--<p>--}}
                    {{--The challenge was to buy and sell the products for a person. Plus the need was to build the something--}}
                    {{--that had both the buying and selling platform. The need was to make the user who was selling something--}}
                    {{--into the application to give them the best return for their product.--}}
                {{--</p>--}}

            {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="view">
        <div class="parallax3"></div>
        <div class="mask  waves-effect waves-light rgba-teal-strong">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <!-- Card -->
                    <div class="card m-auto w-75 h-530p">
                        <div>
                            <!-- Default form contact -->
                            <form action="{{ route('send.contactus') }}" method="post" class="text-center p-5 w-75">

                                <p class="h4 mb-4">@lang('home.Contact')</p>

                                <!-- Name -->
                                <input type="text" name="name" id="defaultContactFormName" class="form-control mb-4" placeholder="@lang('home.Name')">

                                <!-- Email -->
                                <input type="email" name="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="@lang('home.Email')">
                                <input type="number" class="form-control mb-4" name="tell" placeholder="@lang('home.Tell')">

                                <!-- Subject -->
                                {{--<label>@lang('home.Subject')</label>--}}
                                {{--<select class="browser-default custom-select mb-4">--}}
                                {{--<option value="" disabled>Choose option</option>--}}
                                {{--<option value="1" selected>Request</option>--}}
                                {{--<option value="2">Report</option>--}}
                                {{--<option value="3">Feedback</option>--}}
                                {{--<option value="4">Feature request</option>--}}
                                {{--</select>--}}
                                <input type="text" class="form-control mb-4" name="subject" class="form-control" placeholder="@lang('home.Subject')">

                                <!-- Message -->
                                <div class="form-group">
                                    <textarea name="contactMessage" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="@lang('home.Message')"></textarea>
                                </div>

                                <!-- Copy -->
                            {{--<div class="custom-control custom-checkbox mb-4">--}}
                            {{--<input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">--}}
                            {{--<label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>--}}
                            {{--</div>--}}

                            <!-- Send button -->
                                <button class="btn btn-info btn-block" type="submit">@lang('home.Submit')</button>

                            </form>
                            <!-- Default form contact -->
                        </div>
                        <div class="form-side ">
                            <p>
                                @if(App::getLocale() == 'en')
                                    {{ $utility['contact']->data['description'] }}
                                @elseif(App::getLocale() == 'fa')
                                    {{ $utility['contact']->data['description_fa'] }}
                                @endif
                            </p>

                        </div>

                    </div>
                    <!-- Card -->
                </div>
            </div>
        </div>
    </div>



@endsection
@section('end')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{asset('slick/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).on('ready', function() {
            $('.swqslider').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });

        });

    </script>
@endsection
