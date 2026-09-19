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

//ambil data berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM prodi where kd_prodi='$id_prodi'");
$data = mysqli_fetch_assoc($query);

//jika data tidak ditemukan
if(!$data){
    header("location: prodi.php");
    exit();
}

//inisialisasi error
$error = "";

//proses update
if(isset($_POST['update'])){
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];

    // Sesuai Instruksi Lembar Tugas: Validasi jika ada field yang kosong saat diupdate
    if(empty($kd_prodi) || empty($nama_prodi)){
        // Menggunakan javascript alert jika data ada yang kosong saat disubmit
        echo "<script>alert('Data Tidak Boleh Kosong'); window.history.back();</script>";
        exit();
    }else{
        $update = mysqli_query($koneksi,"UPDATE prodi SET kd_prodi='$kd_prodi', nama_prodi='$nama_prodi' Where kd_prodi='$id_prodi'");

        if($update){
            $_SESSION['pesan_sukses'] = "Data Prodi berhasil diperbarui!";
            // Menggunakan javascript alert sukses sesuai contoh di gambar tugas
            echo "<script>alert('Data Berhasil Disimpan'); window.location.href='prodi.php';</script>";
            exit();
        }else{
            echo "<script>alert('Gagal mengupdate data!'); window.history.back();</script>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Edit Data Prodi</h2>
            <hr>

            <form method="POST">
                <label>Kode Prodi</label><br>
                <input type="text" name="kd_prodi" value="<?php echo $data['kd_prodi']; ?>"><br><br>

                <label>Nama Prodi</label><br>
                <input type="text" name="nama_prodi" value="<?php echo $data['nama_prodi']; ?>"><br><br>

                <button type="submit" name="update" class="submit">UPDATE</button>
                <a href="prodi.php" class="batal">BATAL</a>
            </form>
        </div>
    </div>
</body>
</html>