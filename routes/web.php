<?php

use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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
Route::get('/', function () {
    require '../resources/views/libs/app.php';
    return view('new');
});
Route::get('/auto', function () {
    require '../resources/views/libs/app.php';
    return view('new');
});


// Повертаємо спарсені данні
Route::get('/auto/vin/{vin}', function ($vin) {
    return view('auto.vin', $vin);
});


// Спарсив данні, і переправив додавати запис в БД
Route::post('/auto/post', function () {
    $post = Request::only('name', 'gos_nomer', 'color', 'vin');
    return view('auto.vin', $post);
});


// Спарсив данні, і переправив додавати запис в БД
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




// Додаю всі данні через GET в базу данних
Route::get(
    '/auto/get/{name}/{gos_nomer}/{color}/{vin}/{brand}/{model}/{year}',
    function ($name, $gos_nomer, $color, $vin, $brand, $model, $year) {
        $id_nomer = DB::table('auto')->where('gos_nomer',$gos_nomer)->value('id');
        if(!empty($id_nomer)){
            return 'В базі вже є такий держ.номер авто';
        } else {
            return view(
                'auto.add',
                [
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
    }
);


/*
функція перевірки авто в бд
функція парсинга параметрів:    brand    model    year

додаємо в бд


*/