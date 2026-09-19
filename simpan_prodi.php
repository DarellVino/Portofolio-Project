<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_prodi   = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $keterangan = $_POST['keterangan'];

    // Query untuk memasukkan data ke tabel prodi
    $query = mysqli_query($koneksi, "INSERT INTO prodi (kd_prodi, nama_prodi, keterangan) VALUES ('$kd_prodi', '$nama_prodi', '$keterangan')");

    if ($query) {
        header("location: prodi.php?pesan=Data berhasil disimpan");
    } else {
        header("location: prodi.php?pesan=Gagal menyimpan data");
    }
}
