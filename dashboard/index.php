<?php
include "../includes/auth.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Alim Ops</title>
</head>
<body>

<h1>Welcome to Alim Royal Hotel Operations System</h1>

<p>Hello, <?php echo $_SESSION['name']; ?></p>
<p>Your role: <?php echo $_SESSION['role']; ?></p>

<a href="../auth/logout.php">Logout</a>

</body>
</html>