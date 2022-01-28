<?php

class ColorAuto {
    public function List(){
        static $ColorAutoAllArray = array(
            'green' => 'Зелений',
            'white' => 'Білий',
            'red' => 'Червоний'
        );
        return $ColorAutoAllArray;
    }
}