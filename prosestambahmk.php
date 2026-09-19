<?php

require 'crudmk.php';

$kode = $_POST["kode"];
$nama = $_POST["nama"];
$sks = $_POST["sks"];

if (tambahMtKuliah($kode, $nama, $sks)) {

    echo "
    <script>
        alert('Data berhasil ditambah');
        window.location='bacamk.php';
    </script>
    ";
} else {

    echo "
    <script>
        alert('Data gagal ditambah');
        window.location='tambahmk.php';
    </script>
    ";
}
