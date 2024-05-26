<?php

require_once __DIR__ . '/EmailValidator.php';

class Employee
{
    use EmailValidator;

    private string $email;

    public function __construct(string $email)
    {
        if (!$this->isValidEmail($email)) {
            throw new InvalidArgumentException("Invalid email address.");
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
