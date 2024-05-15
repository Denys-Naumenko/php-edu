<?php

require_once './hw13-taskTracker.php';
require_once './hw11-logger-write.php';

$taskManager = new taskTracker();


try {

    $result = $taskManager->addTask("Create Load Scenario for Application + Kafka + Nifi + Clickhouse connection", 1);
    if ($result) {
        logWrite("Task added successfully");
    }

    $result = $taskManager->addTask("Push local grafana with dashboard and K6+bash script into master", 2);
    if ($result) {
        logWrite("Task added successfully");
    }

    $result = $taskManager->completeTask(2);
    if ($result) {
        logWrite("Task completed successfully");
    }

} catch (Exception $e) {
    logWrite($e->getMessage(), "error");
    echo "Error: " . $e->getMessage() . PHP_EOL;
}


try {

    $result = $taskManager->completeTask(2);
    if ($result) {
        logWrite("Task completed successfully");
    }

} catch (Exception $e) {
    logWrite($e->getMessage(), "error");
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

try {

    $result = $taskManager->deleteTask(10);
    if ($result) {
        logWrite("Task deleted successfully");
    }
} catch (Exception $e) {
    logWrite($e->getMessage(), "error");
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

print_r($taskManager->getTasks());
