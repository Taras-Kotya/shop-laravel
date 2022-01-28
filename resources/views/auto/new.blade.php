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
        {{ Form::text('name', null, ['placeholder' => 'Ivan Ivanov']);}}
    </p>
    <p>
        {{ Form::label('gos_nomer', 'Номер авто', array('class' => 'awesome')) }}<br>
        {{ Form::text('gos_nomer', null, ['placeholder' => 'АВ 1234 СС']);}}
    </p>
    <p>
        {{ Form::label('color', 'Колір', array('class' => 'awesome')) }}<br>
        {{ Form::select('color', ColorAuto::List() );}}
    </p>
    <p>
        {{ Form::label('vin', 'VIN', array('class' => 'awesome')) }}<br>
        {{ Form::text('vin', '3FA6P0VP1HR282209', ['placeholder' => '3FA6P0VP1HR282209']);}}
    </p>
    <p>
        {{ Form::submit('Сохранить!'); }}
    </p>
    {{ Form::close() }}
</body>

</html>