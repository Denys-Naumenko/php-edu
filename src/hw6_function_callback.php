<?php

function multiplyAndOptionallyDisplay($num1, $num2, $callback = null)
{
    $result = $num1 * $num2;

    if ($callback) {
        $callback($result);
    }

    return $result;
}

$printResult = function ($result) {
    echo "Result: $result\n";
};

$result = multiplyAndOptionallyDisplay(4, 5);
echo "Result without callback: $result\n";

multiplyAndOptionallyDisplay(4, 5, $printResult);

?>
