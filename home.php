<?php
// 1. Jalankan session untuk mengambil data login
session_start();

// 2. Cek apakah user sudah login atau belum. Jika belum, lempar kembali ke index.php
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        /* Navigasi Custom Merah Marun sesuai Gambar Modul E */
        .custom-navbar {
            background-color: #c11b1b !important;
            /* Warna merah marun */
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        .hamburger-icon {
            color: white !important;
            font-size: 24px;
            margin-right: 20px;
            text-decoration: none;
            cursor: pointer;
        }

        .hamburger-icon:hover {
            color: #ddd;
            text-decoration: none;
        }

        .nav-link-custom {
            color: white !important;
            margin-right: 20px;
            font-size: 16px;
            text-decoration: none;
        }

        .nav-link-custom:hover {
            text-decoration: underline;
        }

        .nav-link-custom.active {
            font-weight: bold;
        }

        .nav-right a {
            color: white !important;
            text-decoration: none;
            font-size: 16px;
        }

        /* Box Aplikasi Sesuai Gambar Modul */
        .box-aplikasi {
            border: 1px solid #ababab;
            margin: 30px auto;
            max-width: 95%;
            background: #fff;
        }

        .box-header {
            padding: 12px 15px;
            font-weight: bold;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        .box-body {
            padding: 15px;
            border-top: 1px solid #ababab;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="custom-navbar">
        <div class="nav-left">
            <a href="#" class="hamburger-icon">☰</a>
            <a href="home.php" class="nav-link-custom active">Home</a>
            <a href="mahasiswa.php" class="nav-link-custom">Mahasiswa</a>
            <a href="prodi.php" class="nav-link-custom">Prodi</a>
        </div>
        <div class="nav-right">
            <a href="logout.php">(<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'admin'; ?>) Logout</a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="box-aplikasi">
            <div class="box-header">
                APLIKASI
            </div>
            <div class="box-body">
                Selamat datang di aplikasi
            </div>
        </div>
    </div>

</body>

</html>