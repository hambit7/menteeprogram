<?php

$dataCount = 100;
$min = 0;
$max = 10;
$count = 100;

function dataGenerator($min , $max, $count) {
    return array_map(function () use($min, $max) {
        return rand($min, $max);
    }, array_fill(0, $count, null));
};

$inputArray = dataGenerator($min, $max, $count);

$inputData = [
    'Simple array' =>
        [
            1, 2, 78, 3, 88, 123, 335, 76, 4, 13, 51, 20, 11, 15, 21, 21, 8542, 21, 11, 123
        ],
    'Random array' => $inputArray,
    'Random sorted array' =>call_user_func(function(array $a){sort($a);return $a;}, $inputArray),
    'Random sorted array DESC' =>call_user_func(function(array $a){rsort($a);return $a;}, $inputArray),
    'Array with equal values' => dataGenerator(7, 7, $count)
];
