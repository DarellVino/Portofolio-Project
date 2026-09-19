<?php
session_start();

//panggil koneksi
include "koneksi.php";

//ambil data dari form
$username = $_POST['user'];
$password = $_POST['pass'];

//enkripsi password dengan md5 (sesuai database)
$password_md5 = md5($password);

//query cek login
$query = mysqli_query($koneksi, "SELECT * from pengguna where username='$username' and password='$password_md5'");

//hitung jumlah data
$cek = mysqli_num_rows($query);
if($cek >0){
    //jika login berhasil
    $_SESSION['login'] = true;
    $_SESSION['user'] = $username;
    header("location: home.php"); // arahakan ke halaman home
}else{
    //jika gagal
    header("location: index.php?p=Username atau Password salah");
}
?>
