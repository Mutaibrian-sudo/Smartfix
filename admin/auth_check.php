<?php
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_id']) || (int)$_SESSION['role_id'] !== 1) {
    header('Location: admin_login.php');
    exit();
}
?>
