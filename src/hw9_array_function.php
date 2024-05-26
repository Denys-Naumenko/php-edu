<?php

function generateArray(int $length = 5, int $min = 1, int $max = 10): array
{
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

$myArray = generateArray();

print_r($myArray);
sort($myArray);
print_r($myArray);
$maxElementArray = max($myArray);
echo "Max Element in Array:" . $maxElementArray . PHP_EOL;
$minElementArray = min($myArray);
echo "Min Element in Array:" . $minElementArray . PHP_EOL;
