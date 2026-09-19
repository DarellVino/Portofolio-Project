<?php

include('crudmhs.php');

$nim = $_GET['nim'];

$data = cariMhs($nim);

?>

<html>

<head>
    <title>Konfirmasi Ubah</title>
</head>

<body>

    <h2>Form Ubah Mahasiswa</h2>

    <form action="prosesubah.php" method="post">

        NIM :
        <input type="text"
            name="nim"
            value="<?php echo $data['nim']; ?>"
            readonly>

        <br><br>

        Nama :
        <input type="text"
            name="nama"
            value="<?php echo $data['nama']; ?>">

        <br><br>

        Kelamin :
        <input type="text"
            name="kelamin"
            value="<?php echo $data['kelamin']; ?>">

        <br><br>

        Jurusan :
        <input type="text"
            name="jurusan"
            value="<?php echo $data['jurusan']; ?>">

        <br><br>

        <input type="submit" value="Ubah">

    </form>

</body>

</html>