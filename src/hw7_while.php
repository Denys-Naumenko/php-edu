<?php
$num = 0;

while ($num < 10) {
    $num++;
    echo $num . PHP_EOL;
}

$num2 = 5;
$factorial = 1;

while ($num2 > 0) {
    $factorial *= $num2;
    $num2--;
}

echo "The factorial of 5 is: " . $factorial . PHP_EOL;

$num3 = 1;

while ($num3 <= 20) {

    if ($num3 % 2 == 0) {
        echo $num3 . " ";
    }
    $num3++;
}


?>