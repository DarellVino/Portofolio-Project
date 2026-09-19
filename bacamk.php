<?php

require 'crudmk.php';

$data = bacaMtKuliah("SELECT * FROM matakuliah");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Matakuliah</title>
</head>

<body>

    <h2 style="color:blue;">
        Data Matakuliah
    </h2>

    <a href="tambahmk.php">

        <button style="
        background-color:purple;
        color:white;
        border:none;
        padding:7px 12px;
        cursor:pointer;
    ">
            Tambah Matakuliah
        </button>

    </a>

    <a href="carimk.php">

        <button style="
        background-color:orange;
        color:white;
        border:none;
        padding:7px 12px;
        cursor:pointer;
    ">
            Cari Matakuliah
        </button>

    </a>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>

            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Aksi</th>

        </tr>

        <?php foreach ($data as $row) : ?>

            <tr>

                <td><?= $row["kode"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["sks"]; ?></td>

                <td>

                    <a href="ubahmk.php?kode=<?= $row['kode']; ?>">

                        <button style="
                background-color:blue;
                color:white;
                border:none;
                padding:5px 10px;
                cursor:pointer;
            ">
                            Ubah
                        </button>

                    </a>

                    <a href="hapusmk.php?kode=<?= $row['kode']; ?>">

                        <button style="
                background-color:red;
                color:white;
                border:none;
                padding:5px 10px;
                cursor:pointer;
            ">
                            Hapus
                        </button>

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>