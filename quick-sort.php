<?php
require_once 'data_source.php';
require_once 'helper.php';

function partition(&$array, $left, $right) {
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
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
            $i++;
            $j--;
        }
    }
    return $i;
}

function quickSort(&$array, $left, $right) {
    if($left < $right) {
        $_SESSION['iterationCounter']++;
        $pivotIndex = partition($array, $left, $right);
        quicksort($array,$left,$pivotIndex - 1);
        quicksort($array,$pivotIndex, $right);
    }
    $result = [
        'data' => $array,
        'dataCount' => count($array),
        'iterationsCount' => $_SESSION['iterationCounter'],
        'type' => 'quickSort'

    ];
    return $result;
}
