<?php

function generateArray(int $length = 5, int $min = 1, int $max = 10): Generator
{
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

$myArray = generateArray();
$sum = 0;
$product = 1;
$countOfFives = 0;
foreach ($myArray as $value) {
    echo $value . PHP_EOL;
}

foreach ($myArray as $value) {
    $sum += $value;
    $product *= $value;

    if ($value == 5) {
        $countOfFives++;
    }
}

echo "An array value that is divisible by 3:" . PHP_EOL;
foreach ($myArray as $value) {
    if ($value % 3 == 0) {
        echo $value . PHP_EOL;
    }
}


echo "The sum of array elements: $sum" . PHP_EOL;
echo "The product of array elements: $product" . PHP_EOL;
echo "The number of fives in the array: $countOfFives" . PHP_EOL;


?>