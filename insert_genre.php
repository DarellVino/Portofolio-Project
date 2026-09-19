<?php
    include "dbconnect.php";
    $nama_genre = $_POST['add_genre'];

    $query = "INSERT INTO genre VALUES(null, '$nama_genre')";
    $simpan = mysqli_query($koneksi, $query);
    if($simpan){
        header("Location:index.php");
    }
?>