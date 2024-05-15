<?php

declare(strict_types=1);

function logRead(): string
{
    $logFilePath = './logs/' . date('Y-m-d') . '-test.log';
    $logEntry = file_get_contents($logFilePath);
    $lines = explode(PHP_EOL, $logEntry);
    $lines = array_filter($lines, function ($line) {
        return !empty($line);
    });
    return empty($lines) ? '' : end($lines);
}
