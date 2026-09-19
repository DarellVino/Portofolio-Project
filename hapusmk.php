<?php

$kode = $_GET["kode"];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hapus Matakuliah</title>
</head>

<body>

<h2>Konfirmasi Hapus</h2>

<p>Yakin ingin menghapus data?</p>

<a href="proseshapusmk.php?kode=<?= $kode; ?>">

    Ya

</a>

<br><br>

<a href="bacamk.php">

    Tidak

</a>

</body>
</html>