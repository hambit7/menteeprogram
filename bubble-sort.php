<?php
require_once 'helper.php';
require_once 'data_source.php';

function compare($a, $b)
{
    return $a > $b;
}

function bubbleSort(array $data)
{
    for ($i = 0; $i < count($data) - 1; $i++) {
        $next = $i + 1;
        if (compare($data[$i], $data[$next])) {
            list($data[$i], $data[$next]) = [$data[$next], $data[$i]];
            return bubbleSort($data);
        }
    }
    return  [
        'data' => $data,
        'dataCount' => count($data),
        'iterationsCount' => $i + 1,
        'type' => 'bubbleSort'
    ];
}




