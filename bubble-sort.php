<?php
require_once 'helper.php';
require_once 'data_source.php';

function compare($a, $b)
{
    return $a > $b;
}

function bubbleSort(array $data,  $left = null, $right = null, $reset=false)
{
    static $iterations = 0;
    if($reset) {
        $iterations = 0;
    }

    for ($i = 0; $i < count($data) - 1; $i++) {
        $next = $i + 1;
        if (compare($data[$i], $data[$next])) {
            list($data[$i], $data[$next]) = [$data[$next], $data[$i]];
            $iterations++;
            return bubbleSort($data);
        }
    }

    return  [
        'data' => $data,
        'dataCount' => count($data),
        'iterationsCount' => $iterations,
        'type' => 'bubbleSort'
    ];
}




