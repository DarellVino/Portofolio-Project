<?php
$jurusan = $_POST["jurusan"];

switch ($jurusan) {
    case "TI":
        echo "Jurusan anda Teknik Informatika <br/>";
        break;
    case "SI":
        echo "Jurusan anda Sistem Informasi <br/>";
        break;
    case "MI":
        echo "Jurusan anda Manajemen Informatika <br/>";
        break;
    case "TK":
        echo "Jurusan anda Teknik Komputer <br/>";
        break;
    case "KA":
        echo "Jurusan anda Komputer Akuntansi <br/>";
        break;
    default:
        echo "Jurusan tidak ditemukan";
        break;
}

// ambil data dari form
if(isset($_POST['angka'])){
    $angka = $_POST['angka'];
    echo "Nilai : " . $angka . "<br>";

    if($angka > 100){
        echo "Nilai kelebihan";
    } else if ($angka > 75){
        echo "Selamat Anda Lulus";
    } else if ($angka > 40){
        echo "Ujian lagi";
    } else {
        echo "Belajar lebih keras";
    }

} else {
    echo "Data belum dikirim";
}

?>