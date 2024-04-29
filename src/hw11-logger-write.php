<?php

declare(strict_types=1);

function logWrite(string $message, string $type = 'action'): bool
{
    $types = ['action', 'error'];
    if (!in_array($type, $types)) {
        throw new InvalidArgumentException("Invalid logs type '{$type}'. Allowed types are: " . implode(', ', $types));
    }
    $logFilePath = './logs/' . date('Y-m-d') . '-test.log';
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "$type - $timestamp - $message" . PHP_EOL;
    file_put_contents($logFilePath, $logEntry, FILE_APPEND);

    return true;
}

?>
