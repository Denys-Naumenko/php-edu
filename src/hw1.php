<?php

$integerOne = 1;
$integerTwo = 2;

echo "Integers: $integerOne, $integerTwo\n";

echo "Addition: " . ($integerOne + $integerTwo) . "\n";
echo "Subtraction: " . ($integerOne - $integerTwo) . "\n";
echo "Multiplication: " . ($integerOne * $integerTwo) . "\n";
echo "Division: " . ($integerOne / $integerTwo) . "\n";

$stringOne = 'Hello';
$stringTwo = 'World';

echo "Strings: $stringOne, $stringTwo\n";

echo "Concatenated strings: " . $stringOne . ' ' . $stringTwo . "\n";

$array = [1, 2, 3, 'four', 'five'];
echo "Array: ";
print_r($array);


$associativeArray = ['name' => 'John', 'age' => 25];
echo "Associative array: ";
print_r($associativeArray);

$boolTrue = true;
$boolFalse = false;

echo "Booleans: " . ($boolTrue ? 'true' : 'false') . ", " . ($boolFalse ? 'true' : 'false') . "\n";

if ($boolTrue) {
    echo "This is true.\n";
} else {
    echo "This is false.\n";
}

echo "Comparison operators: " . ($integerOne == $integerTwo ? "equal" : "not equal") . "\n";
