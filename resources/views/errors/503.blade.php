@extends('layouts.layout')

@section('content')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>



        .content {
            margin: 250px 0px 300px 0px;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            font-weight: 100;
            font-family: 'Lato';
            vertical-align: middle;
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
            line-height: 1;
        }
    </style>




    <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-warning">
                {{ session()->get('message') }}
            </div>
        @endif


        <div class="content">
            <div class="title">Be right back.</div>
        </div>
    </div>


@endsection
