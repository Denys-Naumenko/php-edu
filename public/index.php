<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\MathController;

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$mathController = new MathController();

if ($method === 'GET' && $uri === '/') {
    $mathController->showForm();
} elseif ($method === 'GET' && $uri === '/greet') {
    $mathController->greet();
} elseif ($method === 'POST' && $uri === '/add') {
    $mathController->addNumbers();
} else {
    header("HTTP/1.0 404 Not Found");
}
