<?php

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "vino_akademik");

    if (!$conn) {
        die("Koneksi gagal");
    }

    return $conn;
}

function bacaMtKuliah($sql)
{
    $conn = koneksi();

    $hasil = mysqli_query($conn, $sql);

    $data = [];

    while($row = mysqli_fetch_assoc($hasil)) {

        $data[] = $row;

    }

    return $data;
}

function tambahMtKuliah($kode, $nama, $sks)
{
    $conn = koneksi();

    $sql = "INSERT INTO matakuliah
            VALUES('$kode', '$nama', '$sks')";

    return mysqli_query($conn, $sql);
}

function hapusMtKuliah($kode)
{
    $conn = koneksi();

    $sql = "DELETE FROM matakuliah
            WHERE kode='$kode'";

    return mysqli_query($conn, $sql);
}

function cariMtKuliah($kode)
{
    $conn = koneksi();

    $sql = "SELECT * FROM matakuliah
            WHERE kode='$kode'";

    $hasil = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($hasil);
}

function ubahMtKuliah($kode, $nama, $sks)
{
    $conn = koneksi();

    $sql = "UPDATE matakuliah
            SET
                nama='$nama',
                sks='$sks'
            WHERE kode='$kode'";

    return mysqli_query($conn, $sql);
}

?>