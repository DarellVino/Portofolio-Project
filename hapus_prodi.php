<?php
session_start();

//anti cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

//cek login
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location: index.php?p=Silahkan login terlebih dahulu");
    exit();
}
//koneksi
include "koneksi.php";

//validasi parameter
if(!isset($_GET['id_prodi'])){
    header("location: prodi.php");
    exit();
}

$id_prodi = $_GET['id_prodi'];

//ambil data prodi(untuk ambil kd_prodi)
$q_prodi = mysqli_query($koneksi, "SELECT * from prodi where kd_prodi='$id_prodi'");
$data_prodi = mysqli_fetch_assoc($q_prodi);

if(!$data_prodi) {
    header("location: prodi.php");
    exit();
}



//cek apakah dipakai ditabel mahasiswa
$cek_mahasiswa = mysqli_query($koneksi, "SELECT * From mahasiswa where kd_prodi='$id_prodi'");

if(mysqli_num_rows($cek_mahasiswa) > 0){
    //jika masih dipakai
    header("location: prodi.php?p=Data tidak bisa dihapus karena masih digunakan!");
    exit();
}else{
    //hapus data
    $hapus = mysqli_query($koneksi, "DELETE from prodi Where kd_prodi='$id_prodi'");
    if($hapus){
        header("location: prodi.php");
        exit();
    }else{
        header("location: prodi.php?p=Gagal menambahkan data!");
        exit();
    }
}
?>