<?php

declare(strict_types=1);
function multiplyAndOptionallyDisplay(int|float $num1, int|float $num2, ?closure $callback = null): int|string
{
    $result = $num1 * $num2;

    if ($callback) {
        $callback($result);
    }

    return $result;
}

$printResult = function (int|float $result): void {
    echo "Result: $result\n";
};

$result = multiplyAndOptionallyDisplay(4, 5);
echo "Result without callback: $result\n";

multiplyAndOptionallyDisplay(4, 5, $printResult);
