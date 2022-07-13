<?php
// ini_set("memory_limit","");
ini_set("xdebug.max_nesting_level","-1");
require_once 'helper.php';
require_once 'data_source.php';
require_once 'bubble-sort.php';
require_once 'quick-sort.php';

prettyPrint($inputData, 'quickSort', 0, count($inputData) -1);
prettyPrint($inputData, 'bubbleSort');
