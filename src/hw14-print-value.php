<?php

require_once __DIR__ . '/hw14-Printer.php';
require_once __DIR__ . '/hw14-UpperCasePrinter.php';

$printer = new Printer();
$printer->print();

$upperCasePrinter = new UpperCasePrinter();
$upperCasePrinter->print();

?>