<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function prettyPrint(array $inputData, $functionName) {
    echo nl2br("Start.....\n");
    echo ("<hr>");
    foreach ($inputData as $name => $data) {
        $result = $functionName($data);
        echo nl2br("Type of algoritm is {$result['type']}\n");
        echo nl2br("Name of input array is {$name}\n");
        echo nl2br("Data count is {$result['dataCount']}\n");;
        echo nl2br("Iterations count is {$result['iterationsCount']}\n");
        echo ("<hr>");
    }
    echo nl2br("end\n");
    echo "<br>";
    return;
}


