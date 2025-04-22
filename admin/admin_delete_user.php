<?php
session_start(); // Make sure session is started if not done in auth_check.php
//include 'auth_check.php';
include '../global/navbar.php';
include '../global/config.php';
// Check if user is admin
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    echo "<h2 style='padding: 20px;'>Access Denied 🚫</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        .container {
            padding: 20px;
        }
        h2 {
            margin-bottom: 10px;
        }
        .section {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        .section ul {
            list-style: none;
            padding-left: 0;
        }
        .section ul li {
            margin-bottom: 10px;
        }
        .section ul li a {
            text-decoration: none;
            color: #0077cc;
        }
        .section ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MANAGE USERS</h2>
        <div class="section">
            <h3></h3>
        </div>
    </div>
</body>
</html>
