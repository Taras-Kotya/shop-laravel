<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- ($name, $gos_nomer, $color, $vin) -->

<body>
    <h1>Додати в БД:</h1>
    {{ Form::open(array('url' => 'auto/post')) }}
    <p>
        {{ Form::label('name', 'Ваше ім\'я', array('class' => 'awesome')) }}<br>
        {{ Form::text('name', 'Ivan Ivanov', ['placeholder' => 'Ivan Ivanov','required']);}}
    </p>
    <p>
        {{ Form::label('gos_nomer', 'Номер авто:', array('class' => 'awesome')) }}
        (<small>
            <font color="red">* не повторюватись</font>
        </small>) <br>
        {{ Form::text('gos_nomer', 'AA '. rand(1111,9999).' SS', ['placeholder' => 'АВ 1234 СС','required']);}}
    </p>
    <p>
        {{ Form::label('color', 'Колір', array('class' => 'awesome')) }}<br>
        {{ Form::select('color', ColorAuto::List() );}}
    </p>
    <p>
        {{ Form::label('vin', 'VIN', array('class' => 'awesome')) }}<br>
        {{ Form::text('vin', '3FA6P0VP1HR282209', ['placeholder' => '3FA6P0VP1HR282209','required']);}}
    </p>
    <p>
        {{ Form::submit('Сохранить!'); }}
    </p>
    {{ Form::close() }}


    <h2>БД:</h2>
    <?php
    $titles = DB::table('auto')->get()
    ?>


    <ul>
        @foreach ($titles as $asd)
        <li>
            <pre>{{ print_r($asd) }}</pre>
        </li>
        @endforeach
    </ul>




</body>

</html>