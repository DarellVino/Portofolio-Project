<?php
include('crudMhs.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>

    <?php
    $data = bacaSemuaMhs();

    if ($data == null) {
        echo "Tidak ada data";
    } else {
    ?>

        <table border="1">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelamin</th>
                <th>Jurusan</th>
            </tr>

        <?php
        foreach ($data as $mhs) {
            echo "<tr>
    <td>" . $mhs['nim'] . "</td>
    <td>" . $mhs['nama'] . "</td>
    <td>" . $mhs['kelamin'] . "</td>
    <td>" . $mhs['jurusan'] . "</td>
    </tr>";
        }
        echo "</table>";
    }
        ?>

</body>

</html>