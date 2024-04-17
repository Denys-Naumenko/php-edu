<?php
declare(strict_types=1);

function calculateCircleArea(int|float $radius): int|float
{
    return pi() * pow($radius, 2);
}

$radius = 5.55;
$area = calculateCircleArea($radius);
echo "The area of a circle with radius $radius is $area" . PHP_EOL;


function powerNumber(int|float $num, int $powExponent): int|float
{
    return pow($num, $powExponent);
}

$num = 3;
$powExponent = 4;
$powNum = powerNumber($num, $powExponent);

echo "$num raised to the power of $powExponent is $powNum" . PHP_EOL;


function returnNewNumber(int $num, int $increment): int
{
    return $num + $increment;
}

function modifyOriginalNumber(int &$num, int $increment): int
{
    $num += $increment;
    return $num;
}

$increment = 5;

$newNum = returnNewNumber($num, $increment);
echo "Original number: $num. Increment: $increment. New number: $newNum" . PHP_EOL;

$modifiedNum = modifyOriginalNumber($num, $increment);

echo "Modified original number to: $num. Increment: $increment" . PHP_EOL;

?>

