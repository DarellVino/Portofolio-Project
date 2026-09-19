<?php
session_start();
//matikan cache browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//cek apakah sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <!-- Navigasi -->
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            

            <h2>APLIKASI</h2>
            <hr>
            <p>Selamat Datang Di Aplikasi</p>
            <?php
            // Mengatur zona waktu (misal: Jakarta)
            date_default_timezone_set('Asia/Jakarta'); 

            // Menampilkan tanggal dengan format: Hari, Tanggal Bulan Tahun (contoh: 02 June 2026)
            echo date('d F Y') . "<br>";

            // Mengambil jam saat ini dalam format 24 jam (00 sampai 23)
            $jam = date('H');

            // Logika penentuan ucapan
            if ($jam >= 5 && $jam < 11) {
                $ucapan = "Selamat Pagi";
            } elseif ($jam >= 11 && $jam < 15) {
                $ucapan = "Selamat Siang";
            } elseif ($jam >= 15 && $jam < 18) {
                $ucapan = "Selamat Sore";
            } else {
                $ucapan = "Selamat Malam";
            }

            // Menampilkan ucapan beserta nama user dari session (sesuai poin 5 di gambar)
            echo $ucapan . ", " . $_SESSION['user'] . "!";
            ?>
        </div>
    </div>
</body>

</html>