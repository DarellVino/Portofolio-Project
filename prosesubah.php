<?php

include('crudmhs.php');

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$jurusan = $_POST['jurusan'];

$hasil = ubahmhs($nim, $nama, $kelamin, $jurusan);

header("location: ubahmhs.php");
