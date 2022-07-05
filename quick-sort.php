<?php
ini_set("memory_limit","4096M");
require_once 'data_source.php';
require_once 'helper.php';

function partition(&$array, $left, $right) {
//    $pivotIndex = floor($left + ($right - $left) / 2);
    $pivotIndex = array_rand($array, 1);

    $pivotValue = $array[$pivotIndex];

    $i=$left;
    $j=$right;
    while ($i <= $j) {
        while (($array[$i] < $pivotValue) ) {
            $i++;
        }
        while (($array[$j] > $pivotValue)) {
            $j--;
        }
        if ($i <= $j ) {
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
            $i++;
            $j--;
        }
    }
    return $i;
}

function quicksort(&$array, $left, $right) {
    if($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        quicksort($array,$left,$pivotIndex - 1 );
        quicksort($array,$pivotIndex, $right);
    }
}

 quicksort($inputData, 0, count($inputData) -1);

dd($inputData);