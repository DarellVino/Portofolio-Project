<?php
session_start();

//anti cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

//cek login
if(!isset($_SESSION['login']) || $_SESSION['login']!= true){
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}

//koneksi
include "koneksi.php";

//validasi id
if(!isset($_GET['id'])){
    header("location: mahasiswa.php");
    exit();
}

$id = $_GET['id'];

//cek apakah data ada
$cek = mysqli_query($koneksi, "SELECT * From mahasiswa Where id='$id'");
$data = mysqli_fetch_assoc($cek);

if(!$data){
    header("location: mahasiswa.php?p=Data tidak ditemukan!");
    exit();
}

//proses hapus
$hapus = mysqli_query($koneksi, "DELETE from mahasiswa Where id='$id'");
if($hapus){
    header("location: mahasiswa.php?p=Data berhasil dihapus!");
}else{
    header("location: mahasiswa.php?p=Gagal menghapus data!");
}

exit();
?>