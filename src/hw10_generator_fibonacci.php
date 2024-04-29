<?php
function generateFibonacci(int $limit): Generator
{
    $current = 0;
    $next = 1;

    while ($current < $limit) {
        yield $current;
        $next = $current + $next;
        $current = $next - $current;
    }
}

$fibonacciSequence = generateFibonacci(9);

foreach ($fibonacciSequence as $value) {
    echo $value . PHP_EOL;
}

?>