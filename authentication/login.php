<?php
session_start();
require 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['id'];
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "<p style='color:red;'>Invalid login details.</p>";
    }
}
?>

<link rel="stylesheet" href="styles.css">

<form method="POST">
    <h2>Login to SmartFix</h2>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
