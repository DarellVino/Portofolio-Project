<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

if(!isset($_SESSION['login']) || $_SESSION['login']!= true){
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}

// Proses ketika tombol simpan diklik
if(isset($_POST['simpan_foto'])){
    $nama_file = $_FILES['foto_baru']['name'];
    $tmp_file  = $_FILES['foto_baru']['tmp_name'];
    
    if(empty($nama_file)){
        echo "<script>alert('Silahkan pilih file foto terlebih dahulu!'); window.history.back();</script>";
        exit();
    } else {
        // Nama dikunci jadi meliana.jpg agar otomatis mengganti foto lama
        $tujuan = "meliana.jpg";
        
        if(move_uploaded_file($tmp_file, $tujuan)){
            echo "<script>alert('Data Berhasil Disimpan'); window.location.href='home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Gagal mengubah foto profil!'); window.history.back();</script>";
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
    <title>Edit Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container" style="max-width: 450px; margin: 40px auto; padding: 25px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; font-family: Arial, sans-serif;">
            <h2>Edit Foto Profil</h2>
            <hr><br>
            
            <form method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 10px;">Pilih Foto Profil (Choose File):</label>
                    <input type="file" name="foto_baru" accept="image/*">
                </div>
                
                <div style="margin-top: 30px;">
                    <button type="submit" name="simpan_foto" class="submit" style="background-color: #2ecc71; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Simpan Perubahan</button>
                    
                    <a href="home.php" class="batal" style="background-color: #e74c3c; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-left: 10px; display: inline-block;">Keluar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>