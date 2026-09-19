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

//definisikan variabel penampung error
$error_kd = "";
$error_nama = "";

//proses simpan
if(isset($_POST['simpan'])){
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $error = "";
    //cek apakah kode sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM prodi where kd_prodi='$kd_prodi'");
    if(mysqli_num_rows($cek) >0){
        $error = "Kode Prodi Sudah Digunakan!";
    }else{
        $simpan = mysqli_query($koneksi, "INSERT into prodi (kd_prodi, nama_prodi) values ('$kd_prodi','$nama_prodi')");
        if($simpan){
            $_SESSION['pesan_sukses'] = "Data Prodi baru berhasil ditambahkan!";
            header("location: prodi.php");
            exit();
        }else{
            $error = "Gagal menyimpan data!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <!-- Navigasi -->
     <?php include "navigasi.php"; ?>
     
     <div id="main">
        <div class="container">
            <h2>Tambah Data Prodi</h2>
            <hr>
            <?php if(isset($error)) { ?>
            <p style="color:red;"><?php echo $error; ?></p>
            <?php } ?>

            <form method="POST">
                <label>Kode Prodi</label><br>
                <input type="text" name="kd_prodi" required><br><br>

                <label>Nama Prodi</label><br>
                <input type="text" name="nama_prodi" required><br><br>

                <button type="submit" name="simpan" class="submit">SIMPAN</button>
                <a href="prodi.php" class="batal">BATAL</a>
            </form>
        </div>
     </div>
</body>
</html>