<?php

require 'crudmk.php';

$data = null;

if (isset($_POST["cari"])) {

    $kode = $_POST["kode"];

    $data = cariMtKuliah($kode);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cari Matakuliah</title>
</head>

<body>

    <h2 style="color:red;">
        Cari Matakuliah
    </h2>

    <form method="POST">

        Kode :
        <input type="text" name="kode">

        <button type="submit" name="cari">
            Cari
        </button>

    </form>

    <br>

    <?php if ($data) : ?>

        <h3 style="color:red;">
            Data Matakuliah
        </h3>

        Kode : <?= $data["kode"]; ?>
        <br><br>

        Nama : <?= $data["nama"]; ?>
        <br><br>

        SKS : <?= $data["sks"]; ?>

    <?php elseif (isset($_POST["cari"])) : ?>

        <h3 style="color:red;">
            Data tidak ditemukan
        </h3>

    <?php endif; ?>

</body>

</html>