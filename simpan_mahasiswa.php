<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm           = $_POST['npm'];
    $nama          = $_POST['nama'];
    $kelas         = $_POST['kelas'];
    $semester      = $_POST['semester'];
    $kd_prodi      = $_POST['kd_prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Query simpan data ke tabel mahasiswa
    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (npm, nama, kelas, semester, kd_prodi, jenis_kelamin) VALUES ('$npm', '$nama', '$kelas', '$semester', '$kd_prodi', '$jenis_kelamin')");

    if ($query) {
        header("location: mahasiswa.php?pesan=Data mahasiswa berhasil disimpan!");
    } else {
        header("location: mahasiswa.php?pesan=Gagal menyimpan data!");
    }
}
