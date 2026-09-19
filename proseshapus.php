<?php

include('crudmhs.php');

if (isset($_POST['btnOK'])) {

    $nim = $_POST['nim'];

    $hasil = hapusMhs($nim);

    if ($hasil > 0) {

        header("Location: bacamhs2.php");
    } else {

        echo "Gagal menghapus data";
    }
} else {

    header("Location: hapusmhs.php");
}
