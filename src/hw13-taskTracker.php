<?php

declare(strict_types=1);

require_once __DIR__ . '/hw13-taskStatus.php';

class taskTracker
{
    private array $tasks;
    private string $tasksFile;

    public function __construct(string $filename = "tasks.json")
    {
        $this->tasksFile = $filename;
        $this->loadTasks();
    }

    private function loadTasks(): void
    {
        if (file_exists($this->tasksFile)) {
            $this->tasks = json_decode(file_get_contents($this->tasksFile), true) ?? [];
        } else {
            $this->tasks = [];
        }
    }

    private function saveTasks(): void
    {
        if (file_put_contents($this->tasksFile, json_encode($this->tasks)) === false) {
            throw new RuntimeException("Failed to save tasks");
        }
    }

    public function addTask(string $taskName, int $priority): bool
    {
        $this->tasks[] = [
            'id' => count($this->tasks) + 1,
            'name' => $taskName,
            'priority' => $priority,
            'status' => TaskStatus::NOT_COMPLETED->value
        ];
        $this->saveTasks();
        return true;
    }

    public function deleteTask(int $taskId): bool
    {
        $taskIndex = null;
        foreach ($this->tasks as $index => $task) {
            if ($task['id'] === $taskId) {
                $taskIndex = $index;
                break;
            }
        }
        if ($taskIndex === null) {
            throw new RuntimeException("Task not found");
        }
        array_splice($this->tasks, $taskIndex, 1);
        $this->saveTasks();
        return true;
    }

    public function getTasks(): array
    {
        if (empty($this->tasks)) {
            return [];
        }
        usort($this->tasks, function ($a, $b) {
            return $b['priority'] - $a['priority'];
        });

        return $this->tasks;
    }

    public function completeTask(int $taskId): bool
    {
        $taskIndex = null;
        foreach ($this->tasks as $index => $task) {
            if ($task['id'] === $taskId) {
                $taskIndex = $index;
                break;
            }
        }

        if ($taskIndex === null) {
            throw new RuntimeException("Task not found");
        }

        if ($this->tasks[$taskIndex]['status'] === TaskStatus::COMPLETED->value) {
            throw new RuntimeException("Task already completed");
        }

        $this->tasks[$taskIndex]['status'] = TaskStatus::COMPLETED->value;
        $this->saveTasks();
        return true;
    }

}
