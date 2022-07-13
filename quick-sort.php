<?php
require_once 'data_source.php';
require_once 'helper.php';

function partition(&$array, $left, $right, &$iterations) {
    $pivotIndex = floor($left + ($right - $left) / 2);
    $pivotValue = $array[$pivotIndex];

    $i = $left;
    $j = $right;
    while ($i <= $j) {
        while (($array[$i] < $pivotValue) ) {
            $i++;
        }
        while (($array[$j] > $pivotValue)) {
            $j--;
        }
        if ($i <= $j ) {
            $iterations++;
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
            $i++;
            $j--;
        }
    }
    return $i;
}

function quickSort(&$array, $left, $right, $reset = false) {
   static $iterations = 0;
   if($reset) {
       $iterations = 0;
   }
    if($left < $right) {
        $pivotIndex = partition($array, $left, $right, $iterations);
        quicksort($array,$left,$pivotIndex - 1);
        quicksort($array,$pivotIndex, $right);
    }
    $result = [
        'data' => $array,
        'dataCount' => count($array),
        'iterationsCount' => $iterations,
        'type' => 'quickSort'

    ];
    return $result;
}
