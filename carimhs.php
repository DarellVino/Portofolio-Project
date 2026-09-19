<?php
include('crudmhs.php');
?>

<html>

<head>
    <title>Cari Mahasiswa</title>
</head>

<body>

    <h2>Cari Data Mahasiswa</h2>

    <form method="post">

        Masukkan NIM :
        <input type="text" name="nim">

        <input type="submit" name="cari" value="Cari">

    </form>

    <?php

    if (isset($_POST['cari'])) {

        $nim = $_POST['nim'];

        $hasil = carimhs($nim);

        if ($hasil != null) {

            echo "<hr>";

            echo "NIM : " . $hasil['nim'] . "<br>";
            echo "Nama : " . $hasil['nama'] . "<br>";
            echo "Kelamin : " . $hasil['kelamin'] . "<br>";
            echo "Jurusan : " . $hasil['jurusan'] . "<br>";
        } else {

            echo "Data tidak ditemukan";
        }
    }

    ?>

</body>

</html>