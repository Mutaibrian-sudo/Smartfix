<?php
require 'dbconn.php';
require 'global/navbar.php';
require 'global/auth_check.php';

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Get user info
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartFix Dashboard</title>
    <link rel="stylesheet" href="global/styles.css">
    <style>
        .dashboard {
            text-align: center;
        }

        .dashboard h2 {
            color: #333;
        }

        .dashboard a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
        }

        .dashboard a:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <php 
    include 'global/navbar.php';
    ?>

<div class="dashboard">
    <h2>Welcome back, <?php echo htmlspecialchars($user['name']); ?> 🎉</h2>
    <p>Your email: <?php echo htmlspecialchars($user['email']); ?></p>

    <!-- Optional future feature buttons -->
    <p><a href="#">Request a Service (Coming Soon)</a></p>
    <p><a href="#">My Orders (Coming Soon)</a></p>

    <a href="/authentication/logout.php">Logout</a>
</div>

</body>
</html>
