<?php
session_start();
require 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = strtolower(trim($_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check for duplicate email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "<p style='color:red;'>Email already in use!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $password])) {
            $_SESSION['user'] = $conn->lastInsertId();
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "<p style='color:red;'>Error creating account.</p>";
        }
    }
}
?>

<!-- Include the stylesheet -->
<link rel="stylesheet" href="styles.css">

<form method="POST">
    <h2>Register to SmartFix</h2>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Create Password" required>
    <button type="submit">Register</button>
</form>
