<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_prodi   = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $keterangan = $_POST['keterangan'];

    // Query untuk memperbarui data prodi berdasarkan kode prodi
    $query = mysqli_query($koneksi, "UPDATE prodi SET nama_prodi='$nama_prodi', keterangan='$keterangan' WHERE kd_prodi='$kd_prodi'");

    if ($query) {
        header("location: prodi.php?pesan=Data berhasil diupdate");
    } else {
        header("location: prodi.php?pesan=Gagal mengupdate data");
    }
}
