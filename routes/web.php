<?php

use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Стартова сторінка
Route::get('/auto', function () {
    require '../resources/views/libs/app.php';
    return view('auto.new');
});


// Повертаємо спарсені данні
Route::get('/auto/vin/{vin}', function ($vin) {
    return view('auto.vin', $vin);
});


// Спарсив данні, і переправив додавати заявку
Route::post('/auto/post', function () {
    $post = Request::only('name', 'gos_nomer', 'color', 'vin');
    return view('auto.vin', $post);
});


// Спарсив данні, і переправив додавати заявку
Route::get(
    '/auto/get/{name}/{gos_nomer}/{color}/{vin}',
    function ($name, $gos_nomer, $color, $vin) {
        return view(
            'auto.vin',
            [
                'name' => $name,
                'gos_nomer' => $gos_nomer,
                'color' => $color,
                'vin' => $vin
            ]
        );
    }
);



Route::get(
    '/auto/get/{name}/{gos_nomer}/{color}/{vin}/{brand}/{model}/{year}',
    function ($name, $gos_nomer, $color, $vin, $brand, $model, $year) {
        $auto = DB::table('auto')->find($gos_nomer);
        if (!empty($auto->id)) {
            return 'Уже существует';
        }
        return view(
            'auto.add',
            [
                'auto' => $auto,
                'name' => $name,
                'gos_nomer' => $gos_nomer,
                'color' => $color,
                'vin' => $vin,
                'brand' => $brand,
                'model' => $model,
                'year' => $year
            ]
        );
    }
);


/*
функція перевірки авто в бд
функція парсинга параметрів:    brand    model    year

додаємо в бд


*/