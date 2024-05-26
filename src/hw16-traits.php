<?php

require_once __DIR__ . '/Customer.php';
require_once __DIR__ . '/Employee.php';

try {
    $customer = new Customer('customer@example.com');
    echo "Customer Email: " . $customer->getEmail() . PHP_EOL;

    $employee = new Employee('employee@example.com');
    echo "Employee Email: " . $employee->getEmail() . PHP_EOL;

    $invalidCustomer = new Customer('invalid-email');
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
