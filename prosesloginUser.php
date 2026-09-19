<?php

session_start();

include('cruduser.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (otentik($username, $password)) {

    $_SESSION['username'] = $username;

    $dataUser = cariUserDariUsername($username);

    $_SESSION['namauser'] = $dataUser['nama'];

    header("Location: hapusmhs.php");
} else {

    header("Location: login.php?error=1");
}
