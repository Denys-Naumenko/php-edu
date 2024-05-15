<?php

declare(strict_types=1);

require_once __DIR__ . '/Rectangle.php';
require_once __DIR__ . '/Circle.php';
require_once __DIR__ . '/hw11-logger-write.php';

try {
    $rectangle = new Rectangle(2, 10);
    echo "Rectangle:" . PHP_EOL;
    echo "Length=" . $rectangle->getLength() . PHP_EOL;
    echo "Width=" . $rectangle->getWidth() . PHP_EOL;
    echo "Area=" . $rectangle->getArea() . PHP_EOL;
    echo "Perimeter=" . $rectangle->getPerimeter() . PHP_EOL;
} catch (Exception $e) {
    logWrite($e->getMessage(), "error");
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

try {
    $circle = new Circle(3);
    echo "Circle:" . PHP_EOL;
    echo "Radius=" . $circle->getRadius() . PHP_EOL;
    echo "Area=" . $circle->getArea() . PHP_EOL;
    echo "Perimeter=" . $circle->getPerimeter() . PHP_EOL;
} catch (Exception $e) {
    logWrite($e->getMessage(), "error");
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

?>