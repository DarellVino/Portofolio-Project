<?php

session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Berhasil</title>
</head>

<body>

    <h2>LOGIN BERHASIL</h2>

    <?php

    echo "User : " . $_SESSION['namauser'];

    ?>

    <br><br>

    <a href="logout.php">Logout</a>

</body>

</html>