<?php
$host = 'db';
$db = 'mydatabase';
$user = 'myuser';
$pass = 'mypassword';

$dsn = "pgsql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

echo "Executing SELECT query:\n";
$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch()) {
    echo $row['id'] . ": " . $row['username'] . " - " . $row['email'] . "\n";
}

echo "Executing INSERT query:\n";
$sql = "INSERT INTO users (username, email) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['new_user', 'new_user@example.com']);
echo "New user inserted!\n";

echo "Executing UPDATE query:\n";
$sql = "UPDATE users SET email = ? WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['updated_email@example.com', 'new_user']);
echo "User updated!\n";

echo "Executing DELETE query:\n";
$sql = "DELETE FROM users WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['new_user']);
echo "User deleted!\n";
