<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function prettyPrint(array $inputData, $functionName , $left = false, $right = false) {
    echo nl2br("Start.....\n");
    echo ("<hr>");
    foreach ($inputData as $name => $data) {
        $_SESSION['iterationCounter'] = 0;
        $result = $functionName($data, 0,count($data)-1 , true);

        echo nl2br("Type of algoritm is : {$result['type']};\n");
        echo nl2br("Name of input array is : {$name};\n");
//        echo print_r($result['data'], true);
        echo nl2br("Array size  is : {$result['dataCount']} elements;\n");;
        echo nl2br("Iterations count is : {$result['iterationsCount']} steps.\n");
        echo ("<hr>");
    }
    echo nl2br("end\n");
    echo "<br>";
}


