<!-- hapus_prodi.php -->

<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query(
    $koneksi,

    "DELETE FROM prodi
WHERE id_prodi='$id'"
);

header("location:prodi.php");

?>