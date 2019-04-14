@extends('layouts.layout')


@section('content')


    <?php

   // $results = DB::select('select * from jos_categories where id = 22');
    if(DB::connection()->getDatabaseName())
    {
        echo "connected successfully to database ".DB::connection()->getDatabaseName();
      // print_r($results);
    }
    else{
        echo "connected failed";
    }

    $servername = "89.221.83.242";
    $username = "root";
    $password = "8BLcTx7Ah3cXKNoQIOit";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pii_b", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>




    @endsection

