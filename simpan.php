<?php
    include "dbconnect.php";
    $judul = $_POST['judul_bk'];
    $penerbit = $_POST['terbit_bk'];
    $id_genre = $_POST['genre_bk'];
    $harga = $_POST['harga_bk'];

    $query = "insert into buku VALUES
            (null, '$judul', '$penerbit', $harga, $id_genre)";
    $simpan = mysqli_query($koneksi, $query);
    if($simpan){
        header("Location:index.php");
    }
    
?>