<?php
session_start();
require_once '../global/config.php'; // Database configuration

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Use PDO prepared statements correctly
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role_id = 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch(); // Fetch as associative array

        if ($user && password_verify($password, $user['password'])) {
            // Valid login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id']; // Updated to match DB
            header('Location: ../admin/admin_dashboard.php');
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } catch (PDOException $e) {
        $error_message = "Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the external CSS -->
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Admin Login</h2>
            <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Admin Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
