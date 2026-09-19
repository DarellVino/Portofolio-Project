<?php
if (isset($_COOKIE['username'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>LOGIN</h2>

    <form action="cek_login.php" method="post">
        Username : <input type="text" name="username"><br><br>
        Password : <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

</body>

</html>