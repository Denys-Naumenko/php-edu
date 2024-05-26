<?php

require_once __DIR__ . '/hw12_oop.php';
require_once __DIR__ . '/hw12.php';

try {
    $user = new User("Den212312", "23", 24);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {

}
