<?php
// Pastikan session sudah berjalan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengunci Bootstrap agar tidak merusak tampilan tabel bawah, tapi menimpa navbar menjadi merah -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        /* Paksa warna navbar menjadi merah marun sesuai gambar tugas */
        .bg-merah-tugas {
            background-color: #c11b1b !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 16px;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        .navbar-brand-custom {
            color: white !important;
            font-size: 24px;
            margin-right: 20px;
            text-decoration: none;
        }

        .text-logout {
            color: white !important;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-merah-tugas style-navbar py-2 px-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <!-- Tombol Hamburger -->
            <a class="navbar-brand-custom mr-4" href="#">☰</a>

            <!-- Menu Navigasi Kiri -->
            <div class="navbar-nav d-flex flex-row" style="gap: 20px;">
                <a class="nav-item nav-link font-weight-bold" href="home.php">Home</a>
                <a class="nav-item nav-link" href="mahasiswa.php">Mahasiswa</a>
                <a class="nav-item nav-link" href="prodi.php">Prodi</a>
            </div>
        </div>

        <!-- Menu Logout Kanan -->
        <div class="nav-right">
            <a href="logout.php" class="text-logout">
                (<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'admin'; ?>) Logout
            </a>
        </div>
    </nav>