<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

function allowRoles($roles) {
    if (!in_array($_SESSION['role'], $roles)) {
        echo "Access denied.";
        exit();
    }
}
?>