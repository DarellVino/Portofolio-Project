<?php
if (!isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>

    <h2>Selamat Datang, <?php echo $_COOKIE['username']; ?></h2>

    <a href="logout.php">Logout</a>

</body>

</html>