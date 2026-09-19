<?php
    include "dbconnect.php";
    $id_buku = $_GET['id'];
    $query = "DELETE FROM buku where id_buku = $id_buku";
    $hapus = mysqli_query($koneksi, $query);
    if($hapus){
        header("Location:index.php");
    }
?>