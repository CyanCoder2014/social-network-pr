@extends('layouts.layout')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <style>
        .right12{
            float: right;
            text-align: left;
            margin-top: 10px;

        }
        .margin-12{

            direction: rtl ;
            margin-top: 42px;
            margin-bottom: 39px;
        }
        .control-group.required label:after{
            content: "*";
            color: red;
        }
        td{
           text-align: right;
        }

    </style>


    <div class="container">
        <div class="row margin-12">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">لطفا اطلاعات زیر را جهت ثبت نام وارد نمایید. </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>کد رهگیری</th>
                                    <th>قیمت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $transaction->getTrackingCode() }}</td>
                                    <td>{{ $transaction->getPrice() }}</td>
                                </tr>
                            </tbody>

                        </table>
                     <p>ثبت نام شما با موفقیت انجام شد</p>
                        <a href="{{ url('/') }}">صفحه اصلی</a>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function getCities(th)
        {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        function getCities_2(th)
        {

            selected_city = $('#city_2').attr('data-selected') || null;


            $('#city_2').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city_2').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city_2').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city_2').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        $(document).ready(function() {

            $('#province').select2();
            $('#city').select2();
            @if(old('province_id'))
            getCities($('#province'));
            @endif
            $('#province_2').select2();
            $('#city_2').select2();
            @if(old('province_id_2'))
            getCities_2($('#province_2'));
            @endif
            switch ($("input[name='personality']:checked").val()) {
                case 'legal':
                    $('.real-p').hide();
                    $('.legal-p').show();
                    break;
                case 'real':
                    $('.real-p').show();
                    $('.legal-p').hide();
                    break;
            }

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });
        $(document).on('change', '#province_2', function (e) {
            getCities_2(this);
//            $(this).siblings('.city').select2();

        });
        $("input[name='personality']").on('change', function (e) {
            switch ($(this).val()) {
                case 'legal':
                    $('.real-p').hide();
                    $('.legal-p').show();
                    break;
                case 'real':
                    $('.real-p').show();
                    $('.legal-p').hide();
                    break;
            }

        });
    </script>
@endsection