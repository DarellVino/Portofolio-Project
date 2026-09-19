<?php

require 'crudmk.php';

$kode = $_POST["kode"];
$nama = $_POST["nama"];
$sks = $_POST["sks"];

if (ubahMtKuliah($kode, $nama, $sks)) {

    echo "
    <script>

        alert('Data berhasil diubah');

        window.location='bacamk.php';

    </script>
    ";
} else {

    echo "
    <script>

        alert('Data gagal diubah');

        window.location='bacamk.php';

    </script>
    ";
}
