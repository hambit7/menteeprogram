<?php

$minArrayValue = 0;
$maxArrayValue = 10;
$maxArrayValue = 10000;
$arraySize = 100;
$equalNumber = 7;

function dataGenerator($minArrayValue , $maxArrayValue, $arraySize) {
    return array_map(function () use($minArrayValue, $maxArrayValue) {
        return rand($minArrayValue, $maxArrayValue);
    }, array_fill(0, $arraySize, null));
};

$inputArray = dataGenerator($minArrayValue, $maxArrayValue, $arraySize);

$inputData = [
    'Simple array' =>
        [
            1, 2, 78, 3, 88, 123, 335, 76, 4, 13, 51, 20, 11, 15, 21, 21, 8542, 21, 11, 123
        ],
    'Random array' => $inputArray,
    'Random sorted array' =>call_user_func(function(array $a){sort($a);return $a;}, $inputArray),
    'Random sorted array DESC' =>call_user_func(function(array $a){rsort($a);return $a;}, $inputArray),
    'Array with equal values' => dataGenerator($equalNumber, $equalNumber, $arraySize)
];
