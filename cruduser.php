<?php

include('koneksiakad.php');

function otentik($username, $password)
{

    $koneksi = koneksiAkademik();

    $password = md5($password);

    $sql = "SELECT * FROM user
            WHERE username='$username'
            AND password='$password'";

    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {

        return true;
    } else {

        return false;
    }
}

function cariUserDariUsername($username)
{

    $koneksi = koneksiAkademik();

    $sql = "SELECT * FROM user
            WHERE username='$username'";

    $hasil = mysqli_query($koneksi, $sql);

    return mysqli_fetch_assoc($hasil);
}
