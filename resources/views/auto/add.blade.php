<?php

DB::insert('insert into `auto` 
(`name`,`gos_nomer`,`color`,`vin`,`brand`,`model`,`year`) values 
(?, ?, ?, ?, ?, ?, ?)',
[$name, $gos_nomer,  $color, $vin, $brand, $model, $year]
);

?>

Успішно додано