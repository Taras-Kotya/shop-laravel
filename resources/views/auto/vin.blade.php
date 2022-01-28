<?php
$response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/" . $vin . "?format=json");
$brand = $response['Results'][6]['Value'];
$model = $response['Results'][8]['Value'];
$year = $response['Results'][9]['Value'];

$api_url = '/'
    . $name . '/'
    . $gos_nomer . '/'
    . $color . '/'
    . $vin . '/'
    . $brand . '/'
    . $model . '/'
    . $year;


    exit(redirect('/auto/get'.$api_url));

    