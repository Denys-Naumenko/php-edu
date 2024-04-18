<?php
$value_1 = 2;
$value_2 = "2";
$value_3 = 3;

switch ($value_1) {
    case 1:
        $caseColor = 'green';
        break;
    case 2:
        $caseColor = 'red';
        break;
    case 3:
        $caseColor = 'blue';
        break;
    case 4:
        $caseColor = 'brown';
        break;
    case 5:
        $caseColor = 'violet';
        break;
    case 6:
        $caseColor = 'black';
        break;
    default:
        $caseColor = 'white';
}

echo $caseColor . PHP_EOL; // 'red';

$matchColor = match ($value_2) {
    1 => 'green',
    2 => 'red',
    3 => 'blue',
    4 => 'brown',
    5 => 'violet',
    6 => 'black',
    default => 'white'
};

echo $matchColor . PHP_EOL; // 'white';

if ($value_3 === 1) {
    echo "green";
} elseif ($value_3 === 2) {
    echo "red";
} elseif ($value_3 === 3) {
    echo "blue";
} elseif ($value_3 === 4) {
    echo "brown";
} elseif ($value_3 === 5) {
    echo "violet";
} elseif ($value_3 === 6) {
    echo "black";
} else {
    echo "white";
}

?>


