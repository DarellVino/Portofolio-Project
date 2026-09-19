<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "vino_penilaian"
);

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}

?>