<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "12345") {

    setcookie("username", $username, time() + 3600);

    header("Location: home.php");
} else {
    echo "Login gagal!";
}
