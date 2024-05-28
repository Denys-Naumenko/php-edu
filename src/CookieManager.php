<?php

namespace App;

class CookieManager
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setCookie(string $name, string $value, int $expire = 3600, string $path = "/", string $domain = "", bool $secure = false, bool $httponly = false): void
    {
        $this->validateNameAndValue($name, $value);

        if (!headers_sent()) {
            if (!setcookie($name, $value, time() + $expire, $path, $domain, $secure, $httponly)) {
                throw new Exception('Failed to set cookie');
            }
            $_COOKIE[$name] = $value;
        } else {
            throw new Exception('Headers already sent, cannot set cookie');
        }
    }

    public function deleteCookie(string $name): void
    {
        $this->validateName($name);

        if (!$this->exists($name)) {
            throw new Exception('Cookie does not exist');
        }

        if (!headers_sent()) {
            if (!setcookie($name, '', time() - 3600, "/")) {
                throw new Exception('Failed to delete cookie');
            }
            unset($_COOKIE[$name]);
        } else {
            throw new Exception('Headers already sent, cannot delete cookie');
        }
    }

    public function getCookie(string $name): ?string
    {
        $this->validateName($name);

        return $_COOKIE[$name] ?? null;
    }

    public function exists(string $name): bool
    {
        $this->validateName($name);

        return isset($_COOKIE[$name]);
    }

    private function validateNameAndValue(string $name, string $value): void
    {
        if (empty($name) || empty($value)) {
            throw new InvalidArgumentException('Cookie name and value must be provided');
        }
    }

    private function validateName(string $name): void
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Cookie name must be provided');
        }
    }
}
