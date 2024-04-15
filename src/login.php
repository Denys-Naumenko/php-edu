<?php
$pdo = new PDO('pgsql:host=postgres_container;dbname=mydatabase', 'myuser', 'mypassword');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: quiz.html');
    } else {
        echo "Invalid username or password";
    }
}
?>
