<!-- edit_prodi.php -->

<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,

    "SELECT * FROM prodi
WHERE id_prodi='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Prodi</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php include "navigasi.php"; ?>

    <h2>EDIT PRODI</h2>

    <form method="POST"
        action="proses_edit_prodi.php">

        <input type="hidden"
            name="id_prodi"
            value="<?php echo $data['id_prodi']; ?>">

        <table>

            <tr>

                <td>Kode Prodi</td>

                <td>:</td>

                <td>

                    <input type="text"
                        name="kd_prodi"
                        value="<?php echo $data['kd_prodi']; ?>">

                </td>

            </tr>

            <tr>

                <td>Nama Prodi</td>

                <td>:</td>

                <td>

                    <input type="text"
                        name="nama_prodi"
                        value="<?php echo $data['nama_prodi']; ?>">

                </td>

            </tr>

            <tr>

                <td></td>

                <td></td>

                <td>

                    <button type="submit">
                        UPDATE
                    </button>

                </td>

            </tr>

        </table>

    </form>

</body>

</html>