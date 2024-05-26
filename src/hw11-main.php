<?php

declare(strict_types=1);

require_once 'hw11-logger-write.php';
require_once 'hw11-logger-read.php';

function getUserName(): string
{
    echo "Please enter your name: ";
    $userName = trim(fgets(STDIN));
    return $userName;
}

$userName = getUserName();

try {
    logWrite($userName, 'info');
    echo "Last log entry: " . logRead() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
