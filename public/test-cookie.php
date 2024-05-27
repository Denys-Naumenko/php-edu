<?php

require __DIR__ . '/../vendor/autoload.php';

use App\CookieManager;

session_start();

$_SESSION['messages'] = [];

$cookieManager = new CookieManager();

if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;

    try {
        $cookieManager->setCookie('test_cookie', 'test_value');
        $_SESSION['messages'][] = 'Cookie set successfully';
    } catch (Exception $e) {
        $_SESSION['messages'][] = 'Error setting cookie: ' . $e->getMessage();
    }

    try {
        if ($cookieManager->exists('test_cookie')) {
            $_SESSION['messages'][] = 'Cookie exists';
        } else {
            throw new Exception('Cookie does not exist after setting it');
        }
    } catch (Exception $e) {
        $_SESSION['messages'][] = 'Error: ' . $e->getMessage();
    }

    try {
        $value = $cookieManager->getCookie('test_cookie');
        if ($value !== null) {
            $_SESSION['messages'][] = 'Cookie value: ' . $value;
        } else {
            throw new Exception('Failed to get cookie or cookie does not exist after setting it');
        }
    } catch (Exception $e) {
        $_SESSION['messages'][] = 'Error: ' . $e->getMessage();
    }

    try {
        $cookieManager->deleteCookie('test_cookie');
        $_SESSION['messages'][] = 'Cookie deleted successfully';
    } catch (Exception $e) {
        $_SESSION['messages'][] = 'Error deleting cookie: ' . $e->getMessage();
    }

    try {
        if (!$cookieManager->exists('test_cookie')) {
            $_SESSION['messages'][] = 'Cookie does not exist';
        } else {
            throw new Exception('Cookie still exists after deletion');
        }
    } catch (Exception $e) {
        $_SESSION['messages'][] = 'Error: ' . $e->getMessage();
    }
}

if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
        echo $message . '<br>';
    }
    unset($_SESSION['messages']);
    unset($_SESSION['initialized']);
}
