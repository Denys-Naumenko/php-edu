<?php
$pdo = new PDO('pgsql:host=postgres_container;dbname=mydatabase', 'myuser', 'mypassword');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkUser = "SELECT * FROM users WHERE username = ?";
    $stmtCheck = $pdo->prepare($checkUser);
    $stmtCheck->execute([$username]);
    $userExists = $stmtCheck->fetch();

    if ($userExists) {
        echo "<script>alert('User already exists. Please login.'); window.location='login.html';</script>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword]);

        $_SESSION['username'] = $username;
        header('Location: quiz.html');
        exit();
    }
}
?>
