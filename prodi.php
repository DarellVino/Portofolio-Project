<?php
// 1. Jalankan session untuk mengecek login
session_start();

// 2. Cek apakah user sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit;
}

// 3. Panggil koneksi database
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prodi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        /* Navigasi Merah sesuai Gambar F. CRUD Prodi */
        .custom-navbar {
            background-color: #c11b1b !important;
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

        .nav-link-custom {
            color: white !important;
            margin-right: 20px;
            font-size: 16px;
            text-decoration: none;
        }

        .nav-link-custom.active {
            font-weight: bold;
        }

        .nav-right a {
            color: white !important;
            text-decoration: none;
            font-size: 16px;
        }

        /* Kotak Pembungkus Utama */
        .box-konten {
            border: 1px solid #767676;
            margin: 30px auto;
            max-width: 95%;
            background: #fff;
        }

        .box-title {
            padding: 15px;
            font-weight: bold;
            font-size: 18px;
        }

        .box-body {
            padding: 20px;
            border-top: 1px solid #767676;
        }

        /* Tombol Tambah Data Hijau Presisi */
        .btn-tambah {
            background-color: #41b353 !important;
            color: white !important;
            border: none;
            border-radius: 0;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 25px;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background-color: #369a45 !important;
            text-decoration: none;
        }

        /* Tabel Tanpa Garis Vertikal (Sesuai Gambar Modul) */
        .table-custom {
            width: 100%;
            margin-top: 10px;
            font-size: 14px;
        }

        .table-custom th {
            font-weight: bold;
            padding: 12px 8px;
            border-bottom: 1px solid #767676;
            text-align: left;
        }

        .table-custom td {
            padding: 12px 8px;
            border-bottom: 1px solid #eaeaea;
            vertical-align: middle;
        }

        .action-links a {
            color: #0000ee;
            text-decoration: underline;
        }

        .action-links a:hover {
            color: #0000aa;
        }
    </style>
</head>

<body>

    <div class="custom-navbar">
        <div class="nav-left">
            <a href="#" class="hamburger-icon">☰</a>
            <a href="home.php" class="nav-link-custom">Home</a>
            <a href="mahasiswa.php" class="nav-link-custom">Mahasiswa</a>
            <a href="prodi.php" class="nav-link-custom active">Prodi</a>
        </div>
        <div class="nav-right">
            <a href="logout.php">(<?php echo $_SESSION['user']; ?>) Logout</a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="box-konten">
            <div class="box-title">Data Prodi</div>

            <div class="box-body">
                <a href="tambah_prodi.php" class="btn-tambah">TAMBAH DATA PRODI</a>

                <table class="table-custom">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Kode Prodi</th>
                            <th style="width: 50%;">Nama Prodi</th>
                            <th style="width: 25%;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
