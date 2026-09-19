<!-- tambah_prodi.php -->

<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Prodi</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php include "navigasi.php"; ?>

    <h2>TAMBAH PRODI</h2>

    <form method="POST"
        action="proses_tambah_prodi.php">

        <table>

            <tr>

                <td>Kode Prodi</td>

                <td>:</td>

                <td>

                    <input type="text"
                        name="kd_prodi">

                </td>

            </tr>

            <tr>

                <td>Nama Prodi</td>

                <td>:</td>

                <td>

                    <input type="text"
                        name="nama_prodi">

                </td>

            </tr>

            <tr>

                <td></td>

                <td></td>

                <td>

                    <button type="submit">
                        SIMPAN
                    </button>

                </td>

            </tr>

        </table>

    </form>

</body>

</html>