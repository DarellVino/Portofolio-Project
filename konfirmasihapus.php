<!DOCTYPE html>

<?php

$nim = $_GET['nim'];

?>

<html>

<head>
    <title>Konfirmasi Hapus</title>
</head>

<body>

    <h2>Konfirmasi Hapus Data</h2>

    <form method="post"
        action="proseshapus.php">

        <input type="hidden"
            name="nim"
            value="<?php echo $nim; ?>">

        Apakah anda yakin ingin menghapus data dengan NIM

        <b><?php echo $nim; ?></b> ?

        <br><br>

        <input type="submit"
            name="btnOK"
            value="OK">

        <input type="submit"
            name="btnBatal"
            value="Batal">

    </form>

</body>

</html>